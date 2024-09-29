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
    echo " Valor de a = $a";
    echo '<br>';
    $z [] = &$a;
    echo "Valor de z". print_r ($z);
    echo '<br>';
    $b = "5a version de PHP";
    echo "Valor de b = $b";
    echo '<br>';
    @$c = $b*10;
    echo "Valor de C =$c";
    echo '<br>';
    $a .= $b;
    echo "Valor de a=  $a";
    echo 'br>';
    @$b *= $c;
    echo "Valor de b $b";
    $z[0] = "MySQL";
    echo "Valor de z". print_r($z); 

    
    
    ?>

    <h2>Ejercicio 4</h2>
    <p> Lee y muestra los valores de las variables del ejercicio anterior, pero ahora con la ayuda de la matriz $GLOBALS o del 
   modificador global de php. </p>

    <?php
    echo '<ul>';

    
    $a = "PHP5";
    $z[] = &$a;
    $b = "5a version de PHP";
    @$c = $b*10;
    $a .= $b;
    @$b *= $c;
    $z[0] = "MySQL";

    echo "<li>Valor de \$a: " . $GLOBALS['a'] . "</li>\n";  
    echo "<li>Valor de \$b: " . $GLOBALS['b'] . "</li>\n";  
    echo "<li>Valor de \$c: " . $GLOBALS['c'] . "</li>\n";  
    echo "<li>Valor de \$z[0]: " . $GLOBALS['z'][0] . "</li>\n";
    
    echo '</ul>';
        

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
    
    echo '<br>';
    echo "Valor de la variable a =  9E3";
    echo '<br>';
    echo "Valor de la variable b =  7";
    echo '<br>';
    echo "Valor de la variable c = 9000";

    ?>

    
    <h2>Ejercicio 6</h2>
    <p> Dar y comprobar el valor boolenano de las variables $a, $b, $c, $d, $e y $f y muestralas usando la función 
        var_dump(datos)</p>
    
      <div>  <br/> </div>
    
       <?php

       
    echo '<ul>';
    echo '<li>$a = "0"</li>';
    echo '<li>$b = "TRUE"</li>';
    echo '<li>$c = "FALSE"</li>';
    echo '<li>$d = ($a OR $b)</li>';
    echo '<li>$e = ($a AND $c)</li>';
    echo '<li>$f = ($a XOR $b)</li>';

    echo '</ul>';


    $a = "0";
    $b = "TRUE";
    $c = FALSE;
    $d = ($a OR $b);
    $e = ($a AND $c);
    $f = ($a XOR $b);


   echo "Valor de a". var_dump ((bool)$a);
    echo'<br>';
   echo "Valor de b". var_dump ((bool)$b);
    echo'<br>';
    echo "Valor de c". var_dump ($c);
    echo'<br>';
   echo "Valor de d". var_dump  ($d);
    echo'<br>';
   echo "Valor de e". var_dump ($e);
    echo'<br>';
   echo "Valor de f". var_dump ($f);
  

       ?>

        <p>Despues investiga una función de PHP que permita transformar el valor booleano de $c y $e en uno que 
          se pueda mostrar con un echo:</p>

    <?php
    
    echo "Valor de la variable <b>c</b> = ". var_export($c,true);
    echo "Valor de la variable <b>e</b> =". var_export($e,true);

    unset($a);
    unset($b);
    unset($c);
    unset($d);
    unset($e);
    unset($f);


    ?>
   
    <h2>Ejercicio 7</h2>
    <p> Usando la variable predefinida $_SERVER, determina lo siguiente:</p>

    <ul>
   <li>La versión de Apache y PHP</li>
  <li>El nombre del sistema operativo</li>
  <li>El idioma del navegador (cliente)</li>
  </ul>

  <?php

echo '<b>Versión de Apache y PHP</b>'. $_SERVER['SERVER_SOFTWARE'];
echo '<br>';
echo '<b>Nombre del sistema operativo</b>'. PHP_OS;
echo '<br>';
echo '<b>Idioma del navegador</b>'. $_SERVER['HTTP_ACCEPT_LANGUAGE'];

   
  ?>

<p>
    <a href="https://validator.w3.org/markup/check?uri=referer"><img
      src="https://www.w3.org/Icons/valid-xhtml11" alt="Valid XHTML 1.1" height="31" width="88" /></a>
  </p>

</body>
</html>