<?php
//include '../../logs/errorLogging.php';      
include 'materiaController.php';


if (!empty($_POST)) {
    if (isset($_POST['idmateria'])) {
                      
            $remove = new materiaController();
            $remove->eliminarMateria($_POST['idmateria']);
            
        
    }
}
?>

