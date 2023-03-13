<?php
require "dataBase.php";
require "UsersModel.php";
$users=new USERS();

$id=$_GET['id'];
$errors='';



$users -> DeleteCustomer($pdo, $id);

header('location:CustomerControl.php');