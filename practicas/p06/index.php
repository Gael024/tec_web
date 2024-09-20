<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 6</title>
</head>
<body>


   <?php

  include 'src/funciones.php';  

   ?>


    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <?php
       
       ejercicio1();
    ?>

<!--
    <h2>Ejemplo de POST</h2>
    <form action="http://localhost/tecweb/practicas/p04/index.php" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>
    <br>
    -->
    
    <?php
    /*
        if(isset($_POST["name"]) && isset($_POST["email"]))
        {
            echo $_POST["name"];
            echo '<br>';
            echo $_POST["email"];
        }
            */
    ?>
    
    

<h2>Ejercicio 2</h2>
<p>Crea un programa para la generación repetitiva de 3 números aleatorios hasta obtener una secuencia compuesta por 
    <b>impar, par, impar.</b></p>    

    <?php

    ejercicio2();

    ?>


<h2>Ejercicio 3</h2>
<p>Utiliza un ciclo while para encontrar el primer número entero obtenido aleatoriamente, pero que ademas sea multiplo
    de un número dado</p> 

    <?php

     ejercicio3();

    ?>

<h2>Ejercicio 4</h2>
<p>Crear un arreglo cuyos indices van de 97 a 122 y cuyos valores son de las letras de la "a" a la "z". Usa la función <b>chr(n)</b>
que devuelve el caracter cuyo código ASCII es "n" para poner el valor en cada indice</p> 

<?php

ejercicio4();

?>


<h2>Ejercicio 5</h2>
<p>Usar las variables "edad" y "sexo" en una instrucción "if" para identificar una persona de sexo femenino, cuya edad oscile 
    entre los 18 y 35 años y mostrar un mensaje de bienvenida; en caso contrario deberá devolverse otro mensaje indicando el error.</p> 

<!--  FORMULARIO HTML -->

    <form  action="http://localhost/tec_web/practicas/p06/index.php" method="post">

   <label for = "edad">Edad:</label>
   <input type="number" name="edad"></input required>
   <br>

   <label for="sexo">Sexo: </label>
       <select name="sexo" size="1" required>

       <option value="Masculino">Masculino</option>
       <option value="Femenino">Femenino</option>

       </select>

    <br>

    <p><input type="submit" value="Enviar">
    <input type="reset" value="Limpiar"></p>

    </form>

    <?php
        $sexo = $_POST['sexo'];
        $edad = $_POST['edad'];

     echo "Validación de datos";
     echo "<br>";

     if($sexo == "Femenino" && $edad>=18 && $edad <=35){

        echo "El sistema ha validado sus datos, usted cumple con los requistos";

     }

     if(!($sexo == "Femenino" && $edad>=18 && $edad <=35)){

        echo "Acceso denegado, usted no cumple con los requistos solictados";

     }
     

     ?>

    <!-- 
    
    <form action="http://localhost/tecweb/practicas/p04/index.php" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>
    
    -->



    <h2>Ejercicio 6</h2>
<p>Crea en código duro un arreglo asociativo que sirva para registrar el parque vehicular de una ciudad. Cada vejiculo debe 
    ser identificador por: </p> 
        <ul>

       <li>Matricual</li>
       <li>Auto

             <ul>

              <li>Marca</li>
              <li>Modelo(año)</li>
              <li>Tipo(seda|hachback|camioneta)</li>


             </ul>

       </li>
       <li>Propietario

            <ul>

              <li>Nombre</li>
              <li>Ciudad</li>
              <li>Dirección</li>

            </ul>

       </li>


        </ul>



    <?php

