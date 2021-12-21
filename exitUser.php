<?php
//Запрет кэширования
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Expires: " . date("r"));
require_once("cfg.php");
$id_user = strip_tags(trim($_POST["id_user"]));

//Формирование SQL-запроса на удаление неактивных юзеров
mysqli_query ($conn, "DELETE FROM user WHERE time < DATE_SUB(NOW(), INTERVAL 20 MINUTE)");

//Формирование SQL-запроса на проверку существования пользователя
$query = mysqli_query($conn, "SELECT COUNT(*) FROM user WHERE id_user ='".$id_user."'");
$result = mysqli_fetch_row($query);
$total = $result[0]; // всего записей 

if($total == 1) {
    mysqli_query ($conn, "DELETE FROM user WHERE id_user ='".$id_user."'");
    echo "exit";

}
else{
    echo "exit";
}
$conn->close();
?>