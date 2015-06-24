<?php
include '../../modelo/proyecto.php';
session_start();
$va = "null";
if (isset($_SESSION['proyectoEliminado'])) {


    #all is right!
    if ($_SESSION['proyectoEliminado'] == 'true') {
        echo ' <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                El proyecto se eliminó correctamente !
                            </div>';

        unset($_SESSION['proyectoEliminado']);
        unset($_FILES['rutaProyecto']);
    }
    #something was wrong
    else if ($_SESSION['proyectoEliminado'] == 'false') {
        echo ' <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                No fue posible eliminar el proyecto  <a href="#" class="alert-link">Alert Link</a>.
                            </div>';
        unset($_SESSION['proyectoEliminado']);
        unset($_FILES['rutaProyecto']);
    }
}

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

if (isset($_SESSION['proyectoActualizado'])) {



    if ($_SESSION['proyectoActualizado'] == 'true') {
        echo ' <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                El proyecto se actualizo correctamente !
                            </div>';

        unset($_SESSION['proyectoActualizado']);
        unset($_FILES['rutaProyecto']);
    } else if ($_SESSION['proyectoActualizado'] == 'false') {
        echo ' <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                No fue posible actualizar el proyecto.
                            </div>';
        unset($_SESSION['proyectoActualizado']);
        unset($_FILES['rutaProyecto']);
    }
}
?>

