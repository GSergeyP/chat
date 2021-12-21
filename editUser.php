<?php
//Запрет кэширования
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Expires: " . date("r"));
require_once("cfg.php");
$id_user = strip_tags(trim($_POST["ID_user"]));
$name = strip_tags(trim($_POST["Name"]));

//Формирование SQL-запроса на проверку существования пользователя
$query = mysqli_query($conn, "SELECT COUNT(*) FROM user WHERE id_user ='".$id_user."'");
$result = mysqli_fetch_row($query);
$total = $result[0]; // всего записей 
if($total == 1) {
  //Формирование SQL-запроса на проверку активности пользователя
  $query = mysqli_query($conn, "SELECT COUNT(*) FROM user WHERE id_user ='".$id_user."' AND time < DATE_SUB(NOW(), INTERVAL 20 MINUTE)");
  $result = mysqli_fetch_row($query);
  $total = $result[0]; // всего записей 
  //Удаление неактивного пользователя
  if($total == 1) {
    mysqli_query ($conn, "DELETE FROM user WHERE id_user ='".$id_user."'");
    $NAME = array();
    array_push($NAME, "err");
    //Формирование строки json
    echo json_encode($NAME); 
  }
  else{
    //Формирование SQL-запроса на чтение количества записей
    $query = mysqli_query($conn, "SELECT COUNT(*) FROM user");
    $result = mysqli_fetch_row($query);
    $total = $result[0]; // всего записей 
    //Создание массива юзеров
    $NAME = array();
    array_push($NAME, $id_user);
    array_push($NAME, $name);
    array_push($NAME, $total);
    //Формирование SQL-запроса на чтения всех юзеров
    $query = mysqli_query($conn,"SELECT * FROM user ORDER BY name");
    while($data=mysqli_fetch_array($query)){
      if($id_user != $data['id_user']) array_push($NAME, $data['name']);
    }
    //Формирование строки json
    echo json_encode($NAME); 
  }
}
else{
  $NAME = array();
  array_push($NAME, "err");
  //Формирование строки json
  echo json_encode($NAME);   
}
$conn->close();
?>