<?php
    include_once __DIR__.'/database.php';

    // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $data = array();
    // SE VERIFICA HABER RECIBIDO EL ID
    if( isset($_POST['id']) ) {
        $id = $_POST['id'];
        // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
        if ( $result = $conexion->query("SELECT * FROM productos WHERE id = '{$id}'") ) {
            //("SELECT * FROM productos WHERE nombre LIKE '%{$nombre}%' OR marca LIKE '%{$marca}%' OR detalles LIKE '%{$detalles}%' ")
            // SE OBTIENEN LOS RESULTADOS
			$row = $result->fetch_array(MYSQLI_ASSOC);

            if(!is_null($row)) {
                // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                foreach($row as $key => $value) {
                    $data[$key] = utf8_encode($value);
                }
            }
			$result->free();
		} else {
            die('Query Error: '.mysqli_error($conexion));
        }
		$conexion->close();
    } 

   /* if(isset($_POST['nombre']) || isset($_POST['marca']) || isset($_POST['detalles'])){

    }*/

    if(isset($_POST['busquedaC'])){

        $busquedaC = $_POST['busquedaC'];
        if($result = $conexion->query("SELECT * FROM productos WHERE nombre LIKE '%{$busquedaC}%' OR marca LIKE '%{$busquedaC}%' 
        OR detalles LIKE '%{$busquedaC}%' ")){

            while ($row = $result->fetch_array(MYSQLI_ASSOC)){

                $datos = array();
        

                if(!is_null($row)) {
                    // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                    foreach($row as $key => $value) {
                        $datos[$key] = utf8_encode($value);
                    }

                    $data[] = $datos;
    
    
                }

            }
          
			$result->free();

        }

        else {
            die('Query Error: '.mysqli_error($conexion));
        }
        $conexion->close();
    }

    
    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($data, JSON_PRETTY_PRINT);
?>