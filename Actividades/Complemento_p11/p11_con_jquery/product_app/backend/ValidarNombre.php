<?php
    include('database.php');
    if (isset($_POST['nombre'])) {
        $nombre = $conexion->real_escape_string($_POST['nombre']);
        $sql = "SELECT id FROM productos WHERE nombre = '$nombre' AND eliminado = 0 ";
        $resultado = $conexion->query($sql);
    
        if ($resultado->num_rows > 0) {
            echo 'El nombre no está disponible';
        } else {
            echo 'El nombre está disponible';
        }
    }
?>
