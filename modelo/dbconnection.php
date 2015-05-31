<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
#include_once './config.php';
define('DB_HOST', "localhost");
define('DB_USER', "userJuez");
define('DB_PASS', "P@ssw0rd");
define('DB_NAME', "online_judge");
define('DB_PORT', 3306);

class DbConnection {

    private static $instance = null;
    private $mysqlInstance = null;

    // Map the error numbers to user-friendly messages


    public function __construct() {

        @$this->mysqlInstance = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
        @$this->mysqlInstance->set_charset('utf8');

        if ($this->mysqlInstance->connect_error) {
            die("Error en conexi&oacute;n (" . $this->mysqlInstance->connect_errno . "): " . $this->mysqlInstance->connect_error);
        }
    }

    /**
     * Patron de diseño Unica instancia
     */
    public static function getInstance() {
        if (is_null(self::$instance) || !(self::$instance instanceof DbConnection)) {
            self::$instance = new DbConnection();
        }
        return self::$instance;
    }

    /* Evitamos el clonaje del objeto. Patrón Singleton */

    private function __clone() {
        
    }

    /* Método para ejecutar una sentencia sql con sus parámetros */

    public function executeQuery($sql, $params = NULL) {
        if (!is_null($params) && is_array($params)) {
            $sql = vsprintf($sql, $params);
        }
        //Se ejecuta la consulta con los caracteres adecuadamente conectados con real_escape_string
        $stmt = $this->mysqlInstance->query($sql);
        return $stmt;
    }
    
    /*
     * Metodo que ejecuta sentencias SELECT
     */
    public function executeSelectQuery($sql){
        $dbResult = $this->executeQuery($sql);
        $result=[];
        
        if ($dbResult) {
            while ($fila = $dbResult->fetch_assoc()) {
                array_push($result, $fila);
            }
            
            //Liberando el espacio en memoria usado para almacenar los resultados
            $this->releaseResults($dbResult);
        } else {
            die("Error: " . $this->mysqlInstance->error . $this->mysqlInstance->errno);
        }
        
        return $result;
    }

    /* Libera los datos obtenidos en la consulta una vez han sido usados */

    public function releaseResults($results) {
        $results->free();
    }

    /* Cierra la conexion MySQL */

    public function close() {
        $this->mysqlInstance->close();
    }
    

}
