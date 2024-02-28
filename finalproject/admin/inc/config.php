<?php
    $serverName = 'localhost';
    $userName = "root";
    $password = "";
    $dbName = "Shopstock";

    try{
        $connect = new PDO("mysql:host=$serverName; dbname=$dbName", $userName, $password);
    }catch(Exception $e){
        echo $e->getMessage();
    }
?>