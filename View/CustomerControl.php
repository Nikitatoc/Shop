<?php
require "dataBase.php";
require "AccessModel.php";

$access=new Access();

$access->access($pdo);
?>



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

    <?php endif ?>
    <a href="index.php" class="esc"><</a>
    <a href="basket.php">
        <img src="https://cdn-icons-png.flaticon.com/512/1374/1374128.png" alt="Кошик" id="BasketIcon">
    </a>
</header>
<p class="FormErrors"><?php echo $_COOKIE['error'];?></p>
<?php


echo '<ul >';

$query=$pdo ->query("SELECT * FROM `users` WHERE 1");
while ($row=$query->fetch(PDO::FETCH_OBJ)){
    echo '<li class="MyPurchases">'.$row->name . '<br>' .$row->email. '<br>'.'<a href="DeleteCustomer.php? id='.$row->id.' " class="DeleteButton">Видалити</a>'.'</li>';
}
echo '</ul>';
?>
<br>
<a href="CreateCustomer.php" id="CreateCustomer">Створити користувача</a>
</body>
</html>

