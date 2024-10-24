<?php

include('database.php');

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$precio = $_POST['precio'];
$detalles = $_POST['detalles'];
$unidades = $_POST['unidades'];
$imagen = $_POST['imagen'];



$query = "UPDATE productos SET nombre = '$nombre', marca = '$marca', modelo = '$modelo', precio = '$precio',
detalles = '$detalles', unidades = '$unidades', imagen = '$imagen' WHERE id = '$id' ";

$result = mysqli_query($connection, $query);

if(!$result) {
    die('Consulta fallida');
}

echo "Producto actualizado correctamente";

?>