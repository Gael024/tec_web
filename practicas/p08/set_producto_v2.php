<?php
$nombre = $_POST['nombre'];
$marca  = $_POST['marca'];
$modelo = $_POST['modelo'];
$precio = $_POST['precio'];
$detalles = $_POST['detalles'];
$unidades = $_POST['unidades'];
$imagen   = $_POST¨['imagen'];

/** SE CREA EL OBJETO DE CONEXION */
@$link = new mysqli('localhost', 'root', '', 'marketzone');	

/** comprobar la conexión */
if ($link->connect_errno) 
{
    die('Falló la conexión: '.$link->connect_error.'<br/>');
    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
}


$Validar = "SELECT FROM productos WHERE nombre = ? AND marca = ? AND modelo = ?";
$Asignar->t_dato("sss", $nombre, $marca, $modelo);
$Asignar->execute();
$Coincidencia = $Asignar->get_result();

if ($Coincidencia == 0){

    /** Crear una tabla que no devuelve un conjunto de resultados */
$sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}')";
if ( $link->query($sql) ) 
{
    echo "<h2>Resumen del producto insertado<h2>";
    echo "<ul>";
    echo "<li>Nombre: $nombre </li>";
    echo "<li>Marca: $marca </li>";
    echo "<li>Modelo: $modelo </li>";
    echo "<li>Precio: $precio </li>";
    echo "<li>Detalles: $Detalles</li>";
    echo "<li>Numero de unidades: $Unidades</li>";
    echo "<li>URL de la imagen: $Imagen</li>";
    echo "</ul>";
}
else
{
	echo 'El Producto no pudo ser insertado =(';
}


}

else {

    echo "Error al validar los datos, el producto que intenta resgistrar ya se encuentra en la base de datos ";
}


/*
$Validar = "SELECT FROM productos WHERE nombre = ? AND marca = ? AND modelo = ?"
$Asignar2 = $link->prepare($Validar);
*/






$link->close();
?>