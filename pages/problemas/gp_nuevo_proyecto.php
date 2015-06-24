<?php
include_once '../../modelo/proyecto.php';

session_start();

#Estados post-registro
#Hubo problemas con la carga del archivo
if (isset($_SESSION['error_file'])) {
    if ($_SESSION['error_file'] == 'true') {
        echo ' <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                El archivo de proyecto no se cargo correctamente <br> <b> Tamaño max < 3.1 MB </b>  Formato PDF!
                            </div>';

        unset($_SESSION['error_file']);
        unset($_FILES['rutaProyecto']);
    }
}

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
?>﻿
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

                    <ul class="nav" id="side-menu">

                        <li class="list-group">
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Panel de Control<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../problemas/listar_proyecto.php">Proyectos</a>
                                </li>

                                <li>
                                    <a href="../examenes/gestionarExamenes.php">Examenes</a>
                                </li>

                                <li>
                                    <a href="../materias/listarMaterias.php">Materias</a>
                                </li>

                                <li>
                                    <a href="../usuarios/GestionarUsuarios.php">Usuarios</a>
                                </li>
                                <li>
                                    <a href="../usuarios/login.html">Login</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>

                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 text-left">
                            <h1 class="page-header">Registrar Proyecto</h1>
                        </div>                   

                        <!-- /.col-lg-12 -->
                    </div>

                    <div class="row text-right">
                        <div class="btn-group">
                            <div class="btn-group " role="group">
                                <button class="btn btn-sm btn-circle btn-pinterest btn-success col-md-offset-2" 
                                        id="return" onclick="window.open('listar_proyecto.php', '_self', 'false')">
                                    <i class="fa fa-arrow-circle-left"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <br>
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Proporcione los datos del Proyecto</div>

                                <div class="panel-body">
                                    <form role="form" enctype="multipart/form-data" action="" method="POST" >
                                        <div class="form-group">
                                            <label class="control-label" for="nombreProyecto">Nombre del proyecto</label>
                                            <input type="text" class="form-control" id="nombreProyecto" 
                                                   name="nombreProyecto" placeholder="Nombre Proyecto" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label" for="complejidad">Complejidad</label>
                                            <select class="form-control" id="complejidad" name="complejidad" required>
                                                <option value="BAJA">Baja</option>
                                                <option value="MEDIA">Media</option>
                                                <option value="ALTA">Alta</option>
                                            </select>

                                        </div>

                                        <div class="form-group">
                                            <label class="control-label" for="estadoProyecto">Seleccione Estado del Proyecto</label>
                                            <select class="form-control" id="estadoProyecto" name="estadoProyecto">
                                                <option value="ACTIVO">Activo</option>
                                                <option value="INACTIVO">Inactivo</option>
                                                <option value="ELIMINADO">Resuelto</option>
                                            </select>

                                        </div>

                                        <div class="form-group">
                                            <label class="control-label" for="rutaProyecto">Archivo (PDF) del Proyecto  <b>size < 3.1MB</b>></label>
                                            <input type="file" id="rutaProyecto" 
                                                   name="rutaProyecto" 
                                                   class="form-control btn-outline btn-primary" 
                                                   required accept="application/pdf" 
                                                   >
                                        </div>

                                        <div class=" form-group col-md-offset-3">
                                            <button type="submit" id="btn-cancel-registrarProyecto" 
                                                    class="btn btn-outline btn-default">Cancelar</button>
                                            <button type="submit" id="btn-registrarProyecto" name="registrarProyecto" 
                                                    class="btn btn-outline btn-primary" value="enviar">Registrar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>           
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->

<?php
if (!empty($_POST)) {
    

if (isset($_POST['registrarProyecto'])) {
    $registro = new GestionProyecto();
    $registro->RegistrarProyecto($_POST);
    //echo $_SERVER['PHP_SELF'];
    
}    
} 
?>

        <!-- jQuery -->
        <script src="../../static/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../../static/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../../static/metisMenu/dist/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../../static/js/sb-admin-2.js"></script>

    </body>

</html>
