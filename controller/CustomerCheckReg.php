<?php
require "dataBase.php";
require "UsersModel.php";
$users=new USERS();

$login=$_POST['login'];
$email=$_POST['email'];
$password=$_POST['password'];
$password2=$_POST['password2'];
$errors='';

if($login==''){
    $errors="поле логін є обов'язковим";

}
if($email==''){
    $errors="введить вашу пошту";

}
if($password==''){
    $errors="поле пароль є обов'язковим";
}
if($password!==$password2){
    $errors="Паролі не співпадають";
}

    setcookie('error', $errors, time() + 1);


if($errors==''){
 $users ->  registerCustomer($login, $email, $password, $pdo);

}

header('location:CustomerRegister.php');