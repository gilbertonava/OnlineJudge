<?php
#Eliminar proyecto seleccionado
#desde la peticion hecha desde el modal dialog en la ventana <-listar proyecto

include './dbconnection.php';
include '../logs/errorLogging.php';


$mysqli=  DbConnection::getInstance();

 
    if(isset($_POST['idTo'])){
        
        $archivo='SELECT rutaArchivo FROM examen WHERE idexamen='.$_POST['idTo'].';';
        $file=$mysqli->executeQuery($archivo,'');
        $ruta="";
        if ($file){
            
            $row=mysqli_fetch_array($file,MYSQLI_BOTH);
            $ruta='../_Examenes/'.$row['rutaArchivo'].'.pdf';
        }
        //echo $ruta;
        
        $query='DELETE FROM examen where idexamen='.$_POST['idTo'].';';
        $resultado=$mysqli->executeQuery($query);
        if ($resultado) {
            $_SESSION['proyectoEliminado']='true';
            unlink($ruta);
            
        }
        else{ $_SESSION['proyectoEliminado']='false';}
    }
    
 else {
    $_SESSION['proyectoEliminado']='false';
}
?>