<?php

/**
 * Description of gestionProyectos
 * Clase para la manipulacion del contenido con los proyectos
 * desde hacer el listado de los proyectos disponibles, 
 * edicion, carga y eliminacion de los mismos
 * @author Gil
 */
include_once 'dbconnection.php';
include_once '../../logs/errorLogging.php';
class GestionProyecto {

    public function __construct() {
        
    }

    #show all projects with state=active
    public function listarProyectos() {
        try {
            $con = DbConnection::getInstance();

            $query = 'SELECT idproyecto,rutaProyecto,complejidad,nombreProyecto '
                    . 'FROM proyecto WHERE estado=\'ACTIVO\';';

            $resultado = $con->executeSelectQuery($query, '');

            return $resultado;
        } catch (RuntimeException $ex) {
            header('Location:pages/error.html');
        }
    }

    #create a new record project
    public function RegistrarProyecto(array $param) {

        $con = DbConnection::getInstance();

        /**
         * Todo
         * GET use id, who is creting project
         * Create projects directory where projects files will be hosted
         */
        //here we should get the session user id
        $idDocente = 2;


        /* validar archivo a subir */

        if (isset($_FILES["rutaProyecto"])) {

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
                //@header('Location:../pages/problemas/gp_nuevo_proyecto.php');

                $name2file = sha1_file($_FILES['rutaProyecto']['tmp_name']) . '_@_@_' . $_FILES['rutaProyecto']['name'];
                if (!move_uploaded_file(
                                $_FILES['rutaProyecto']['tmp_name'], sprintf('../../_Proyectos/%s.%s', $name2file, $ext)
                        )) {
                    throw new RuntimeException('Failed to move uploaded file.');
                }



                //store data in db

                if (!empty($param)) {
                    //we suppose that data has been validate previuosly

                    $query = "INSERT INTO proyecto(rutaProyecto,complejidad,estado,idDocente,nombreProyecto) "
                            . "values('" . $name2file . "','" . $param['complejidad']
                            . "','" . $param['estadoProyecto'] . "'," . $idDocente . ",'" . $param['nombreProyecto'] . "');";

                    //echo $query;

                    if (!$resultado = $con->executeQuery($query, '')) {
                        //echo '<br><h1>Unable to insert</h1><br />';
                        //session_start();
                        $_SESSION['proyectoInsertado'] = 'false';
                        //header('Location:../pages/problemas/gp_nuevo_proyecto.php');
                    } else {
                        //echo '<br><h1>Insert successfully</h1> <br />';

                        /* if (isset($_FILES["rutaProyecto"])) {

                          $tmp_name = $_FILES["rutaProyecto"]["tmp_name"];
                          $name = $_FILES["rutaProyecto"]["name"];
                          move_uploaded_file($tmp_name, "../_Proyectos/ $name");
                         */
                        //session_start();
                        $_SESSION['proyectoInsertado'] = 'true';
                        //header('Location:../pages/problemas/gp_nuevo_proyecto.php');
                        //}
                    }
                }
                // end store data
                //echo 'File is uploaded successfully.';
            } catch (RuntimeException $e) {

                echo $e->getMessage();
            }
        } else {
            //session_start();
            $_SESSION['error_file'] = 'true';
            //header('Location:../pages/problemas/gp_nuevo_proyecto.php');
        }
    }

    #remove projects with idproyecto in array[]
    public function eliminarProyectos(array $POST) {
        $projectsIds = filter_input(INPUT_POST, 'eliminar', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        if (!is_null($projectsIds)) {
           $con = DbConnection::getInstance();

            for ($index = 0; $index < count($projectsIds); $index++) {

                $archivo = 'SELECT rutaProyecto FROM proyecto WHERE idproyecto=' . $projectsIds[$index] . ';';
                $file =$con->executeQuery($archivo, '');
                $ruta = "";
                if ($file) {

                    $row = mysqli_fetch_array($file, MYSQLI_BOTH);
                    $ruta = '../../_Proyectos/' . $row['rutaProyecto'] . '.pdf';
                }
                //echo $ruta;

                $query = 'DELETE FROM proyecto where idproyecto=' . $projectsIds[$index] . ';';
                $resultado =$con->executeQuery($query);
                if ($resultado && $ruta != '../../_Proyectos/.pdf') {
                    $_SESSION['proyectoEliminado'] = 'true';
                    unlink($ruta);
                } else {
                    $_SESSION['proyectoEliminado'] = 'false';
                }
            }
        } else {
            $_SESSION['proyectoEliminado'] = 'false';
        }
    }

    #update data for the project received
    public function actualizarProyecto(array $POST) {

       $con = DbConnection::getInstance();

        /**
         * Todo
         * GET use id, who is creting project
         * Create projects directory where projects files will be hosted
         */
        //here we should get the session user id
        $idDocente = 1;


        /* validar archivo a subir <- solo si se cambiara el project file*/

        if (isset($_FILES["rutaProyecto"])) {

            if ($_FILES["rutaProyecto"]["error"] != UPLOAD_ERR_NO_FILE) {

               // echo '<h2>' . $POST['rutaProyecto'] . '</h2>';

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

                    $file_name = explode("_@_@_", $POST['oldfile']);

                    if ($file_name[1] != $_FILES['rutaProyecto']['name']) {




                        $name2file = sha1_file($_FILES['rutaProyecto']['tmp_name']) . '_@_@_' . $_FILES['rutaProyecto']['name'];
                        if (!move_uploaded_file(
                                        $_FILES['rutaProyecto']['tmp_name'], sprintf('../_Proyectos/%s.%s', $name2file, $ext)
                                )) {
                            throw new RuntimeException('Failed to move uploaded file.');
                        }

                        unlink('../_Proyectos/' . $POST['oldfile'] . '.pdf');

                        //store data in db

                        if (!empty($POST)) {
                            //we suppose that data has been validate previuosly

                            $query = "UPDATE proyecto SET rutaProyecto='" . $name2file . "',complejidad='" . $POST['complejidad']
                                    . "',estado='" . $POST['estadoProyecto'] . "',idDocente=" . $idDocente . ",nombreProyecto='" . $POST['nombreProyecto']
                                    . "'WHERE idproyecto=" . $POST['id'] . ";";

                            echo $query;

                            if (!$resultado =$con->executeQuery($query, '')) {
                                echo '<br><h1>Unable to insert</h1><br />';
                                session_start();
                                $_SESSION['proyectoActualizado'] = 'false';
                                header('Location:../pages/problemas/listar_proyecto.php');
                            } else {
                                echo '<br><h1>Insert successfully</h1> <br />';

                                /* if (isset($_FILES["rutaProyecto"])) {

                                  $tmp_name = $_FILES["rutaProyecto"]["tmp_name"];
                                  $name = $_FILES["rutaProyecto"]["name"];
                                  move_uploaded_file($tmp_name, "../_Proyectos/ $name");
                                 */
                                session_start();
                                $_SESSION['proyectoActualizado'] = 'true';
                                header('Location:../pages/problemas/listar_proyecto.php');
                                //}
                            }
                        }
                    }
                    // end store data


                    echo 'File is uploaded successfully.';
                } catch (RuntimeException $e) {

                    echo $e->getMessage();
                }
            } else {
                //update all execpt file

                if (!empty($POST)) {
                    //we suppose that data has been validate previuosly

                    $query = "UPDATE proyecto SET complejidad='" . $POST['complejidad']
                            . "',estado='" . $POST['estadoProyecto'] . "',idDocente=" . $idDocente . ",nombreProyecto='" . $POST['nombreProyecto']
                            . "'WHERE idproyecto=" . $POST['id'] . ";";


                   // echo $query;

                    if (!$resultado =$con->executeQuery($query, '')) {
                       // echo '<br><h1>Unable to insert</h1><br />';
                        session_start();
                        $_SESSION['proyectoActualizado'] = 'false';
                        header('Location:../pages/problemas/listar_proyecto.php');
                    } else {
                        //echo '<br><h1>Insert successfully</h1> <br />';

                        /* if (isset($_FILES["rutaProyecto"])) {

                          $tmp_name = $_FILES["rutaProyecto"]["tmp_name"];
                          $name = $_FILES["rutaProyecto"]["name"];
                          move_uploaded_file($tmp_name, "../_Proyectos/ $name");
                         */
                        session_start();
                        $_SESSION['proyectoActualizado'] = 'true';
                        header('Location:../pages/problemas/listar_proyecto.php');
                        //}
                    }
                }
            }
        } else {
            session_start();
            $_SESSION['error_file'] = 'true';
            header('Location:../pages/problemas/listar_proyecto.php');
        }
    }
    
    #alter data project query
    public function getProjectData($param) {
        $con = DbConnection::getInstance();
        $query = 'SELECT rutaProyecto,complejidad,nombreProyecto,estado FROM proyecto WHERE idproyecto='
                    . $param . ';';

            return $con->executeSelectQuery($query, '');
        
    }

}

?>