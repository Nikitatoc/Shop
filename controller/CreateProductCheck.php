<?php
require "dataBase.php";
require "ProductsModel.php";
$products=new PRODUCTS();

$name=$_POST['name'];
$price=$_POST['price'];
$CustomerPrice=$_POST['CustomerPrice'];
$amount=$_POST['amount'];
$description=$_POST['description'];
$type=$_POST['type'];
$ForCustomer=$_POST['ForCustomer'];
$errors='';

if($name==''){
    $errors="Ім'я це обов'язковий атрібут";
}
if($price==''){
    $errors="ціна це обов'язковий атрибут";
}
if($CustomerPrice==''){
    $errors="ціна для користувача це обов'язковий атривут";
}
if($amount==''){
    $errors="Кількість це обов'язковий атрібут";
}
if($description==''){
    $errors="Опис це обов'язковий атрібут";
}
if($type==6){
    $errors="Тип це обов'язковий атрибут";
}
if($ForCustomer==3){
    $errors="оберить кто буде бачити товар";
}
setcookie('error', $errors, time() + 1);


if($errors==''){
  $products ->  CreateProduct($name, $price, $CustomerPrice, $amount, $description, $type, $ForCustomer, $pdo);
}
header('location:CreateProduct.php');