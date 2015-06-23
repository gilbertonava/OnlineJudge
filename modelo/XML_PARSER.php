<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './dbconnection.php';




$tab='e1mvkem';

$query="SHOW COLUMNS FROM ".$tab;

$CON= DbConnection::getInstance();

$res=$CON->executeSelectQuery($query,'');

foreach ($res as $key => $value) {
    echo $tab.'.set'.$value['Field'].'( field.getChildTextTrim("'.$value['Field'].'") );<br>';
}
?>
