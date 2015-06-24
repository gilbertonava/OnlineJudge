<?php
include_once 'dbconnection.php';
//include'../../logs/errorLogging.php';
//include_once '../../logs/errorLogging.php';

class gestionExamenes {

    public function __construct() {
           
    }
      
    #show all projects with state=active

    public function listarExamenes() {
        try {
            $con = DbConnection::getInstance();

            $query = 'SELECT idexamen,rutaArchivo,unidad,nombre,examen.idMateria  '
                    . 'FROM examen,materia WHERE examen.EstadoExamen=\'ACTIVO\' AND examen.idmateria=materia.idMateria;';

            $resultado = $con->executeSelectQuery($query, '');

            return $resultado;
        } catch (RuntimeException $ex) {
            @header('Location:pages/error.html');
        }
    }

#obtener las materias disponibles para listar al momento de registrar un nuevoi esxamen

    public function getMaterias() {
        $con = DbConnection::getInstance();
        $query = 'SELECT idMateria,nombre FROM materia;';

        $resultado = $con->executeSelectQuery($query, '');

        return $resultado;
    }

#create new record of examen

    public function nuevoExamen(array $POST) {

        $con = DbConnection::getInstance();

        /* validar archivo a subir */

        if (isset($_FILES["rutaExamen"])) {

            try {

                // Undefined | Multiple Files | $_FILES Corruption Attack
                // If this request falls under any of them, treat it invalid.
                if (
                        !isset($_FILES["rutaExamen"]["error"]) ||
                        is_array($_FILES["rutaExamen"]["error"])
                ) {
                    throw new RuntimeException("Invalid parameters.");
                }

                // Check $_FILES['upfile']['error'] value.
                switch ($_FILES["rutaExamen"]["error"]) {
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
                if ($_FILES['rutaExamen']['size'] > 10000000) {
                    throw new RuntimeException('Exceeded filesize limit.');
                }

                // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
                // Check MIME Type by yourself.
                $finfo = new finfo(FILEINFO_MIME_TYPE);
                if (false === $ext = array_search(
                        $finfo->file($_FILES["rutaExamen"]["tmp_name"]), array(
                    "pdf" => "application/pdf",
                        ), true
                        )) {
                    throw new RuntimeException('Invalid file format.');
                }

                // You should name it uniquely.
                // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
                // On this example, obtain safe unique name from its binary data.
                //@@header('Location:../pages/problemas/gp_nuevo_proyecto.php');

                $name2file = sha1_file($_FILES['rutaExamen']['tmp_name']) . '_@_@_' . $_FILES['rutaExamen']['name'];
                if (!move_uploaded_file(
                                $_FILES['rutaExamen']['tmp_name'], sprintf('../../_Examenes/%s.%s', $name2file, $ext)
                        )) {
                    throw new RuntimeException('Failed to move uploaded file.');
                }



                $_SESSION['proyectoInsertado'] = 'false';
                //store data in db

                if (!empty($POST)) {
                    //we suppose that data has been validate previuosly

                    $query = "INSERT INTO examen values(null,'" . $name2file . "','" . $POST['unidad'] . "','" . $POST['fechaAplicacion'] . "','"
                            . $POST['horaInicio'] . "','" . $POST['horaFin'] . "'," . $POST['idMateria'] . ",'ACTIVO');";

                    $_SESSION['proyectoInsertado'] = 'false';

                    if (!$resultado = $con->executeQuery($query, '')) {
                        //echo '<br><h1>Unable to insert</h1><br />';
                        //@session_start();
                        $_SESSION['proyectoInsertado'] = 'false';
                        //@header('Location:../pages/problemas/gp_nuevo_proyecto.php');
                    } else {
                        //echo '<br><h1>Insert successfully</h1> <br />';

                        /* if (isset($_FILES["rutaExamen"])) {

                          $tmp_name = $_FILES["rutaExamen"]["tmp_name"];
                          $name = $_FILES["rutaExamen"]["name"];
                          move_uploaded_file($tmp_name, "../_Examens/ $name");
                         */
                        //@session_start();
                        $_SESSION['proyectoInsertado'] = 'true';
                        //@header('Location:../pages/problemas/gp_nuevo_proyecto.php');
                        //}
                    }
                } else {
                    new RuntimeException($message, $code, $previous);
                }
                // end store data
                //echo 'File is uploaded successfully.';
            } catch (RuntimeException $e) {

                echo $e->getMessage();
            }
        } else {
            //@session_start();
            $_SESSION['error_file'] = 'true';
            //@header('Location:../pages/problemas/gp_nuevo_proyecto.php');
        }
    }

    public function listarAlumnos() {
        #retrive all alumn data
        $con = DbConnection::getInstance();
        $query = "SELECT alumno.idUsuario,alumno.nControl,usuarios.paterno, usuarios.materno,usuarios.nombre ".
"from online_judge.usuarios,online_judge.alumno ".
"WHERE online_judge.usuarios.idUsuario=online_judge.alumno.idUsuario AND online_judge.usuarios.estado='ACTIVO';";
        $resultado= $con->executeSelectQuery($query, '');
        return $resultado;
    }

    public function obtenerAlumnosAgregadosaExamen($idExamen) {

        #get students actualy registered for this test

        $con = DbConnection::getInstance();

        $query = "SELECT alumno_has_examen.alumno_idUsuario from online_judge.usuarios,online_judge.alumno_has_examen ".
                "WHERE online_judge.usuarios.idUsuario=online_judge.alumno_has_examen.alumno_idUsuario ".
                "AND online_judge.alumno_has_examen.examen_idexamen=".$idExamen.";";
        return $con->executeSelectQuery($query, '');
    }
    
    
    public function anadirAlumnosExamen(array $POST) {
         $alumnosIds = filter_input(INPUT_POST, 'seleccion', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        if (!is_null($alumnosIds)) {
           $con = DbConnection::getInstance();

            for ($index = 0; $index < count($alumnosIds); $index++) {

                $add = 'INSERT INTO alumno_has_examen VALUES( '.$alumnosIds[$index].' , '.$POST['idexamen'].' );';
                try{
                $file =$con->executeQuery($add, ' ');
                }  catch (RuntimeException $e){}
            }
        }
    }
    
    public function removerAlumnodeExamen($idAlumno,$idExamen) {
        
        $con = DbConnection::getInstance();
        $query ="DELETE FROM alumno_has_examen WHERE alumno_idUsuario=".$idAlumno." AND examen_idexamen=".$idExamen.";";
         //echo '<h2>'.$query.'</H2>';die();
        return $con->executeQuery($query, '');
        
        
    }
    
    public function editarExamen(array $POST) {        
       $con = DbConnection::getInstance();

       
        /**
         * Todo
         * GET use id, who is creting project
         * 
         */
        //here we should get the session user id
        $idDocente = 1;#using this id only for test coz we are'nt using session


        /* validar archivo a subir <- solo si se cambiara el project file*/

        if (isset($_FILES["rutaExamen"])) {                               
            if ($_FILES["rutaExamen"]["error"] != UPLOAD_ERR_NO_FILE) {

                try {
  
                    // Undefined | Multiple Files | $_FILES Corruption Attack
                    // If this request falls under any of them, treat it invalid.
                    if (!isset($_FILES["rutaExamen"]["error"]) ||
                        is_array($_FILES["rutaExamen"]["error"])) {
                        throw new RuntimeException("Invalid parameters.");
                    }

                    // Check $_FILES['upfile']['error'] value.
                    switch ($_FILES["rutaExamen"]["error"]) {
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
                    if ($_FILES['rutaExamen']['size'] > 10000000) {
                        throw new RuntimeException('Exceeded filesize limit.');
                    }

                    // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
                    // Check MIME Type by yourself.
                    $finfo = new finfo(FILEINFO_MIME_TYPE);
                    if (false === $ext = array_search(
                            $finfo->file($_FILES["rutaExamen"]["tmp_name"]), array(
                        "pdf" => "application/pdf",
                            ), true
                            )) {
                        throw new RuntimeException('Invalid file format.');
                    }

                    // You should name it uniquely.
                    // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
                    // On this example, obtain safe unique name from its binary data.

                    $file_name = explode("_@_@_", $POST['oldfile']);

                    if ($file_name[1] != $_FILES['rutaExamen']['name']) {

                        $name2file = sha1_file($_FILES['rutaExamen']['tmp_name']) . '_@_@_' . $_FILES['rutaExamen']['name'];
                        if (!move_uploaded_file(
                                        $_FILES['rutaExamen']['tmp_name'], sprintf('../_Examenes/%s.%s', $name2file, $ext)
                                )) {
                            throw new RuntimeException('Failed to move uploaded file.');
                        }

                        unlink('../_Examenes/' . $POST['oldfile'] . '.pdf');

                        //store data in db

                        if (!empty($POST)) {
                            //we suppose that data has been validate previuosly

                            
                            $query = "UPDATE examen SET rutaArchivo='".$name2file . "',unidad='".$POST['unidad'] . "',fechaAplicacion='". $POST['fechaAplicacion'] 
                                    . "',horaInicio='". $POST['horaInicio'] . "',horaFin='" . $POST['horaFin'] . "',idMateria=" . $POST['idMateria'] 
                                    . " WHERE idexamen=".$POST['id'].";";
                        
                            

                            if (!$resultado =$con->executeQuery($query, '')) {
                                echo '<br><h1>Unable to Update</h1><br />';
                                @session_start();
                                $_SESSION['proyectoActualizado'] = 'false';
                                
                                return 'problemas actualizando archivo';
                                @header('Location:../pages/examenes/gestionarExamenes.php');
                            } else {
                                echo '<br><h1>Insert successfully</h1> <br />';

                                @session_start();
                                $_SESSION['proyectoActualizado'] = 'true';
                                                                         
                                @header('Location:../pages/examenes/gestionarExamenes.php');
                                
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
                    $query = "UPDATE examen SET unidad='".$POST['unidad'] . "',fechaAplicacion='". $POST['fechaAplicacion'] 
                                    . "',horaInicio='". $POST['horaInicio'] . "',horaFin='" . $POST['horaFin'] . "',idMateria=" . $POST['idMateria'] 
                                    . " WHERE idexamen=".$POST['id'].";";
                                                
                    if (!$resultado =$con->executeQuery($query, '')) {
                        @session_start();
                        $_SESSION['proyectoActualizado'] = 'false';
            
                        
            
                        @header('Location:../pages/examenes/gestionarExamenes.php');
                    } else {
                        
                        @session_start();
                        $_SESSION['proyectoActualizado'] = 'true';
                        
                         
            
                        
                        @header('Location:../pages/examenes/gestionarExamenes.php');
                        //}
                    }
                }
            }
        } else {
            
            //throw  new RuntimeException('venia vacio el file[]');
            @session_start();
            $_SESSION['error_file'] = 'true';
            
            
            
           
            @header('Location:../pages/examenes/gestionarExamenes.php');
        }
        
    }
    
    
    /**
     * idexamen	int(11)	NO	PRI
rutaArchivo	varchar(255)	NO	
unidad	varchar(45)	NO	
fechaAplicacion	date	NO	
horaInicio	time	NO	
horaFin	time	NO	
idMateria	int(11)	NO	MUL
EstadoExamen	varchar(45)	NO	
     */
    
    
     #get exam data for edition
    public function getExamenData($idexamen,$idmateria) {
        $con = DbConnection::getInstance();
        $query = 'SELECT idexamen,rutaArchivo,unidad,fechaAplicacion,horaInicio,horaFin,examen.idMateria,nombre FROM examen,materia WHERE idexamen='
                    . $idexamen . ' AND materia.idmateria='.$idmateria.';';

            return $con->executeSelectQuery($query, '');
        
    }
    
    

}

?>
