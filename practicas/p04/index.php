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
    
     echo '<h4>C. Vuelve a mostar el contenido de cada uno</h4>';

     echo $a;
     echo '<br>';
     echo $b;
     echo'<br>';
     echo $c;

     echo '<br>';
     echo '<h4>D. Describe y muestra que ocurrio en el segundo bloque de asignaciones</h4>';
     echo '<p>En el primer bloque de asignaciones tanto la variable "a" como "b" tiene como valor una cadena de texto y la 
     variable "c" tiene el valor de la variable "a", por ello al mostrar el contenido de las variables, "a" y "c" muestran la 
     misma cadena. En el segundo bloque de asignaciones se cambia la cadena de texto que tiene la variable "a" y a la variable "b"
     se le da el valor de la variable "a"; cuando volvemos a mostrar el contenido de las variables, todas muestran la misma cadena
     de texto, ya que a la variable "a" se le ha asignado de forma directa y tanto "b" como "c" tiene el valor de "a". </p>';

     
     unset($a);
     unset($b);
     unset($c);
     ?>

     <h2>Ejercicio 3</h2>
     <p>Muestra el contenido de cada variabla inmediatamente despues de cada asignación, verificar la evolución del tipo de 
        estas variables (imprime todos los componentes de los arreglos):
     </p> 
    
    <?php
    $a = "PHP5";
    echo $a;
    $z [] = &$a;
    print_r ($z);
    $b = "5a version de PHP";
    echo $b;
    $c = $b*10;
    echo $c;
    $a .= $b;
    echo $a;
    $b *= $c;
    echo $b;
    $z[0] = "MySQL";
    print_r($z); 

    
    ?>

    <h2>Ejercicio 4</h2>
    <p> Lee y muestra los valores de las variables del ejercicio anterior, pero ahora con la ayuda de la matriz $GLOBALS o del 
   modificador global de php. </p>

    <?php
    
    function ejercicio4 (){

      global $a, $z, $b, $c;

      echo "El valor de la variable a es $a";
      echo "El valor de la variable z es $z";
      echo "El valor de la variable b es$b";
      echo "El valor de la variable c es$c";

    }
    
    ejercicio4();

    ?>


    <h2>Ejercicio 5</h2>
    <p> Dar el valor de las variables $a, $b, $c al final del siguinte script </p>

    <?php
    
    echo '<ul>';
    echo '<li>$a = "7 personas"</li>';
    echo '<li>$b = (interger) $a</li>';
    echo '<li>$a = "9E3"</li>';
    echo '<li>$c = (double) $a</li>';
    echo '</ul>';

    echo "Valor de la variable a =  9E3";
    echo "Valor de la variable b =  7 personas";
    echo "Valor de la variable c =  0.0";

    ?>

    
    <h2>Ejercicio 6</h2>
    <p> Dar y comprobar el valor boolenano de las variables $a, $b, $c, $d, $e y $f y muestralas usando la función 
        var_dump(<datos>)</p>
    
        <br>
    
       <?php

       
    echo '<ul>';
    echo '<li>$a = "0"</li>';
    echo '<li>$b = "TRUE"</li>';
    echo '<li>$c = "FALSE"</li>';
    echo '<li>$d = ($a OR $b)</li>';
    echo '<li>$e = ($a AND $c)</li>';
    echo '<li>$f = ($a XOR $b)</li>';

    echo '</ul>';


    var_dump ($a);
    var_dump ($b);
    var_dump ($c);
    var_dump ($d);
    var_dump ($e);
    var_dump ($f);
  

       ?>

        <p>Despues investiga una función de PHP que permita transformar el valor booleano de $c y $e en uno que 
          se pueda mostrar con un echo:</p>

    <?php
    
    echo "Valor de la variable <b>c</b> = ". var_export($c,true);
    echo "Valor de la variable <b>e</b> =". var_export($e,true);

    ?>
   
</body>
</html>