$Datos_generales = array(
    "ZZZ0000" => array(
        "Auto" => array(
            "Marca" => "Audi",
            "Modelo" => 2012,
            "Tipo" => "hachback"
        ),
        "Propietario" => array(
            "Nombre" => "Erwin",
            "Ciudad" => "Nochixtlán",
            "Dirección" => "Bugambilias 3"
        )
    ),
    "yyy1111" => array(
        "Auto" => array(
            "Marca" => "Audi",
            "Modelo" => 2016,
            "Tipo" => "sedan"
        ),
        "Propietario" => array(
            "Nombre" => "Gael",
            "Ciudad" => "Oaxaca",
            "Dirección" => "Colonia Jardin"
        )
    ),
    "WWW2222" => array(
        "Auto" => array(
            "Marca" => "Audi",
            "Modelo" => 2020,
            "Tipo" => "Camioneta"
        ),
        "Propietario" => array(
            "Nombre" => "Rivaldo",
            "Ciudad" => "Puebla",
            "Dirección" => "Avenida universidad"
        )
    ),

    "VVV3333" => array(
        "Auto" => array(
            "Marca" => "BMW",
            "Modelo" => 2010,
            "Tipo" => "Camioneta"
        ),
        "Propietario" => array(
            "Nombre" => "Leonardo",
            "Ciudad" => "Puebla",
            "Dirección" => "14 Sur"
        )
    ), "UUU4444" => array(
        "Auto" => array(
            "Marca" => "BMW",
            "Modelo" => 2018,
            "Tipo" => "camioneta"
        ),
        "Propietario" => array(
            "Nombre" => "Ignacio",
            "Ciudad" => "Huajuapan",
            "Dirección" => "18 poniente"
        )
    ), "TTT5555" => array(
        "Auto" => array(
            "Marca" => "Honda",
            "Modelo" => 2009,
            "Tipo" => "seda"
        ),
        "Propietario" => array(
            "Nombre" => "Damian",
            "Ciudad" => "Orizaba",
            "Dirección" => "5 de mayo"
        )
    ), "SSS6666" => array(
        "Auto" => array(
            "Marca" => "Honda",
            "Modelo" => 2015,
            "Tipo" => "hachback"
        ),
        "Propietario" => array(
            "Nombre" => "Luis",
            "Ciudad" => "Ciudad Juarez",
            "Dirección" => "Independencia 6"
        )
    ), "RRR7777" => array(
        "Auto" => array(
            "Marca" => "Ford",
            "Modelo" => 2021,
            "Tipo" => "hachback"
        ),
        "Propietario" => array(
            "Nombre" => "Fernando",
            "Ciudad" => "CDMX",
            "Dirección" => "Villa universitaria"
        )
    ), "QQQ7777" => array(
        "Auto" => array(
            "Marca" => "Ford",
            "Modelo" => 2022,
            "Tipo" => "Camioneta"
        ),
        "Propietario" => array(
            "Nombre" => "Amaury",
            "Ciudad" => "Puebla",
            "Dirección" => "Calle trujano"
        )
    ), "PPP8888" => array(
        "Auto" => array(
            "Marca" => "Ferrari",
            "Modelo" => 2024,
            "Tipo" => "hachback"
        ),
        "Propietario" => array(
            "Nombre" => "Darinel",
            "Ciudad" => "Puebla",
            "Dirección" => "San Martín"
        )
    ), "NNN9999" => array(
        "Auto" => array(
            "Marca" => "Ferrari",
            "Modelo" => 2015,
            "Tipo" => "seda"
        ),
        "Propietario" => array(
            "Nombre" => "Armando",
            "Ciudad" => "Nochixtlán",
            "Dirección" => "22 sur"
        )
    ),
    "MMM1112" => array(
        "Auto" => array(
            "Marca" => "Tesla",
            "Modelo" => 2017,
            "Tipo" => "seda"
        ),
        "Propietario" => array(
            "Nombre" => "Axel",
            "Ciudad" => "Tamazulapan",
            "Dirección" => "lomas"
        )
    ),"LLL2223" => array(
        "Auto" => array(
            "Marca" => "Tesla",
            "Modelo" => 2019,
            "Tipo" => "Camioneta"
        ),
        "Propietario" => array(
            "Nombre" => "Antonio",
            "Ciudad" => "Monterrey",
            "Dirección" => "Felix Día 4"
        )
    ),"JJJ3334" => array(
        "Auto" => array(
            "Marca" => "Nissan",
            "Modelo" => 2015,
            "Tipo" => "hachback"
        ),
        "Propietario" => array(
            "Nombre" => "Brayan",
            "Ciudad" => "Monterrey",
            "Dirección" => "Privada 14"
        )
    ),"EEE4534" => array(
        "Auto" => array(
            "Marca" => "Nissan",
            "Modelo" => 2020,
            "Tipo" => "seda"
        ),
        "Propietario" => array(
            "Nombre" => "Angel",
            "Ciudad" => "Puebla",
            "Dirección" => "Barrio la Peña"
        )
    ),



);

print_r($Datos_generales);

    ?>


<form action="http://localhost/tec_web/practicas/p06/index.php" method="post">
          
<p>Matricula: <input type="text" name="matricula" ></p>
<input type="submit" value="Consultar" name="consultar">         
                
<input type="hidden" name="todos" value="1">
<input type="submit" value="Mostrar Todos los Autos" name="mostrar_todos">
          
</form>
    
<?php
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['consultar'])) {
            $matricula = $_POST['matricula'];
            if (isset($Parque_Vehicular[$matricula])) {
                $vehiculo = $Parque_Vehicular[$matricula];
                echo "<h2>Información del Auto</h2>";
                echo "<p><strong>Matrícula:</strong> $matricula</p>";
                echo "<p><strong>Marca:</strong> {$vehiculo['Auto']['marca']}</p>";
                echo "<p><strong>Modelo:</strong> {$vehiculo['Auto']['modelo']}</p>";
                echo "<p><strong>Tipo:</strong> {$vehiculo['Auto']['tipo']}</p>";
                echo "<p><strong>Propietario:</strong> {$vehiculo['Propietario']['nombre']}</p>";
            } else {
                echo "<p>Matrícula no encontrada.</p>";
            }
        }

        if (isset($_POST['mostrar_todos'])) {
            echo "<h2>Todos los Autos Registrados</h2>";
            foreach ($Parque_Vehicular as $matricula => $vehiculo) {
                echo "<p><strong>Matrícula:</strong> $matricula | ";
                echo "<strong>Marca:</strong> {$vehiculo['Auto']['marca']} | ";
                echo "<strong>Modelo:</strong> {$vehiculo['Auto']['modelo']} | ";
                echo "<strong>Tipo:</strong> {$vehiculo['Auto']['tipo']} | ";
                echo "<strong>Propietario:</strong> {$vehiculo['Propietario']['nombre']}</p>";
            }
        }
    }
?>

</body>
</html>