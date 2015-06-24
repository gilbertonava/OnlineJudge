<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usersController
 *
 * @author Gil
 */

include_once 'dbconnection.php';

class usersController {
    //put your code here
    
    private $con=NULL;
            
            
    public function __construct() {
        $this->con= DbConnection::getInstance();     
        
    }
    
    public function listarUsuarios($param) {
        $query="SELECT nombre,paterno,materno,idUsuario";
        
         return $this->con->executeSelectQuery($query,'');
        
    }
    
}
