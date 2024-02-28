<?php
$errors=[];

function validateEmail($email){
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        global $errors;
        $errors['email']="not valid email";
    }    
}

function validatePassword($password,$confPassword){
    if($password != $confPassword){
        global $errors;
        $errors['password']="not equal";
    }
}
?>