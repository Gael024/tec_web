<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<?php
    //header("Content-Type: application/json; charset=utf-8"); 
    $data = array();

	if(isset($_GET['tope']))
    {
		$tope = $_GET['tope'];
    }
    else
    {
        die('Parámetro "tope" no detectado...');
    }

	if (!empty($tope))
	{
		/** SE CREA EL OBJETO DE CONEXION */
		@$link = new mysqli('localhost', 'root', '', 'marketzone');
        /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */

		/** comprobar la conexión */
		if ($link->connect_errno) 
		{
			die('Falló la conexión: '.$link->connect_error.'<br/>');
			//exit();
		}

		/** Crear una tabla que no devuelve un conjunto de resultados */
		if ( $result = $link->query("SELECT * FROM productos WHERE unidades <= $tope") ) 
		{
            /** Se extraen las tuplas obtenidas de la consulta */
			$row = $result->fetch_all(MYSQLI_ASSOC);

            /** Se crea un arreglo con la estructura deseada */
            foreach($row as $num => $registro) {            // Se recorren tuplas
                foreach($registro as $key => $value) {      // Se recorren campos
                    $data[$num][$key] = utf8_encode($value);
                }
            }

			/** útil para liberar memoria asociada a un resultado con demasiada información */
			//$result->free();
		}

		$link->close();

        /** Se devuelven los datos en formato JSON */
        //echo json_encode($data, JSON_PRETTY_PRINT);
	}
	?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Producto</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<!--<script src = "./productos.js"></script>-->
		<script>

	</head>
	<body>
		<h3>PRODUCTO</h3>

		<br/>
		
		if ($result = $link->query($query)) {
                if ($result->num_rows > 0) {
                    echo '<table class="table">';
                    echo '<thead class="thead-dark">';
                    echo '<tr>';
                    echo '<th scope="col">#</th>';
                    echo '<th scope="col">Nombre</th>';
                    echo '<th scope="col">Marca</th>';
                    echo '<th scope="col">Modelo</th>';
                    echo '<th scope="col">Precio</th>';
                    echo '<th scope="col">Unidades</th>';
                    echo '<th scope="col">Detalles</th>';
                    echo '<th scope="col">Imagen</th>';
                    echo '<th scope="col">Modificar</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';

                    // Mostrar cada producto
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr id="row_' . $row['id'] . '">';
                        echo '<th scope="row">' . $row['id'] . '</th>';
                        echo '<td class="row-data">' . $row['nombre'] . '</td>';
                        echo '<td class="row-data">' . $row['marca'] . '</td>';
                        echo '<td class="row-data">' . $row['modelo'] . '</td>';
                        echo '<td class="row-data">' . $row['precio'] . '</td>';
                        echo '<td class="row-data">' . $row['unidades'] . '</td>';
                        echo '<td class="row-data">' . utf8_encode($row['detalles']) . '</td>';
                        echo '<td class="row-data"><img src="' . $row['imagen'] . '" ></td>';
                        echo '<td><input type="button" value="Modificar" onclick="Modificarr(event, ' . $row['id'] . ');" /></td>';
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';
                } else {
                    echo '<p>No hay productos que coincidan con la busqueda.</p>';
                }

                // Liberar el resultado
                $result->free();
            } else {
                echo 'Error en la consulta: ' . $link->error;
            }
            // Cerrar la conexión a la base de datos
            $link->close();
        }
        ?>
        <script>
        function Modificar (event, id) {
           

            // Obtiene el ID de la fila donde está el botón presionado
            var rowId = event.target.closest('tr').id; 

            // Se obtienen los datos de la fila en forma de arreglo
            var data = document.getElementById(rowId).querySelectorAll(".row-data");
            
         
            var nombre = data[0].innerHTML;
            var marca = data[1].innerHTML;
            var modelo = data[2].innerHTML;
            var precio = data[3].innerHTML;
            var unidades = data[4].innerHTML;
            var detalles = data[5].innerHTML;
            var imagen = data[6].querySelector('img').src; 

            alert("Nombre: " + nombre + "\nMarca: " + marca+"\nModelo: " + modelo + "\nPrecio: " + precio+"Detalles: " + detalles + "\nUnidades: " + unidades+"\nImagen: " + imagen );
            send2form(id, nombre, marca, modelo, precio, detalles, unidades, imagen);

        }

        function send2form(id, nombre, marca, modelo, precio, detalles, unidades, imagen ) {
            var form = document.createElement("form");

            var idIn = document.createElement("input");
            idIn.type = 'hidden';
            idIn.name = 'id';
            idIn.value = id;
            form.appendChild(idIn);

            
            var nombreIn = document.createElement("input");
            nombreIn.type = 'text';
            nombreIn.name = 'nombre';
            nombreIn.value = nombre;
            form.appendChild(nombreIn);

            
            var marcaIn = document.createElement("input");
            marcaIn.type = 'text';
            marcaIn.name = 'marca';
            marcaIn.value = marca;
            form.appendChild(marcaIn);

            
            var modeloIn = document.createElement("input");
            modeloIn.type = 'text';
            modeloIn.name = 'modelo';
            modeloIn.value = modelo;
            form.appendChild(modeloIn);

            
            var precioIn = document.createElement("input");
            precioIn.type = 'text';
            precioIn.name = 'precio';
            precioIn.value = precio;
            form.appendChild(precioIn);

            
            var detallesIn = document.createElement("textarea");
            detallesIn.name = 'detalles';
            detallesIn.value = detalles; 
            form.appendChild(detallesIn);

           
            var unidadesIn = document.createElement("input");
            unidadesIn.type = 'text';
            unidadesIn.name = 'unidades';
            unidadesIn.value = unidades;
            form.appendChild(unidadesIn);

            
            var imagenIn = document.createElement("input");
            imagenIn.type = 'text';
            imagenIn.name = 'imagen';
            imagenIn.value = imagen;
            form.appendChild(imagenIn);

            
            form.method = 'POST';
            form.action = 'http://localhost:80/tec_web/practicas/p09/formulario_productos_v2.php';

            document.body.appendChild(form);
            form.submit();
        }
    </script>
	</body>
</html>