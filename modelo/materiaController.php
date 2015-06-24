<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of materiaController
 *
 * @author Gil
 * 
 * 
 */

//include '../../logs/errorLogging.php';      
include_once 'dbconnection.php';
  
    
class materiaController {
    //put your code here
       

    public function __construct() {
    
    }
    
    public function listarMaterias($idDocente) {
        
         $conex = DbConnection::getInstance();
        
         try {
            

            $query = 'SELECT idmateria,nombre,creditos,idDocente  '
                    . 'FROM materia WHERE idDocente='.$idDocente;

            $resultado = $conex->executeSelectQuery($query, '');

            return $resultado;
        } catch (RuntimeException $ex) {
            @header('Location:pages/error.html');
        }
        
    }
    
    public function eliminarMateria($idmateria) {
        
        $conex = DbConnection::getInstance();
        
         try {
            

            $query = 'DELETE FROM materia WHERE idmateria='.$idmateria;

            $resultado = $conex->executeQuery($query, '');

            return $resultado;
        } catch (RuntimeException $ex) {
            @header('Location:pages/error.html');
        }
    }
    
    
    public function registrarMateria(array $POST) {
        $conex = DbConnection::getInstance();
        
         try {
            
             
            $query = "INSERT INTO materia "
                    . "VALUES(null,'".$POST['nombre']."',".$POST['creditos'].",".$POST['docente'].");";

            $resultado = $conex->executeQuery($query, '');
            
           

            return $resultado;
        } catch (RuntimeException $ex) {
            @header('Location:pages/error.html');
        }
        
    }
    
     public function actualizarMateria(array $POST) {
        $conex = DbConnection::getInstance();
        
         try {
            
             
            $query = "UPDATE materia "
                    . "SET nombre='".$POST['nombre']."', creditos=".$POST['creditos'].""
                    . " WHERE idDocente=".$POST['docente']." AND idmateria=".$POST['id'];

            $resultado = $conex->executeQuery($query, '');                      
            return $resultado;
        } catch (RuntimeException $ex) {
            @header('Location:pages/error.html');
        }   
     }
}