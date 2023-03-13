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


    <a href="basket.php">
        <?php if($access=='admin'): ?>

            <a href="OrderControl.php" class="AdminInterface">Замовлення</a>
            <a href="CustomerControl.php" class="AdminInterface">Керування Аккаунтами</a>
        <?php endif ?>
        <a href="index.php" class="esc"><</a>
        <img src="https://cdn-icons-png.flaticon.com/512/1374/1374128.png" alt="Кошик" id="BasketIcon">

    </a>
</header>

<form id="CreateProductForm" method="post" action="CreateProductCheck.php">
    <input type="text" class="ProductFeatures" placeholder="Назва продукта" name="name">
    <br>
    <input type="number" class="ProductFeatures" placeholder="Ціна для гостя" name="price">
    <br>
    <input type="number" class="ProductFeatures" placeholder="Ціна для авторизованного користувача" name="CustomerPrice">
    <br>
    <input type="number" class="ProductFeatures" placeholder="Кількість продукта" name="amount">
    <br>
    <input type="text" class="ProductFeatures" placeholder="Опис товару" name="description">
    <br>
    <select name="ForCustomer" class="ProductFeatures">
        <option value=3>Продукт для клієнтів?</option>
        <option value='yes'>так</option>
        <option value='no'>ні</option>
    </select>
    <br>
    <select name="type" class="ProductFeatures">
        <option value=6>Тип продукту</option>
        <option value=1>technique</option>
        <option value=2>laptop</option>
        <option value=3>cloth</option>
        <option value=4>phone</option>
        <option value=5>sport</option>
    </select>

    <p class="FormErrors">
    <?php echo $_COOKIE['error']?>
    </p>
    <button type="submit" id="ProductFeaturesButton">Створити</button>
</form>
</body>
</html>