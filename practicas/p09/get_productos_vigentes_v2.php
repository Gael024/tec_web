<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
    <?php

     /*header("Content-Type: application/json; charset=utf-8"); 
      $data = array(); */

      /*
         if(isset($_GET['tope']))
         {
             $tope = $_GET['tope'];
         }
         else
         {
            die('Parámetro "tope" no detectado...');
         }
     
         if (!empty($tope)) 

         */

            /** SE CREA EL OBJETO DE CONEXION */
            @$link = new mysqli('localhost', 'root', '', 'marketzone');
             /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */

           /** comprobar la conexión */
            if ($link->connect_errno) {

                die('Falló la conexión: ' . $link->connect_error . '<br/>');
                //exit();

            }

/** Crear una tabla que no devuelve un conjunto de resultados */
 $result = $link->query("SELECT * FROM productos WHERE eliminado = 0");
?>
 <head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Productos</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src = "./productos.js"></script>

    </head>
	<body>
		<h3>PRODUCTOS</h3>

		<br/>

<?php

 /*$row = $result->fetch_all(MYSQLI_ASSOC);*/

  
        if ($result->num_rows > 0) {
            echo '<table class="table">';
            echo '<thead class="thead-dark">
                  <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Marca</th>
                <th scope="col">Modelo</th>
                <th scope="col">Precio</th>
                <th scope="col">Unidades</th>
                <th scope="col">Detalles</th>
                <th scope="col">Imagen</th>
                <th scope="col">Modificar</th>

             </tr>
             </thead>
             <tbody>';


         while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            echo '<tr>';
            echo '<th scope="row">'.$row['id'].'</th>';
            echo '<td>'.$row['nombre'].'</td>';
            echo '<td>'.$row['marca'].'</td>';
            echo '<td>'.$row['modelo'].'</td>';
            echo '<td>'.$row['precio'].'</td>';
            echo '<td>'.$row['unidades'].'</td>';
            echo '<td>'.utf8_encode($row['detalles']).'</td>';
            echo '<td><img src="'.$row['imagen'].'" ></td>';
            echo '<td> <input type = "button" value="Modificar" onclick = "Modificar();"> </td>';
            echo '</tr>';
                    }

      echo '</tbody> </table>';
                  
    } else {

    echo '<p>Ningun producto corresponde a la busqueda solicitada</p>';

    }

                
 $result->free();
 $link->close();
                       

        ?>
	</body>
</html>