<?php
class USERS
{

    function regiserAdmin($login, $email, $password, $pdo)
    {

        $sqlCommand = 'INSERT INTO users( name, email, password, access) VALUES ( :login, :email, :password, :access)';
        $query = $pdo->prepare($sqlCommand);
        $query->execute(['login' => $login, 'email' => $email, 'password' => $password, 'access' => 'admin']);
    }

    function registerCustomer($login, $email, $password, $pdo)
    {

        $sqlCommand = 'INSERT INTO users( name, email, password, access) VALUES ( :login, :email, :password, :access)';
        $query = $pdo->prepare($sqlCommand);
        $query->execute(['login' => $login, 'email' => $email, 'password' => $password, 'access' => 'customer']);
    }

    function DeleteCustomer($pdo, $id)
    {
        $queryAccess = $pdo->query("SELECT `access` FROM `users` WHERE id='$id'");
        while ($row = $queryAccess->fetch(PDO::FETCH_OBJ)) {
            $access = $row->access;


            if ($access != 'admin') {
                $sqlCommand = 'DELETE FROM `users`WHERE `id`=?';
                $query = $pdo->prepare($sqlCommand);
                $query->execute([$id]);
            } else {
                $errors = 'У вас немає прав для видалення сього користувача!';
            }
            setcookie('error', $errors, time() + 1);
        }
    }

    function TruePassword($pdo, $login)
    {
        global $TruePassword;
        $queryPassword = $pdo->query("SELECT `password` FROM `users` WHERE name='$login'");
        while ($row = $queryPassword->fetch(PDO::FETCH_OBJ)) {
            $TruePassword = $row->password;

        }
    }
}