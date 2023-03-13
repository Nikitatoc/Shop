<?php
require "dataBase.php";
require "AccessModel.php";

$access=new Access();

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
        <a href="CustomerControl.php" class="AdminInterface">Керування Аккаунтами</a>
    <?php endif ?>
    <a href="register.php" class="esc"><</a>
    <a href="basket.php">
        <img src="https://cdn-icons-png.flaticon.com/512/1374/1374128.png" alt="Кошик" id="BasketIcon">
    </a>
</header>
<?php



echo '<ul >';

    $query=$pdo ->query("SELECT * FROM `orders` WHERE 1");
    while ($row=$query->fetch(PDO::FETCH_OBJ)){
    echo '<li class="MyPurchases">'.$row->CustomerId . '<br>' .$row->ShippingMethod.  '<br>' .$row->region. '<br>' .$row->city.'<br>'. $row->Street. '<br>'.$row->house. '</li>';
    }
echo '</ul>';
    ?>
</body>
</html>
