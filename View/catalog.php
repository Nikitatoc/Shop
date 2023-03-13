<?php
require "dataBase.php";
require "AccessModel.php";
$type=$_GET['type'];

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
        <a href="OrderControl.php" class="AdminInterface">Замовлення</a>
        <a href="CustomerControl.php" class="AdminInterface">Керування Аккаунтами</a>
    <?php endif ?>
    <a href="index.php" class="esc"><</a>
    <a href="basket.php">
        <img src="https://cdn-icons-png.flaticon.com/512/1374/1374128.png" alt="Кошик" id="BasketIcon">
    </a>
</header>
<?php ?>
<?php
echo'<ul>';
$query=$pdo ->query("SELECT * FROM `products` WHERE type='$type'");
while ($row=$query->fetch(PDO::FETCH_OBJ)) {
    $ForCustomer = $row->ForCustomer;
    if ($login != '' || $ForCustomer == 'no') {
        echo '<div class="product">';
        echo '<li >' . $row->name . '<br>' . $row->description . '</li>';
        if ($login != '') {
            echo '<li >' . $row->CustomerPrice . '</li>';
        } else {
            echo '<li >' . $row->price . '</li>';
        }
        $amount = $row->amount;

        if ($amount == 0) {
            echo '<p id="warning">' . 'продукт наразі закінчився' . '</p>';
        } else {
            echo '<a class="BasketButton" href="BasketCheck.php? id='.$row->id.'">У корзину</a>';
        }

        echo '</div>';


        echo '</ul>';
    }
}
?>
</body>
</html>