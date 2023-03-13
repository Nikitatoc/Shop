<?php
require "dataBase.php";
require "AccessModel.php";
require "BasketModel.php";

$access=new Access();
$basket=new BASKET();

$access->access($pdo);


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test.shop</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<header id="header">
    <?php
    if($login==''): ?>
        <a href="register.php" class="AdminInterface">Увійти</a>
    <?php endif ?>
    <?php if($access=='admin'): ?>
        <a href="CreateProduct.php" class="AdminInterface">Створити продукт</a>
        <a href="OrderControl.php" class="AdminInterface">Замовлення</a>
        <a href="CustomerControl.php" class="AdminInterface">Керування Аккаунтами</a>
    <?php endif ?>
    <a href="index.php" class="esc"><</a>
</header>

<?php

$basket -> CustomerId($pdo,$login);


echo '<ul>';

 $basket ->  ProductId($pdo,$CustomerId,$login );



echo '</ul>';
if($login!='') {
    echo '<p class="FinalPrice">' . $sumCustomer .'</p>';
}
else{
    echo '<p class="FinalPrice">'. $sumNoAccount. '</p>';
}

?>
<a href="ordering.php" class="buy">Оформити замовлення</a>
</body>
</html>