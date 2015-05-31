<?php
#Eliminar proyecto seleccionado
#desde la peticion hecha desde el modal dialog en la ventana <-listar proyecto

include './dbconnection.php';

$mysqli=  DbConnection::getInstance();

 
    if(isset($_POST['idTo'])){
        
        $archivo='SELECT rutaProyecto FROM proyecto WHERE idproyecto='.$_POST['idTo'].';';
        $file=$mysqli->executeQuery($archivo,'');
        $ruta="";
        if ($file){
            
            $row=mysqli_fetch_array($file,MYSQLI_BOTH);
            $ruta='../_Proyectos/'.$row['rutaProyecto'].'.pdf';
        }
        //echo $ruta;
        
        $query='DELETE FROM proyecto where idproyecto='.$_POST['idTo'].';';
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