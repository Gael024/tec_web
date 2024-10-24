<?php

include('database.php');
$id = $_POST['id'];
$query = "SELECT * FROM productos WHERE id = $id";
$result = mysqli_query($connection, $query);
if(!$result){

    die('Consulta fallida');
}

$json = array();
while($row = mysqli_fetch_array($result)){
    $json[] = array(
        'nombre' => $row['nombre'],
        'marca'=> $row['marca'],
        'modelo' => $row['modelo'],
        'precio' => $row['precio'],
        'detalles' => $row['detalles'],
        'unidades' => $row['unidades'],
        'imagen' => $row['imagen']
     

    );
}

$jsonstring = json_encode($json[0]);
echo $jsonstring;


?>