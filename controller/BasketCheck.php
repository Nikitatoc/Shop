<?php
require "dataBase.php";
require_once "BasketModel.php";
$basket=new BASKET();

$errors='';
$id=$_GET['id'];
$login=$_COOKIE['login'];


  $basket ->  MainModel($pdo, $login, $id);




header('location:index.php');