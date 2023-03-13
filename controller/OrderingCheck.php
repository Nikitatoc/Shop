<?php
require "dataBase.php";
require "BasketModel.php";
$basket=new BASKET();

$login=$_COOKIE['login'];
$ShippingMethod=$_POST['ShippingMethod'];
$region=$_POST['region'];
$city=$_POST['city'];
$Street=$_POST['Street'];
$house=$_POST['house'];
$errors='';


if($ShippingMethod==3){
    $errors='оберіть метод доставки';
}
if($region==''){
    $errors='Оберіть регіон';
}
if($city==''){
    $errors='оберіть місто';
}
if($Street==''){
    $errors='оберіть вулицю';
}
if($house==''){
    $errors='оберіть будинок';
}


if($errors==''){

 $basket -> order($pdo,$login, $ShippingMethod, $region, $city, $Street, $house);
}

setcookie('error', $errors, time() + 1);
header('location:ordering.php');