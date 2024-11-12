<?php
    use TECWEB\MYAPI\Read;
    require_once __DIR__.'/myapi/Products.php';

    $productos = new Read('marketzone');
    $productos->search( $_GET['search'] );
    echo $productos->getData();
?>