<?php
require "dataBase.php";
require "UsersModel.php";
$login=$_POST['login'];
$password=$_POST['password'];
$errors='';
$users=new USERS();


if($login==''){
    $errors="поле логін є обов'язковим";
}

if($password==''){
    $errors="поле пароль є обов'язковим";
}

setcookie('error', $errors, time() + 1);


if ($errors=='') {



  $users -> TruePassword($pdo,$login);

    if ($password === $TruePassword) {
        setcookie('login', $login, time() + 3600);
            header('location:index.php');
    } else {
        $errors = 'Введіть вірний пароль';
        setcookie('error', $errors, time() + 1);
        header('location:CustomerLogin.php');
    }
}

   else {
       header('location:CustomerLogin.php');
   }
