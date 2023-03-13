<?php
class Access
{

    function access($pdo)
    {
        global $login;
        global $access;
        $login = $_COOKIE['login'];

        $queryPassword = $pdo->query("SELECT `access` FROM `users` WHERE name='$login'");
        while ($row = $queryPassword->fetch(PDO::FETCH_OBJ)) {
            $access = $row->access;
        }
    }
}