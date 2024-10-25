<?php
    include("database.php");

    // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $data = array(
        'status'  => 'error',
        'message' => 'La consulta falló'
    );
    // SE VERIFICA HABER RECIBIDO EL ID
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
        $query = "UPDATE productos SET eliminado = 1 WHERE id = {$id}";
        $result = mysqli_query($conexion, $query);
        
        if($result){
            $data['status'] = "success";
            $data['message'] = "Producto eliminado";
        } else {
            $data['message'] = "Error en la ejecucion, el producto no pudo ser eliminado. " . mysqli_error($conexion);
        }
        echo 'status: '.$data['status'].'<br> message: '.$data['message'];
    }
    
    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
   // echo json_encode($data, JSON_PRETTY_PRINT);
?>