<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 6</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <?php
        if(isset($_GET['numero']))
        {
            $num = $_GET['numero'];
            if ($num%5==0 && $num%7==0)
            {
                echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
            }
            else
            {
                echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
            }
        }
    ?>

    <h2>Ejemplo de POST</h2>
    <form action="http://localhost/tecweb/practicas/p04/index.php" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>
    <br>
    <?php
        if(isset($_POST["name"]) && isset($_POST["email"]))
        {
            echo $_POST["name"];
            echo '<br>';
            echo $_POST["email"];
        }
    ?>

<h2>Ejercicio 2</h2>
<p>Crea un programa para la generación repetitiva de 3 números aleatorios hasta obtener una secuencia compuesta por 
    <b>impar, par, impar.</b></p>    

    <?php

    $Numeros = [];
    $Contador_I=0;
    $Contador_N =0;

    do {

    $Numero1= rand(100,999);
    $Numero2= rand(100,999);
    $Numero3=rand(100,999);

    $Numeros [] = [$Numero1,$Numero2,$Numero3];

    $Contador_I ++;
    $Contador_N +=3;


    }while (!($Numero1%2!==0 && $Numero2%2==0 && $Numero3%2!==0));

    

    echo "<p>Estos números deben almacenarse en una matriz de Mx3, donde M es el número de filas y 3 el número de columnas. Al finalizar
        muestra el número de iteraciones y la cantidad de números generados.
    </p>";

     echo "<br>";

    echo "Matriz obtenida";
    echo "<br>";


    
    for ($i=0; $i<count($Numeros); $i++){

        echo implode (" ", $Numeros[$i]);
        echo "<br>";

    }
        

    echo "Número de iteraciones: $Contador_I";
    echo "<br>";
    echo "Numeros generados: $Contador_N";

    ?>


<h2>Ejercicio 3</h2>
<p>Utiliza un ciclo while para encontrar el primer número entero obtenido aleatoriamente, pero que ademas sea multiplo
    de un número dado</p> 

    <?php

     $N_dado = 9;
     $N_aleatorio = 0;

     while ( $N_aleatorio == 0 ||$N_aleatorio%$N_dado !=0){

        $N_aleatorio = rand(1,1000);

        echo "Numero obtenido: $N_aleatorio";
        echo "<br>";

     }

     echo "Primer número entero multiplo de $N_dado : $N_aleatorio";

     /* VARIANTE DO-WHILE*/

    /*------------------ */
     
     $N_dado=9;
     $N_aleatorio = 0;

     do{

     $N_aleatorio = rand(1,1000);

     echo "Numero obtenido: $N_aleatorio";
     echo "<br>";


     }while($N_aleatorio%$N_dado !=0);
     
     echo "Primer número entero multiplo de $N_dado : $N_aleatorio";

     
    /*------------------ */

    ?>

<h2>Ejercicio 4</h2>
<p>Crear un arreglo cuyos indices van de 97 a 122 y cuyos valores son de las letras de la "a" a la "z". Usa la función <b>chr(n)</b>
que devuelve el caracter cuyo código ASCII es "n" para poner el valor en cada indice</p> 

<?php

$Almacen = [];

for($i=97; $i<=122; $i++){

    $Almacen[$i] = chr($i);

}

echo "<table border = '1'>";

    echo "<tr>";

           echo "<th>Código ASCII</th>";
           echo "<th>Caracter</th>";

    echo "</tr>";


foreach($Almacen as $key => $value){

    echo "<tr>";

          echo "<td>. $key .</td>";
          echo "<td>. $value .</td>";

    echo "</tr>";

}

echo "</table>";

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


    </form>

    <?php

     echo "Validación de datos";

     if($sexo == "Femenino" && $edad>=18 && $edad <=35){

        echo "El sistema ha validado sus datos, usted comple con los requistos";

     }

     else {

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
    ser identificador por:
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
</p> 


</body>
</html>