<?php

class HomeController extends BaseController
{
    function __construct()
    {
    }

    function index()
    {
        echo 'This is the index page yahaaa!!';
    }

    function products()
    {
        $mysqli = new mysqli('localhost', 'root', '956823627', 'shop');
        $result = $mysqli->query('SELECT * FROM products');
        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }

        self::renderView('products', $products);
    }
}