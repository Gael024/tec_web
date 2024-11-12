<?php
    use TECWEB\MYAPI\Delete;
    require_once __DIR__.'/myapi/Products.php';

    $productos = new Delete('marketzone');
    $productos->delete( $_POST['id'] );
    echo $productos->getData();
?>