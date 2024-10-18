<?php
    include_once __DIR__.'/database.php';

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    if(!empty($producto)) {
        // SE TRANSFORMA EL STRING DEL JASON A OBJETO
        $jsonOBJ = json_decode($producto);






        $nombre = $_POST['nombre'];
        $marca  = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $precio = $_POST['precio'];
        $detalles = $_POST['detalles'];
        $unidades = $_POST['unidades'];
        $imagen = $_POST['imagen'];
        $eliminado = $_POST['eliminado'];

        @$link = new mysqli('localhost', 'root', '', 'marketzone');	

        /** comprobar la conexión */
if ($link->connect_errno) 
{
    die('Falló la conexión: '.$link->connect_error.'<br/>');
    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
}


$Validar = "SELECT * FROM productos WHERE nombre = ? AND eliminado = 0 ";
$Asignar = $link->prepare($Validar);
$Asignar->bind_param("si", $nombre, $eliminado);
$Asignar->execute();
$Coincidencia = $Asignar->get_result();


if ($Coincidencia->num_rows == 0){
      
$sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}',0)";
        
/*
$sql = "INSERT INTO productos ( nombre, marca, modelo, precio, detalles, unidades, imagen) VALUES 
    ('{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}')";
*/


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



        /**
         * SUSTITUYE LA SIGUIENTE LÍNEA POR EL CÓDIGO QUE REALICE
         * LA INSERCIÓN A LA BASE DE DATOS. COMO RESPUESTA REGRESA
         * UN MENSAJE DE ÉXITO O DE ERROR, SEGÚN SEA EL CASO.
         */





        echo '[SERVIDOR] Nombre: '.$jsonOBJ->nombre;
    }

  //  $link->close();
?>