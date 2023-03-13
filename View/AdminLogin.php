
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test.shop</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<form method="post" action="LoginCheck.php" class="LoginForm">
    <input type="text" placeholder="Введить ваш логин" class="FormFields" name="login">
    <br>
    <input type="password" placeholder="Введіть ваш пароль" class="FormFields" name="password">
    <br>
    <p class="FormErrors">
        <?php echo $_COOKIE['error'] ?>
    </p>

    <button type="submit" class="FormButton">Увійти</button>
</form>
<br>
<br>
<a href="AdminRegister.php" class="NoAccount">Я ще не маю аккаунту</a>
<a href="index.php" class="NoAccount">увійти без аккаутну</a>
</body>
</html>