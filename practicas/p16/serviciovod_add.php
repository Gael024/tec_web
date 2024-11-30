<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    $usuario = $_POST['usuario'];    
    $idioma = $_POST['size'];     
    $pel_genero = $_POST['pel-genero'];     
    $pel_titulo1 = $_POST['pel-titulo1'];  
    $pel_duracion1 = $_POST['pel-duracion1']; 
    $pel_titulo2 = $_POST['pel-titulo2'];  
    $pel_duracion2 = $_POST['pel-duracion2'];
    $ser_genero = $_POST['ser-genero'];   
    $ser_titulo1 = $_POST['ser-titulo1'];  
    $ser_duracion1 = $_POST['ser-duracion1']; 
    $ser_titulo2 = $_POST['ser-titulo2'];  
    $ser_duracion2 = $_POST['ser-duracion2'];

    $xml= new DOMDocument();
    $xml->load('catalogovodN.xml');

    $perfil= $xml->createElement('perfil');
    $perfil->setAttribute('usuario', $usuario);
    $perfil->setAttribute('idioma', $idioma);

  
    $cuenta = $xml->getElementsByTagName('cuenta')->item(0);
    $cuenta->getElementsByTagName('perfiles')->item(0)->appendChild($perfil);

   
    $genero_pelicula_nodo = $xml->createElement('genero');
    $genero_pelicula_nodo->setAttribute('nombre', $pel_genero);
    $titulo1 = $xml->createElement('titulo', $pel_titulo1);
    $titulo1->setAttribute('duracion', $pel_duracion1);
    $titulo2 = $xml->createElement('titulo', $pel_titulo2);
    $titulo2->setAttribute('duracion', $pel_duracion2);
   
    $genero_pelicula_nodo->appendChild($titulo1);
    $genero_pelicula_nodo->appendChild($titulo2);
    $peliculas = $xml->getElementsByTagName('peliculas')->item(0);
    $peliculas->appendChild($genero_pelicula_nodo);


    $genero_serie_nodo = $xml->createElement('genero');
    $genero_serie_nodo->setAttribute('nombre', $ser_genero);
    $titulo1_serie = $xml->createElement('titulo', $ser_titulo1);
    $titulo1_serie->setAttribute('duracion', $ser_duracion1);
    $titulo2_serie = $xml->createElement('titulo', $ser_titulo2);
    $titulo2_serie->setAttribute('duracion', $ser_duracion2);
  
    $genero_serie_nodo->appendChild($titulo1_serie);
    $genero_serie_nodo->appendChild($titulo2_serie);
    $series = $xml->getElementsByTagName('series')->item(0);
    $series->appendChild($genero_serie_nodo);

   
    $xml->save('catalogovod_actualizado.xml');
    header('Content-Type: application/xml');
    header('Content-Disposition: attachment; filename="catalogovod_act.xml"');
    readfile('catalogovod_act.xml');
    }
?>