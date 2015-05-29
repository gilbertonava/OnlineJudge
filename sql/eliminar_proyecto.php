<?php

include './dbconnection.php';

$mysqli= Conectarse();

 
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
            echo 'Se ha eliminado correctamente';
            unlink($ruta);
            
        }
        else{ echo 'No se pudo eliminar el Registo seleccionado';}
    }
    
 else {
    echo 'vacio POST[]';
}
?>