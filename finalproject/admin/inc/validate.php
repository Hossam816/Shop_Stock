<?php
require_once "config.php";

$errArr=[];

function validateEmail($email){
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        global $errArr;
        $errArr['email']="not valid email";
    }    
}

function validatePassword($password,$confPassword){
    if($password != $confPassword){
        global $errArr;
        $errArr['password']="not equal";
    }
}

function duplicateId($currentId) {
    $prodQueryId = "SELECT prod_id from products where  prod_id=$currentId";
    $res = $connect->query($prodQueryId);
    if($res->rowCount() > 0){
        global $errArr;
        $errArr['duplicate']="Id Already Existing";
    }
}
?>