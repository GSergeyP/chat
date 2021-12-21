<?php
//Запрет кэширования
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Expires:" . date("r"));
require_once("cfg.php");

//Получение переменных
$id_messages = strip_tags(trim($_POST["id_messages"]));
$option = strip_tags(trim($_POST["option"]));
$maxCounter = strip_tags(trim($_POST["maxCounter"]));
$total = strip_tags(trim($_POST["total"]));
$counter = strip_tags(trim($_POST["counter"]));
//Создание массива сообщения
$NAME = array();

//Формирование SQL-запроса на подсчет всех записей базе
$query = mysqli_query($conn, "SELECT COUNT(*) FROM messages");
$result = mysqli_fetch_row($query);
$fullTotal = $result[0]; // всего записей 

    if($option == 0){

        if($fullTotal <= $maxCounter){
            $option++;
            $start = 0;
            $maxCounter = $fullTotal;
            array_push($NAME, $maxCounter, $option, $start);
            //Формирование SQL-запроса на чтения всех сообщений
            $query = mysqli_query($conn, "SELECT * FROM messages");
            while($data = mysqli_fetch_array($query)){
                array_push($NAME, $data["id_messages"], $data["messages"], $data["id_user"], $data["name"], $data["time"]);
                $id_messages = $data["id_messages"];
            } 
            array_unshift($NAME, $id_messages);
            echo json_encode($NAME); 
        }
        else{
            $start = $fullTotal - $maxCounter;//Расчет начальной позиции вывода сообщения 
            $option++;
            $maxCounter = $maxCounter + $start;
            array_push($NAME, $maxCounter, $option, $start);          
            //Формирование SQL-запроса на чтения всех сообщений   
            $query = mysqli_query($conn, "SELECT * FROM messages LIMIT $maxCounter OFFSET $start");
            while($data = mysqli_fetch_array($query)){
                array_push($NAME, $data["id_messages"], $data["messages"], $data["id_user"], $data["name"], $data["time"]);
                $id_messages = $data["id_messages"];
            }
            array_unshift($NAME, $id_messages);
            echo json_encode($NAME); 
        }
    }
    elseif($option == 1){
        //Формирование SQL-запроса на проверку появления новых записей
        $query = mysqli_query($conn, "SELECT COUNT(*) FROM messages WHERE id_messages > $id_messages");
        $result = mysqli_fetch_row($query);
        $newTotal = $result[0]; // всего записей 
        if($newTotal >= 1){
                $maxCounter = $fullTotal;
                $start = $fullTotal - $newTotal;
                array_push($NAME, $maxCounter, $option, $start); 

               //Формирование SQL-запроса на чтения всех сообщений   
               $query = mysqli_query($conn, "SELECT * FROM messages LIMIT $maxCounter OFFSET $start");
               while($data = mysqli_fetch_array($query)){
                   array_push($NAME, $data["id_messages"], $data["messages"], $data["id_user"], $data["name"], $data["time"]);
                   $id_messages = $data["id_messages"];
               }
               array_unshift($NAME, $id_messages);
               echo json_encode($NAME); 
        }
        else{
            $start = $total;
            $maxCounter = $total;
            array_push($NAME, $id_messages, $maxCounter, $option, $start); 
            echo json_encode($NAME); 
        }
    }
    else{
        $start = $total - $maxCounter;
        $maxCounter = $total; 
        array_push($NAME, $maxCounter, $option, $start); 

        //Формирование SQL-запроса на чтения всех сообщений   
        $query = mysqli_query($conn, "SELECT * FROM messages LIMIT $maxCounter OFFSET $start");
        while($data = mysqli_fetch_array($query)){
            array_push($NAME, $data["id_messages"], $data["messages"], $data["id_user"], $data["name"], $data["time"]);
            $id_messages = $data["id_messages"];
        }
        array_unshift($NAME, $id_messages);
        echo json_encode($NAME);       
    }
$conn->close();
?>