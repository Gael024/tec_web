<?php
    include_once __DIR__.'/database.php';

    @$link = new mysqli('localhost', 'root', '', 'marketzone');	

    /** comprobar la conexión */
    if ($link->connect_errno) 
{
die('Falló la conexión: '.$link->connect_error.'<br/>');
/** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
}


    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    if(!empty($producto)) {
        // SE TRANSFORMA EL STRING DEL JASON A OBJETO
        $jsonOBJ = json_decode($producto);

        
        $nombre = $jsonOBJ->nombre;
        $marca  = $jsonOBJ->marca;
        $modelo = $jsonOBJ->modelo;
        $precio = $jsonOBJ->precio;
        $detalles = $jsonOBJ->detalles;
        $unidades = $jsonOBJ->unidades;
        $imagen = $jsonOBJ->imagen;
        $eliminado = 0;


       


$Validar = "SELECT * FROM productos WHERE nombre = ? AND eliminado = ? ";
$Asignar = $link->prepare($Validar);
$Asignar->bind_param("si", $nombre, $eliminado);
$Asignar->execute();
$Coincidencia = $Asignar->get_result();


if ($Coincidencia->num_rows == 0){
      
//$sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}',0)";

$sql = "INSERT INTO productos ( nombre, marca, modelo, precio, detalles, unidades, imagen, eliminado) VALUES (?,?,?,?,?,?,?,?)";
   
$insertar = $link->prepare($sql);
$insertar->bind_param("sssdsisi", $nombre, $marca, $modelo, $precio, $detalles, $unidades, $imagen, $eliminado);
        
/*
$sql = "INSERT INTO productos ( nombre, marca, modelo, precio, detalles, unidades, imagen, eliminado) VALUES 
    (?,?,?,?,?,?,?,?)";
*/


if ($insertar->execute()) {

    echo json_encode(['status' => 'success', 'message' => 'El producto se ha guardado correctamente.']);

} 

else {
    echo json_encode(['status' => 'error', 'message' => 'Ha ocurrido un error, el producto no ha podido guardarse ' . $insertar->error]);
}


$insertar->close();
} 

else {
    
echo json_encode(['status' => 'error', 'message' => 'Error, el producto que se intenta insertar ya existe en la DB.']);
}
}
?>