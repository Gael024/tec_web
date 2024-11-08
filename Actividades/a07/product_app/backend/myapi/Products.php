<?php

namespace TECWEB\MYAPI;

use TECWEB\MYAPI\DataBase;

require_once __DIR__. '/DataBase.php';

class Products extends DataBase {

    private $response;

    public function __construct($db, $user='root', $pass=''){

           
        $this->response = array();

        parent::__construct($user, $pass, $db);

    }
        

        public function add($jsonOBJ) {

        }

        public function delete($id){

        }

        public function edit (){


        }

        public function list(){

        }

        public function search(){

        }

        public function single(){


        }

        public function singleByName(){

        }

        public function getData(){
              
            return json_encode($this->response);

        }
    

    }

?>