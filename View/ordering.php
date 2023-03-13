<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test.shop</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<header id="header">

    <a href="basket.php" class="esc"><</a>

</header>
<form id="OrderingForm" method="post" action="OrderingCheck.php">
    <select name="ShippingMethod" id="OrderingInfo">
        <option value=3>Оберить метод доставки?</option>
        <option value='NewPost'>НоваПошта</option>
        <option value='UaPost'>УкрПошта</option>
    </select>
    <input type="text" placeholder="Регіон" name="region" id="region">

    <input type="text" placeholder="Місто" name="city" id="city">
    <br>
    <input type="text" placeholder="Вулиця" name="Street" id="street">

    <input type="text" placeholder="Будинок" name="house" id="house">

    <p class="FormErrors"><?php echo $_COOKIE['error'];?></p>
    <button type="submit" class="buy" style="margin-left: 30%">Оформити замовлення</button>
</form>
</body>
</html>
