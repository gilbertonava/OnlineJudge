<?php

include 'conexion.php';

$mysqli = Conectarse();

/**
 * Todo
 * GET use id, who is creting project
 * Create projects directory where projects files will be hosted
 */
//here we should get the session user id
$idDocente = 1;


/* validar archivo a subir */

if (isset($_FILES["rutaProyecto"])) {
    
    if($_FILES["rutaProyecto"]["error"]!=UPLOAD_ERR_NO_FILE){
    
    echo '<h2>'.$_POST['rutaProyecto'].'</h2>';

    try {

        // Undefined | Multiple Files | $_FILES Corruption Attack
        // If this request falls under any of them, treat it invalid.
        if (
                !isset($_FILES["rutaProyecto"]["error"]) ||
                is_array($_FILES["rutaProyecto"]["error"])
        ) {
            throw new RuntimeException("Invalid parameters.");
        }

        // Check $_FILES['upfile']['error'] value.
        switch ($_FILES["rutaProyecto"]["error"]) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No file sent.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('Exceeded filesize limit.');
            default:
                throw new RuntimeException('Unknown errors.');
        }

        // You should also check filesize here. 
        if ($_FILES['rutaProyecto']['size'] > 10000000) {
            throw new RuntimeException('Exceeded filesize limit.');
        }

        // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
        // Check MIME Type by yourself.
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        if (false === $ext = array_search(
                $finfo->file($_FILES["rutaProyecto"]["tmp_name"]), array(
            "pdf" => "application/pdf",
                ), true
                )) {
            throw new RuntimeException('Invalid file format.');
        }

        // You should name it uniquely.
        // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
        // On this example, obtain safe unique name from its binary data.

        $file_name = explode("_@_@_", $_POST['oldfile']);

        if ($file_name[1] != $_FILES['rutaProyecto']['name']) {




            $name2file = sha1_file($_FILES['rutaProyecto']['tmp_name']) . '_@_@_' . $_FILES['rutaProyecto']['name'];
            if (!move_uploaded_file(
                            $_FILES['rutaProyecto']['tmp_name'], sprintf('../_Proyectos/%s.%s', $name2file, $ext)
                    )) {
                throw new RuntimeException('Failed to move uploaded file.');
            }
            
            unlink('../_Proyectos/'.$_POST['oldfile'].'.pdf');


            //store data in db

            if (!empty($_POST)) {
                //we suppose that data has been validate previuosly

                $query = "UPDATE proyecto SET rutaProyecto='" . $name2file . "',complejidad='" . $_POST['complejidad']
                        . "',estado='" . $_POST['estadoProyecto'] . "',idDocente=" . $idDocente . ",nombreProyecto='" . $_POST['nombreProyecto']
                        . "'WHERE idproyecto=" . $_POST['id'] . ";";


                echo $query;

                if (!$resultado = $mysqli->query($query)) {
                    echo '<br><h1>Unable to insert</h1><br />';
                    session_start();
                    $_SESSION['proyectoActualizado'] = 'false';
                    header('Location:../pages/listar_proyecto.php');
                } else {
                    echo '<br><h1>Insert successfully</h1> <br />';

                    /* if (isset($_FILES["rutaProyecto"])) {

                      $tmp_name = $_FILES["rutaProyecto"]["tmp_name"];
                      $name = $_FILES["rutaProyecto"]["name"];
                      move_uploaded_file($tmp_name, "../_Proyectos/ $name");
                     */
                    session_start();
                    $_SESSION['proyectoActualizado'] = 'true';
                    header('Location:../pages/listar_proyecto.php');
                    //}
                }
            }
        }
        // end store data


        echo 'File is uploaded successfully.';
    } catch (RuntimeException $e) {

        echo $e->getMessage();
    }
    }
    else{
        //update all execpt file
        
        if (!empty($_POST)) {
                //we suppose that data has been validate previuosly

                $query = "UPDATE proyecto SET complejidad='" . $_POST['complejidad']
                        . "',estado='" . $_POST['estadoProyecto'] . "',idDocente=" . $idDocente . ",nombreProyecto='" . $_POST['nombreProyecto']
                        . "'WHERE idproyecto=" . $_POST['id'] . ";";


                echo $query;

                if (!$resultado = $mysqli->query($query)) {
                    echo '<br><h1>Unable to insert</h1><br />';
                    session_start();
                    $_SESSION['proyectoActualizado'] = 'false';
                    header('Location:../pages/listar_proyecto.php');
                } else {
                    echo '<br><h1>Insert successfully</h1> <br />';

                    /* if (isset($_FILES["rutaProyecto"])) {

                      $tmp_name = $_FILES["rutaProyecto"]["tmp_name"];
                      $name = $_FILES["rutaProyecto"]["name"];
                      move_uploaded_file($tmp_name, "../_Proyectos/ $name");
                     */
                    session_start();
                    $_SESSION['proyectoActualizado'] = 'true';
                    header('Location:../pages/listar_proyecto.php');
                    //}
                }
            }
        
    }
} else {
    session_start();
    $_SESSION['error_file'] = 'true';
    header('Location:../pages/listar_proyecto.php');
}
?>

