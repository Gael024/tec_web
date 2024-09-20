<?php

function ejercicio1 (){


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

}


function ejercicio2 (){


    
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

}



function ejercicio3(){

    if(isset($_GET['numerodado'])){

    }

    $N_dado = $_GET ['numerodado'];
     $N_aleatorio = 0;

     while ( $N_aleatorio == 0 ||$N_aleatorio%$N_dado !=0){

        $N_aleatorio = rand(1,1000);

        echo "Numero obtenido: $N_aleatorio";
        echo "<br>";

     }

     echo "Primer número entero multiplo de $N_dado : $N_aleatorio";

     /* VARIANTE DO-WHILE*/

    /*------------------ */
     
    /*
     $N_dado=9;
     $N_aleatorio = 0;

     do{

     $N_aleatorio = rand(1,1000);

     echo "Numero obtenido: $N_aleatorio";
     echo "<br>";


     }while($N_aleatorio%$N_dado !=0);
     
     echo "Primer número entero multiplo de $N_dado : $N_aleatorio";
*/
     
    /*------------------ */


}



function ejercicio4(){


    
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

}
?>