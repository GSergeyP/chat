<?php
//Запрет кэширования
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Expires: " . date("r"));
require_once("cfg.php");
$name = strip_tags(trim($_POST['name']));

//Формирование SQL-запроса на удаление неактивных юзеров
mysqli_query ($conn, "DELETE FROM user WHERE time < DATE_SUB(NOW(), INTERVAL 20 MINUTE)");

//Формирование SQL-запроса на запись юзера в БД
mysqli_query($conn,"INSERT INTO user SET name='".$name."', time=NOW();");
//Получение ID
$id_user = mysqli_insert_id($conn); 
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
$conn->close();
?>