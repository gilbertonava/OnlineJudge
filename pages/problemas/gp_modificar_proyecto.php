<?php
include '../../modelo/dbconnection.php';
include '../../modelo/proyecto.php';

session_start();

$row = NULL;

if (!empty($_POST)) {
    if (isset($_POST['editar'])) {
        try {
            $edicion = new GestionProyecto();
            $row = $edicion->getProjectData($_POST['editar']);

            if (count($row) == 0) {
                header('Location:../problemas/listar_proyecto.php');
            }
        } catch (RuntimeException $e) {
            header('Location:../pages/problemas/listar_proyectos.php');
        }
    }
} else {
    header('Location:../pages/problemas/listar_proyecto.php');
    exit();
}

if ($row == NULL) {
    header('Location:../problemas/listar_proyecto.php');
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
                    <a class="navbar-brand" href="../index.html"> Juez en Linea ITSMante </a>
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
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <h1 class="page-header">Editar Proyecto</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>

                    <div class="row text-right">
                        <div class="btn-group">
                            <div class="btn-group" role="group">
                                <button class="btn btn-sm btn-circle btn-pinterest btn-success col-md-offset-2"
                                        id="return" onclick="window.open('listar_proyecto.php', '_self', 'false')">
                                    <i class="fa fa-arrow-circle-left"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                    <br>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Proporcione los datos del Proyecto</div>
                                <div class="panel-body">

                                    <form role="form" method="POST" enctype="multipart/form-data" 
                                          action="<?php echo $_SERVER['PHP_SELF']; ?>">
<?php foreach ($row as $value) { ?>
                                            <div class="form-group">
                                                <label class="control-label" for="nombreProyecto">Nombre del proyecto</label>
                                                <input type="text" class="form-control" id="nombreProyecto" 
                                                       name="nombreProyecto" placeholder="Nombre Proyecto"
                                                       value="<?php echo $value['nombreProyecto']; ?>" required/>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="complejidad">Complejidad</label>
                                                <select class="form-control" id="complejidad" name="complejidad"  >
                                                    <?php
                                                    $options = array('value1' => 'BAJA', 'value2' => 'MEDIA', 'value3' => 'ALTA'); //etc.
                                                    foreach ($options as $val => $label) {
                                                        if ($value['complejidad'] == $label) {
                                                            $selected = "selected='selected'";
                                                        } else {
                                                            $selected = '';
                                                        }

                                                        echo "<option value='$label' $selected>$label</option>\n";
                                                    }
                                                    ?>

                                                </select>

                                            </div>

                                            <div class="form-group">
                                                <label class="control-label" for="estadoProyecto">Seleccione Estado del Proyecto</label>
                                                <select class="form-control" id="estadoProyecto" name="estadoProyecto">
                                                    <?php
                                                    $options = array('value1' => 'ACTIVO', 'value2' => 'INACTIVO', 'value3' => 'RESUELTO'); //etc.
                                                    foreach ($options as $val => $label) {
                                                        if ($value['estado'] == $label) {
                                                            $selected = "selected='selected'";
                                                        } else {
                                                            $selected = '';
                                                        }

                                                        echo "<option value='$label' $selected>$label</option>\n";
                                                    }
                                                    ?>
                                                </select>

                                            </div>

                                            <div class="form-group">
                                                <label class="control-label" for="rutaProyecto">Cambiar Archivo Proyecto (PDF MAX=3.1 MB) </label>
                                                <p class="text-info">Current file: &nbsp;<?php echo $value['rutaProyecto']; ?> </p>
                                                <input type="file" id="rutaProyecto" name="rutaProyecto" accept="application/pdf"
                                                       class="form-control btn-outline btn-primary"
                                                       placeholder="Archivo proyecto" />
                                            </div>
                                            <div class=" form-group col-md-offset-3">
                                                <!--<button type="submit" id="btn-cancel-registrarProyecto" class="btn btn-outline btn-default">Cancelar</button>-->
                                                <input type="hidden" name="id" value="<?php echo $_POST['editar']; ?>"/>
                                                <input type="hidden" name="oldfile" value="<?php echo $value['rutaProyecto']; ?>"/>
                                                <button type="submit" id="btn-registrarProyecto" class="btn btn-outline btn-primary">Guardar Cambios</button>
                                            </div>
                                        </form>

                                        <?php
                                    }
                                    
                                    ?>


                                </div>
                            </div>

                        </div>
                    </div>

                    <?php
                    if (!empty($_POST)) {
                        if (isset($_POST['id'])) {
                            $actualizar = new GestionProyecto();
                            $actualizar->actualizarProyecto($_POST);
                            echo '<pre>';
                            print_r($_POST);
                            echo '</pre>';
                        }
                    }
                    ?>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

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