<!DOCTYPE html>
<html>
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

        <!-- DataTables CSS -->
        <link href="../../static/DATA_TABLES/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="../../static/DATA_TABLES/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

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
                        <form role="form"id="fdelete" name="contact" class="contact" 
                              action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <input type="hidden" id="idTo" name="idTo" value="sinValor"/>
                        </form>
                        <button type="button" class="btn btn-pinterest btn-default " 
                                data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="delete_proyecto" 
                                class="btn btn-pinterest btn-primary btn-danger" 
                                data-dismiss="modal" >Delete</button>     
                    </div>
                </div>
            </div>
        </div>        
        <!--alert-->

        <div id="alerta" class="alert alert-success alert-dismissable" style="display: none">
            <a class="close" onclick="$('.alert').hide();
                    window.open('listar_proyecto.php', '_self', 'false');">×</a>
            <strong>Eliminación</strong>
            <p id="menssage"></p>
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
                    <a class="navbar-brand" href="../index.html">Online Judge ITSMANTE</a>
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

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Problemas disponibles</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">

                            <div class="panel-heading">
                                <div class="form-group text-right">
                                    <button class="btn  btn-outline btn-success" id="delete" 
                                            onclick="window.open('gp_nuevo_proyecto.php', '_self', 'false')">Registrar Nuevo</button>
                                </div>

                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <form name="eliminar" id='eliminar_proyectos' action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Problema</th>
                                                    <th>Nivel complejidad</th>
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                try {

                                                    $listarProyectos = new GestionProyecto();
                                                    $proyectos = $listarProyectos->listarProyectos();

                                                    foreach ($proyectos as $value) {
                                                        if (isset($value['idproyecto'])) {
                                                            ?>   
                                                            <tr class="odd gradeX">
                                                                <td class="text-center">
                                                                    <input type="checkbox" class="checkbox " 
                                                                           value="<?php echo $value['idproyecto']; ?>" name="eliminar[]"/></td>
                                                                <td><?php echo $value['nombreProyecto']; ?></td>
                                                                <td><?php echo $value['complejidad']; ?></td>
                                                                <td class="">
                                                                    <div class="row">
                                                                        <div class="toolbar text-center "  role="toolbar" >

                                                                            <form></form>

                                                                            <div class="row col-md-offset-2 col-md-4">
                                                                                <form role="form" class="form-inline"  method="POST" action="Gestionar_Proyectos_vizualizar.php">
                                                                                    <div class="btn-group" role="group" >
                                                                                        <input type="hidden" id="np" name="nombreProblema" value="<?php echo $value['nombreProyecto']; ?>">
                                                                                        <button type="submit"  class="btn btn-sm btn-success col-md-offset-2"  
                                                                                                name="visualizar" value="<?php echo $value['rutaProyecto']; ?>"
                                                                                                onclick="window.open('Gestionar_Proyectos_vizualizar.php', '_self', 'false')">
                                                                                            <i class="glyphicon fa fa-file-o"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>


                                                                            <div class="row col-md-4 "> 
                                                                                <form role="form" class="form-inline"  method="POST" action="gp_modificar_proyecto.php">
                                                                                    <div class="btn-group" role="group" >
                                                                                        <button type="submit" class="btn btn-sm btn-primary col-md-offset-2" name="editar"
                                                                                                value="<?php echo $value['idproyecto']; ?>"
                                                                                                onclick="window.open('gp_modificar_proyecto.php', '_self', 'false')">
                                                                                            <i class="glyphicon glyphicon-edit"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                            <div class="row col-md-4 form-inline">

                                                                                <!--<form class="form-inline" method="POST" action="php echo $_SERVER['PHP_SELF']; "><div class="btn-group" role="group">  data-toggle="modal"  data-target="#myModal" -->
                                                                                <button  type="button" class="btn btn-sm btn-danger"  value="<?php echo ' ' . $value['idproyecto']; ?>" 
                                                                                         id="btn_delete_<?php echo $value['idproyecto']; ?>" name="elimiar_pro"
                                                                                         onclick="$('#idTo').val($('#btn_delete_<?php echo $value['idproyecto']; ?>').attr('value'));
                                                                                                             $('#myModal').modal('show');">
                                                                                    <i class="glyphicon glyphicon-remove"></i>
                                                                                </button>

                                                                            </div>
                                                                            <!--</form>-->

                                                                        </div>

                                                                    </div>
                                                                    </div>
                                                                </td>

                                                            </tr>

                                                            <?php
                                                        } else {
                                                            echo 'fail retraiving data';
                                                        }
                                                    }
                                                } catch (RuntimeException $e) {
                                                    echo '<div class="col-lg-4">
                                                        <div class="panel panel-danger">
                                                            <div class="panel-heading">
                                                                Error al conectar a la base de datos 
                                                            </div>
                                                            <div class="panel-body">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
                                                            </div>
                                                            <div class="panel-footer">
                                                                Panel Footer
                                                            </div>
                                                        </div>
                                                    </div>';
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </form>

                                    <div class="row text-left col-md-offset-1">
                                        <button class="btn btn-pinterest btn-danger" 
                                                type="submit" name='eliminar-multi'>Eliminar</button>
                                    </div>


                                    <?php
                                    
                                    if(!empty($_POST)){
                                    if (isset($_POST['eliminar'])) {
                                        $projectsIds = filter_input(INPUT_POST, 'eliminar', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
                                        if (!is_null($projectsIds)) {
                                            $multi_eliminacion = new GestionProyecto();
                                            $multi_eliminacion->eliminarProyectos($_POST);
                                            // header("Refresh:0");
                                        }
                                    }

                                    if (isset($_POST['nombreProblema'])) {
                                        $projectsIds = filter_input(INPUT_POST, 'eliminar', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
                                        if (!is_null($projectsIds)) {
                                            $multi_eliminacion = new GestionProyecto ();
                                            $multi_eliminacion->eliminarProyectos($_POST);
                                            // header("Refresh:0");
                                        }
                                    }
                                    }
                                    ?>

                                </div>
                                <!-- /.table-responsive -->

                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
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

        <!-- DataTables JavaScript -->
        <script src="../../static/DATA_TABLES/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="../../static/DATA_TABLES/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../../static/js/sb-admin-2.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
                                                                                             $(document).ready(function () {
                                                                                                 $('#dataTables-example').DataTable({
                                                                                                     responsive: true
                                                                                                 });
                                                                                             });
        </script>
        <!--Delete item selected-->

        <script>

            $(document).ready(function () {
                $('#btn_delete').on('click', function () {
                    $('#idTo').val($('#btn_delete').attr('value'));
                    $('#myModal').modal('show');
                });
            });
        </script>
        <script>
            //eliminar (1) un proyecto seleccionado al confirmar el modal de eliminacion
            $(document).ready(function () {
                $("button#delete_proyecto").click(function () {
                    $.ajax({
                        type: "POST",
                        url: "../../modelo/eliminar_proyecto.php", //process to mail
                        data: $('form.contact').serialize(),
                        success: function (msg) {
                            $("#menssage").html(msg);
                            $("#myModal").modal('hide'); //hide popup
                            //$('#menssage').attr("class"," alert-success alert-dismissable ");
                            $('.alert').show();
                        },
                        error: function () {
                            $("#menssage").html("No se pudo eliminar el registro seleccionado");
                            $('#menssage').attr("class", " alert-danger ");
                            $('.alert').show();
                        }
                    });
                });
            });
        </script>
        <!--Set ready value to delete-->


    </body>
</html>