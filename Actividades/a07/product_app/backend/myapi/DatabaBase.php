<?php

namespace TECWEB\MYAPI;

class DataBase {

    protected $conexion;

    public function __construct($user, $pass, $db) {

        $this->conexion = @mysqli_connect(

            $user = 'root',
            $pass = '',
            $db = 'marketzone'
        );

    
}

}
?>