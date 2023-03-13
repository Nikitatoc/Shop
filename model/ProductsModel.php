<?php
class PRODUCTS
{
    function CreateProduct($name, $price, $CustomerPrice, $amount, $description, $type, $ForCustomer, $pdo)
    {
        $sqlCommand = 'INSERT INTO products( name, price, CustomerPrice, amount, description, type, ForCustomer) VALUES ( :title, :price, :CustomerPrice, :amount, :description, :kind, :ForCustomer)';
        $query = $pdo->prepare($sqlCommand);
        $query->execute(['title' => $name, 'price' => $price, 'CustomerPrice' => $CustomerPrice, 'amount' => $amount, 'description' => $description, 'kind' => $type, 'ForCustomer' => $ForCustomer]);
    }
}