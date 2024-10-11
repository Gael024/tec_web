<?php
$nombre = $_POST['nombre'];
$marca  = $_POST['marca'];
$modelo = $_POST['modelo'];
$precio = $_POST['precio'];
$detalles = $_POST['detalles'];
$unidades = $_POST['unidades'];
$imagen = $_POST['imagen'];

/** SE CREA EL OBJETO DE CONEXION */
@$link = new mysqli('localhost', 'root', '', 'marketzone');	

/** comprobar la conexión */
if ($link->connect_errno) 
{
    die('Falló la conexión: '.$link->connect_error.'<br/>');
    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
}


$Validar = "SELECT * FROM productos WHERE nombre = ? AND marca = ? AND modelo = ?";
$Asignar = $link->prepare($Validar);
$Asignar->bind_param("sss", $nombre, $marca, $modelo);
$Asignar->execute();
$Coincidencia = $Asignar->get_result();

if ($Coincidencia->num_rows == 0){

    
    /*
    
$sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}',0)";
    
    */

$sql = "INSERT INTO productos ( nombre, marca, modelo, precio, detalles, unidades, imagen) VALUES 
    ('{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}')";
if ( $link->query($sql) ) 
{
    echo "<h2>Resumen del producto insertado<h2>";
    echo "<ul>";
    echo "<li>Nombre: $nombre </li>";
    echo "<li>Marca: $marca </li>";
    echo "<li>Modelo: $modelo </li>";
    echo "<li>Precio: $precio </li>";
    echo "<li>Detalles: $detalles</li>";
    echo "<li>Numero de unidades: $unidades</li>";
    echo "<li>URL de la imagen: $imagen</li>";
    echo "</ul>";
}
else
{
	echo 'El Producto no pudo ser insertado =(';
}


}

else {

    echo "<h3>Error al validar los datos, el producto que intenta resgistrar ya se encuentra en la base de datos</h3> ";
}




$link->close();
?>