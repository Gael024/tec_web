<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 4</title>
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

</body>
</html>