<?php
include './examenController.php';
if (!empty($_POST)) {
    if (isset($_POST['idAlumno'])) {

       
        if (isset($_POST['ideliminar'])) {
            
            $remove = new gestionExamenes();
            $remove->removerAlumnodeExamen($_POST['idAlumno'], $_POST['ideliminar']);
            
        }
    }
}
?>