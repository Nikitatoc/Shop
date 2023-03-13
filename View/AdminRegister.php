
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test.shop</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<form class="LoginForm" style="height: 300px" method="post" action="AdminCheckReg.php">
    <input type="text" placeholder="Введить ваш логин" class="FormFields" name="login">
    <br>
    <input type="email" placeholder="Введіть вашу пошту" class="FormFields" name="email">
    <br>
    <input type="password" placeholder="Введіть ваш пароль" class="FormFields" name="password">
    <input type="password" placeholder="повторить ваш пароль" class="FormFields" name="password2">
    <p class="FormErrors">
        <?php echo $_COOKIE['error'] ?>
    </p>
    <button type="submit" class="FormButton">Зарееструватися</button>
</form>
</body>
</html>