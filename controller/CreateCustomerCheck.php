<?php
require "dataBase.php";
require "UsersModel.php";
$users=new USERS();

$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];

$errors = '';

if ($login == '') {
    $errors = "поле логін є обов'язковим";

}
if ($email == '') {
    $errors = "введить вашу пошту";

}
if ($password == '') {
    $errors = "поле пароль є обов'язковим";
}


setcookie('error', $errors, time() + 1);


if ($errors == '') {

  $users ->  registerCustomer($login, $email, $password, $pdo);

}

header('location:CreateCustomer.php');