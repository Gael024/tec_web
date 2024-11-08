<?php


use TECWEB\MYAPI\Products;

require_once __DIR__. '/myapi/Products.php';

$productos = new Products('marketzone');
    $productos->search($_POST['search']);
    $productos->getResponse();

?>