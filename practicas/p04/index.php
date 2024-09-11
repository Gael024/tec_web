<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 3</title>
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
</body>
</html>