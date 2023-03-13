<?php
class BASKET
{
    function MainModel($pdo, $login, $id)
    {
        $queryId = $pdo->query("SELECT `id` FROM `users` WHERE name='$login'");
        while ($row = $queryId->fetch(PDO::FETCH_OBJ)) {
            $CustomerId = $row->id;
            echo $CustomerId;

            $sql = 'SELECT count(CustomerId) as count FROM basket WHERE 	CustomerId=?';
            $query = $pdo->prepare($sql);
            $query->execute([$CustomerId]);
            $count_users = $query->fetch();

            $sqlNoAccount = 'SELECT count(CustomerId) as count FROM basket WHERE 	CustomerId=?';
            $query = $pdo->prepare($sqlNoAccount);
            $query->execute([0]);
            $count_usersNoAccount = $query->fetch();

            if ($login != '' && (int)$count_users['count'] < 20) {
                $sqlCommand = 'INSERT INTO basket(ProductId, CustomerId) VALUES (:ProductId,:CustomerId)';
                $query = $pdo->prepare($sqlCommand);
                $query->execute(['ProductId' => $id, 'CustomerId' => $CustomerId]);
            } elseif ($login == '' && (int)$count_usersNoAccount['count'] < 20) {
                $sqlCommand = 'INSERT INTO basket(ProductId, CustomerId) VALUES (:ProductId,:CustomerId)';
                $query = $pdo->prepare($sqlCommand);
                $query->execute(['ProductId' => $id, 'CustomerId' => 0]);
            } else {
                $errors = 'Максимальна кількість замовленнь не може перебільшувати 20';
            }
            setcookie('error', $errors, time() + 1);
        }
    }

    function order($pdo, $login, $ShippingMethod, $region, $city, $Street, $house)
    {
        if ($login != '') {
            $queryId = $pdo->query("SELECT `id` FROM `users` WHERE name='$login'");
            while ($row = $queryId->fetch(PDO::FETCH_OBJ)) {
                $CustomerId = $row->id;
            }
        } else {
            $CustomerId = 0;
        }

        $sqlCommand = 'INSERT INTO orders(CustomerId, ShippingMethod, region, city, Street, house) VALUES (:CustomerId, :ShippingMethod, :region, :city, :Street, :house)';
        $query = $pdo->prepare($sqlCommand);
        $query->execute(['CustomerId' => $CustomerId, 'ShippingMethod' => $ShippingMethod, 'region' => $region, 'city' => $city, 'Street' => $Street, 'house' => $house]);

        $sqlDelete = 'DELETE FROM `basket` WHERE `CustomerId`=?';
        $query = $pdo->prepare($sqlDelete);
        $query->execute([$CustomerId]);
    }

    function CustomerId($pdo, $login)
    {
        global $CustomerId;

        $queryId = $pdo->query("SELECT `id` FROM `users` WHERE name='$login'");
        while ($row = $queryId->fetch(PDO::FETCH_OBJ)) {
            $CustomerId = $row->id;

        }
    }

    function ProductId($pdo, $CustomerId, $login)
    {
        global $ProductId;
        global $sumCustomer;
        global $sumNoAccount;
        $query = $pdo->query("SELECT * FROM `basket` WHERE CustomerId='$CustomerId'");
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $ProductId = $row->ProductId;
            $queryProduct = $pdo->query("SELECT * FROM `products` WHERE id='$ProductId'");
            while ($row = $queryProduct->fetch(PDO::FETCH_OBJ)) {
                echo '<li class="MyPurchases">' . $row->name . '<br>' . $row->description . '</li>';

                if ($login != '') {
                    $ProductPrice = $row->CustomerPrice;
                    $sumCustomer += $ProductPrice;
                } else {
                    $NoAccountPrice = $row->price;
                    $sumNoAccount += $NoAccountPrice;
                }
            }
        }
    }
}