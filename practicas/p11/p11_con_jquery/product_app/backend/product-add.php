<?php
    include('database.php');
    $data = array(
        'status' => 'error',
        'message' => 'Ocurrió un error inesperado.'
    );

    if(isset($_POST['name']) && isset($_POST['description'])) {
        $nombre = $_POST['name'];
        $description = $_POST['description'];
        $jsonOBJ = json_decode($description);
        $conexion->set_charset("utf8");
        $sql = "SELECT * FROM productos WHERE nombre = '{$nombre}' AND eliminado = 0";
        $result = $conexion->query($sql);
        
        if ($result->num_rows == 0) {
            $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen, eliminado) 
                    VALUES ('{$nombre}', '{$jsonOBJ->marca}', '{$jsonOBJ->modelo}', {$jsonOBJ->precio}, '{$jsonOBJ->detalles}', {$jsonOBJ->unidades}, '{$jsonOBJ->imagen}', 0)";

            if ($conexion->query($sql)) {
                $data['status'] = "success";
                $data['message'] = "El producto se ha registrado en la base de datos";
            } else {
                $data['message'] = "Error al insertar datos $sql. " . mysqli_error($conexion);
            }
        } else {
            $data['message'] = "El producto que se intenta registrar ya existe en la base de datos";
        }
        $result->free();
    }
    $conexion->close();
    echo 'status: '.$data['status'].'<br> message: '.$data['message'];
    //echo json_encode($data);
?>