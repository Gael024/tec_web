<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 4</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Determina cuál de las siguientes variables son válidas y explica por qué:</p>
    <p>$_myvar,  $_7var,  myvar,  $myvar,  $var7,  $_element1, $house*5</p>
    <?php
        //AQUI VA MI CÓDIGO PHP
        $_myvar;
        $_7var;
        //myvar;       // Inválida
        $myvar;
        $var7;
        $_element1;
        //$house*5;     // Invalida
        
        echo '<h4>Respuesta:</h4>';   
    
        echo '<ul>';
        echo '<li><b>$_myvar</b> Es valida ya que inica con "$" y el primer caracter es un guión bajo.</li>';
        echo '<li><b>$_7var</b> Es valida ya que inica con "$" y el primer caracter es un guión bajo.</li>';
        echo '<li><b>myvar</b> No es valida ya que no tiene el simbolo "$".</li>';
        echo '<li><b>$myvar</b> Es valida; tiene el simbolo "$" y su primer caracter es una letra.</li>';
        echo '<li><b>$var7</b> Es válida porque inicia con una letra y tiene sl simbolo "$".</li>';
        echo '<li><b>$_element1</b> Es válida porque inicia con guión bajo y tiene el simbolo "$".</li>';
        echo '<li><b>$house*5</b> No es valida, si bien si tiene el simbolo "$" y comienza con una letra, tiene un "*" en su
        nombre, lo cual es incorrecto, ya que no se permiten caracteres especiales en los nombres de las variables .</li>';
        echo '</ul>';
    ?>
 
     <h2>Ejercicio 2</h2>
     <p>Proporcionar los valores de $a, $b, $c como se indica:</p> 
     <?php
     
     $a = "ManejadorSQL";
     $b = 'MySQL';
     $c = &$a;

     echo '<h4>A. Ahora muestra el contenido de cada variable</h4>';

     echo $a;
     echo '<br>';
     echo $b;
     echo'<br>';
     echo $c;
     
     echo '<h4>B. Agrega al código actual las asignaciones correspondientes</h4>';
     
     $a = "PHP server";
     $b = &$a;
     echo '<br>';
     echo '<h4>C. Vuelve a mostar el contenido de cada uno</h4>';

     echo '<br>';
     echo $a;
     echo '<br>';
     echo $b;
     echo'<br>';
     echo $c;

     echo '<br>';
     echo '<h4>D. Describe y muestra que ocurrio en el segundo bloque de asignaciones</h4>';
     echo '<br>';
     echo '<p>En el primer bloque de asignaciones tanto la variable "a" como "b" tiene como valor una cadena de texto y la 
     variable "c" tiene el valor de la variable "a", por ello al mostrar el contenido de las variables, "a" y "c" muestran la 
     misma cadena. En el segundo bloque de asignaciones se cambia la cadena de texto que tiene la variable "a" y a la variable "b"
     se le da el valor de la variable "a"; cuando volvemos a mostrar el contenido de las variables, todas muestran la misma cadena
     de texto, ya que a la variable "a" se le ha asignado de forma directa y tanto "b" como "c" tiene el valor de "a". </p>';


     ?>

</body>
</html>