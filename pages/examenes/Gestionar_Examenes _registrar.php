<?php
include '../../modelo/examenController.php';
//include '../../logs/errorLogging.php';

if (isset($_SESSION['proyectoInsertado'])) {


    #all is right!
    if ($_SESSION['proyectoInsertado'] == 'true') {
        echo ' <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                El proyecto se registro correctamente !
                            </div>';

        unset($_SESSION['proyectoInsertado']);
        unset($_FILES['rutaProyecto']);
    }
    #something was wrong
    else if ($_SESSION['proyectoInsertado'] == 'false') {
        echo ' <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                No fue posible registrar el proyecto  <a href="#" class="alert-link">Alert Link</a>.
                            </div>';
        unset($_SESSION['proyectoInsertado']);
        unset($_FILES['rutaProyecto']);
    }
}



?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Online Judge ITSMANTE</title>

        <!-- Bootstrap Core CSS -->
        <link href="../../static/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../../static/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../../static/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../../static/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
        <!--confirmation dialog-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal-label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModal-label">Are you sure?</h4>
                    </div>
                    <div class="modal-body">
                        <p class="text-center text-danger">¿Estas seguro de querer eliminar este proyecto?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-pinterest btn-default " data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-pinterest btn-primary btn-danger" >Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="../pages/index.html"> Juez en Linea ITSMante </a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="../usuarios/login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">

                            <li class="active">
                                <a href="#"><i class="fa fa-files-o fa-fw"></i> Panel de Control<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="../problemas/listar_proyecto.php">Proyectos</a>
                                    </li>

                                    <li>
                                        <a href="../examenes/gestionarExamenes.php">Examenes</a>
                                    </li>

                                    <li>
                                        <a href="../materias/listarMateria_merce.html">Materias</a>
                                    </li>

                                    <li>
                                        <a href="../usuarios/GestionarUsuario-joosuse.html">Usuarios</a>
                                    </li>
                                    <li>
                                        <a href="../usuarios/login.html">Login</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-4 col-lg-12">
                            <h1 class="page-header">Datos Examen</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row text-right">
                        <div class="btn-group">
                            <div class="btn-group" role="group">
                                <button class="btn btn-sm btn-circle btn-pinterest btn-success col-md-offset-2" 
                                        id="return" onclick="window.open('gestionarExamenes.php', '_self', 'false')">
                                    <i class="fa fa-arrow-circle-left"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!--empieza -->
                        <div class=" active tab-pane fade in" id="registrarMateria">
                            <div class="row">
                                <h2></h2>
                                <div class="col-md-6 col-lg-9">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">Proporcione los datos del examen</div>
                                        <div class="panel-body">
                                            <form role="form" enctype="multipart/form-data" action="" method="POST" >    
                                                <div class="row">
                                                    <div class=" form-group col-md-6">
                                                        <label for="materia" class="control-label ">Materia</label>
                                                        <select class="form-control" id="idMateria" name="idMateria" required>
                                                            <?php
                                                            //<?php echo $_SERVER['PHP_SELF']; 
                                                            $get_materias = new gestionExamenes();

                                                            $options = $get_materias->getMaterias();

                                                            foreach ($options as $val => $label) {

                                                                echo '<option value=' . $label['idMateria'] . '>' . $label['nombre'] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div><br>

                                                    <div class="form-group  col-md-4">                                                        
                                                        <a class="btn btn-primary btn-pinterest btn-outline" href="../materias/crearMateria_merce.html">Nueva Materia</a>                                                                                                               
                                                    </div>
                                                </div>


                                                <div class=" form-group">
                                                    <label for="unidad" class="control-label">Unidad</label>
                                                    <select class="form-control" id="unidad" name="unidad" required>
                                                        <option value="1">Unidad 1</option>
                                                        <option value="2">Unidad 2</option>
                                                        <option value="3">Unidad 3</option>
                                                        <option value="4">Unidad 4</option>
                                                        <option value="5">Unidad 5</option>
                                                        <option value="6">Unidad 6</option>
                                                        <option value="7">Unidad 7</option>
                                                        <option value="8">Unidad 8</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label" for="rutaExamen">Archivo (PDF) del Examen  <b>size < 3.1MB</b>></label>
                                                    <input type="file" id="rutaExamen" 
                                                           name="rutaExamen" 
                                                           class="form-control btn-outline btn-primary" 
                                                           required accept="application/pdf" 
                                                           >
                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label"
                                                           for="fecha">Fecha Aplicacion</label>
                                                    <input type="date" name="fechaAplicacion" required>

                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label"
                                                           for="fecha" >Hora de inicio</label>
                                                    <input type="time" name="horaInicio" required>
                                                    <label class="control-label"
                                                           for="fecha">Hora de terminación</label>
                                                    <input type="time" name="horaFin" required>
                                                </div> 


                                                <div class="col-md-offset-3" align="right">
                                                    <a id="btn-cancel-registrarMateria" class="btn btn-outline btn-danger">Cancelar</a>
                                                    <button type="submit" id="registrarMateria" name="registrarMateria" value="enviar" class="btn btn-outline btn-primary">Registrar</button>
                                                </div>

                                            </form>


                                        </div>
                                    </div>


                                    <!--</div> -->
                                    <!-- /.panel-body -->
                                </div>
                                <!-- /.panel -->
                            </div>
                        </div>
                    </div>
                </div> <!-- termina lo de la pestaña agregar examen-->

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        <?php
        if(!empty($_POST)){
        if (isset($_POST['registrarMateria'])) {
            $new_examen = new gestionExamenes();

            if ($new_examen->nuevoExamen($_POST)) {
                echo '<pre>SE INSERTO</PRE>';
            }
        }
        }
        ?>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../../static/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../../static/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../../static/metisMenu/dist/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->

        <!-- DataTables JavaScript 
        <script src="../../static/DATA_TABLES/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="../../static/DATA_TABLES/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
        -->

        <!-- Custom Theme JavaScript -->
        <script src="../../static/js/sb-admin-2.js"></script>
    </body>
</html>
