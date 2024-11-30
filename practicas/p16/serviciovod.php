<?php
libxml_use_internal_errors(true);
$xml = new DOMDocument();
$documento = file_get_contents('catalogovodN.xml');
$xml->loadXML($documento, LIBXML_NOBLANKS);
$xsd = 'catalogovodN.xsd';
if (!$xml->schemaValidate($xsd)) {
    $errors = libxml_get_errors();
    $lista = '';
    echo '<html>';
    echo '<head>
        <meta charset="UTF-8"/>
        <title>Errores del Catálogo VOD</title>
    </head>';
    echo '<body>';
    echo '<h1>Error al validar el archivo</h1>';
    echo '<ol>';
    foreach ($errors as $error) {
        echo '<li>'. $error->message . '</li>';
    }
    echo '</ol>';
    echo '</body>';
    echo '</html>';
} else {
    //obtener datos
    $contenido = $xml->getElementsByTagName('contenido')->item(0);
    $peliculas = $contenido->getElementsByTagName('peliculas');
    $series = $contenido->getElementsByTagName('series');
    //formato html
    echo '<html>';
    echo '<head>
        <meta charset="UTF-8"/>
        <title>Catálogo VOD</title>
        <style>h1 {margin-left: 600px}
         			table {border: 1px solid; width: 70%; margin-left:200px}
                    th {text-align: center; background-color: orange;}
                    td {text-align: center;}
                     h2{margin-left:670px}
        </style>
    </head>';
    echo '<body>';
    echo '<h1>Catálogo disponible</h1>';
    echo '<h2>Películas</h2>';
    echo '<table border="1">';
    echo '<thead>';
    echo '<tr>
            <th>Título</th>
            <th>Duración</th>
            <th>Género</th>
        </tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($peliculas as $pelicula){
        $generos = $pelicula->getElementsByTagName('genero');
        foreach($generos as $genero){
            $nombreGenero = $genero->getAttribute('nombre');
            $titulos = $genero->getElementsByTagName('titulo');
            foreach ($titulos as $titulo){
                $duracion = $titulo->getAttribute('duracion');
                $nombreTitulo = $titulo->nodeValue;
                echo '<tr>';
                echo '<td>' . $nombreTitulo . '</td>';
                echo '<td>' . $duracion . '</td>';
                echo '<td>' . $nombreGenero . '</td>';
                echo '</tr>';
            }
        }
    }
    echo '</tbody>';
    echo '</table>';
    echo '<h2>Series</h2>';
    echo '<table border="1">';
    echo '<thead>';
    echo '<tr>
            <th>Título</th>
            <th>Duración</th>
            <th>Género</th>
        </tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($series as $serie){
        $generos = $serie->getElementsByTagName('genero');
        foreach($generos as $genero){
            $nombreGenero = $genero->getAttribute('nombre');
            $titulos = $genero->getElementsByTagName('titulo');
            foreach ($titulos as $titulo){
                $duracion = $titulo->getAttribute('duracion');
                $nombreTitulo = $titulo->nodeValue;
                echo '<tr>';
                echo '<td>' . $nombreTitulo . '</td>';
                echo '<td>' . $duracion . '</td>';
                echo '<td>' . $nombreGenero . '</td>';
                echo '</tr>';
            }
        }
    }
    echo '</tbody>';
    echo '</table>';
    echo '</body>';
    echo '</html>';
}
?>
