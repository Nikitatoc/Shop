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
    <a href="CustomerControl.php" class="esc"><</a>
    <a href="basket.php">
        <img src="https://cdn-icons-png.flaticon.com/512/1374/1374128.png" alt="Кошик" id="BasketIcon">
    </a>
</header>
<form class="LoginForm" style="height: 300px" action="CreateCustomerCheck.php" method="post">
    <input type="text" class="FormFields" placeholder="Введіть ім'я користувача" name="login">
    <input type="email" class="FormFields" placeholder="Введіть пошту користувача" name="email">
    <input type="password" class="FormFields" placeholder="Введіть пароль користувача" name="password">
    <br>
    <p class="FormErrors">
        <?php echo $_COOKIE['error'] ?>
    </p>
    <br>
    <button type="submit" class="FormButton">Створити</button>
</form>
</body>
</html>