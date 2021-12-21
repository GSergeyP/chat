<?php
//Запрет кэширования
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Expires: " . date("r"));
require_once("cfg.php");
$id_user = strip_tags(trim($_POST['id_user']));
$name = strip_tags(trim($_POST['name']));
$messages = strip_tags(trim($_POST['messageText']));

if($messages != ""){
    //Формирование SQL-запроса на запись сообщения в БД
    mysqli_query($conn,"INSERT INTO messages SET messages = '".$messages."', id_user = '".$id_user."', name = '".$name."', time = NOW();");
    
    //Получение текущей даты сервера MySQL
    $query=mysqli_query($conn, "SELECT NOW();");
    $data = mysqli_fetch_array($query);
    $time = $data[0];
      
    //Формирование SQL-запроса на обнавление данных в БД
    mysqli_query($conn,"UPDATE user SET time='".$time."'  WHERE id_user='".$id_user."'");
    echo $messages, $id_user,  $name ;
}
$conn->close();
?>
