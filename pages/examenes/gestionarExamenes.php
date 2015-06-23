<?php
include '../../modelo/examencontroller.php';
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

if (isset($_SESSION['examenActualizado'])) {



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
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SB Admin 2 - Bootstrap Admin Theme</title>

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

        <!--Confirmation Dialog -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal-label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModal-label">Are you sure?</h4>
                    </div>
                    <div class="modal-body">
                        <p class="text-center text-danger">¿Estas seguro de querer eliminar este Examen?</p>
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
                    window.open('gestionarExamenes.php', '_self', 'false');">×</a>
            <strong>Eliminación</strong>
            <p id="menssage"></p>
        </div>


        <!-- end confirmation dialog-->






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
                            <li><a href="../usuarios/pages/login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                                        <a href="../materias/listarMateria_merce.php">Materias</a>
                                    </li>

                                    <li>
                                        <a href="../usuarios/GestionarUsuario-joosuse.php">Usuarios</a>
                                    </li>
                                    <li>
                                        <a href="../usuarios/loginphp">Login</a>
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


                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Examenes disponibles</h1>

                    </div>

                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <div class="row">

                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="form-group text-right">
                                    <button class="btn  btn-outline btn-primary" 
                                            id="delete" onclick="window.open('Gestionar_Examenes _registrar.php', '_self', 'false')"> Nuevo</button>
                                </div>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover"
                                           id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Examenes</th>
                                                <th>Unidad</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            try {

                                                $listarexamenes = new gestionExamenes();
                                                $examenes = $listarexamenes->listarExamenes();

                                                foreach ($examenes as $value) {
                                                    if (isset($value['idexamen'])) {
                                                        ?> 

                                                        <tr>
                                                            <td><?php echo $value['nombre']; ?></td>
                                                            <td><?php echo $value['unidad']; ?></td>
                                                            <td>                                                                
                                                                <div class="toolbar text-center" role="toolbar">


                                                                    <form role="form" class="form-inline col-md-2"  method="POST" action="Gestionar_Examenes _vizualizar.php">

                                                                        <div class="btn-group" role="group" onclick="window.open('Gestionar_Examenes _vizualizar.php', '_self', 'false')">
                                                                            <input type="hidden" id="np" name="nombreProblema" value="<?php echo $value['nombre']; ?>">
                                                                            <button type="submit"class="btn btn-sm btn-primary " name="visualizar"id="vizualizar" value="<?php echo $value['rutaArchivo']; ?>">
                                                                                <i class="glyphicon fa fa-file-o"></i>
                                                                            </button>
                                                                        </div>

                                                                    </form>



                                                                    <form role="form" class="form-inline col-md-2"  method="POST" action="Gestionar_Examenes _AregAlum_Exam.php">
                                                                        <div class="btn-group" role="group" onclick="window.open('Gestionar_Examenes _AregAlum_Exam.php', '_self', 'false')">
                                                                            <input type="hidden" id="idexamen" name="idexamen" value="<?php echo $value['idexamen']; ?>">
                                                                            <input type="hidden" id="materia" name="materia" value="<?php echo $value['nombre']; ?>">
                                                                            <input type="hidden" id="unidad" name="unidad" value="<?php echo $value['unidad']; ?>">
                                                                            <button class="btn btn-sm btn-primary " id="agregar_alumnos" type="submit">
                                                                                <i class="glyphicon fa fa-user"></i>
                                                                            </button>
                                                                        </div>

                                                                    </form>



                                                                    <form role="form" class="form-inline col-md-2"  method="POST" action="Gestionar_Examenes _modificar.php">
                                                                        
                                                                        <input type="hidden" name="idmateria" value="<?php echo $value['idMateria']; ?>"
                                                                             
                                                                        <div class="btn-group" role="group" >
                                                                            <button type="submit" class="btn btn-sm btn-primary" name="editar"
                                                                                    value="<?php echo $value['idexamen']; ?>"
                                                                                    onclick="window.open('Gestionar_Examenes _modificar.php', '_self', 'false')">
                                                                                <i class="glyphicon glyphicon-edit"></i>
                                                                            </button>
                                                                        </div>
                                                                    </form>

                                                                    <!--<form role="form" class="form-inline col-md-2"  method="POST" action="Gestionar_Examenes _modificar.php">
                                                                        <div class="btn-group" role="group" onclick="window.open('Gestionar_Examenes _modificar.php', '_self', 'false')">

                                                                            <button class="btn btn-sm btn-primary " id="editar">
                                                                                <i class="glyphicon glyphicon-edit"></i>
                                                                            </button>
                                                                        </div>

                                                                    </form>-->


                                                                    <form role="form" class="form-inline col-md-2"  method="POST" action="">
                                                                        <div class="btn-group" role="group">
                                                                            <button  type="button" class="btn btn-sm btn-danger"  value="<?php echo ' ' . $value['idexamen']; ?>" 
                                                                                     id="btn_delete_<?php echo $value['idexamen']; ?>" name="elimiar_pro"
                                                                                     onclick="$('#idTo').val($('#btn_delete_<?php echo $value['idexamen']; ?>').attr('value'));
                                                                                             $('#myModal').modal('show');">
                                                                                <i class="glyphicon glyphicon-remove"></i>
                                                                            </button>




                                                                            <!--<button class="btn btn-sm btn-danger" id="delete" data-toggle="modal" data-target="#myModal">
                                                                                <i class="glyphicon glyphicon-remove"></i>
                                                                            </button>-->
                                                                        </div>

                                                                    </form>


                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php }
                                                } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->

                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>

                </div> <!-- termina lo de la pestaña agregar examen-->

            </div>

            <?php
        } catch (RuntimeException $r) {
            
        }
        ?>


        <!-- /#page-wrapper -->
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../../static/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../../static/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../../static/metisMenu/dist/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->

        <!-- DataTables JavaScript -->
        <script src="../../static/DATA_TABLES/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="../../static/DATA_TABLES/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
        


        <!-- Custom Theme JavaScript -->
        <script src="../../static/js/sb-admin-2.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
                                                                             $(document).ready(function() {
                                                                                 $('#dataTables-example').DataTable({
                                                                                     responsive: true
                                                                                 });
                                                                             });
        </script>      
        <script>
            //eliminar (1) un proyecto seleccionado al confirmar el modal de eliminacion
            $(document).ready(function() {
                $("button#delete_proyecto").click(function() {
                    $.ajax({
                        type: "POST",
                        url: "../../modelo/eliminar_examen.php", //process to mail
                        data: $('form.contact').serialize(),
                        success: function(msg) {
                            $("#menssage").html(msg);
                            $("#myModal").modal('hide'); //hide popup
                            //$('#menssage').attr("class"," alert-success alert-dismissable ");
                            $('.alert').show();
                        },
                        error: function() {
                            $("#menssage").html("No se pudo eliminar el examen seleccionado");
                            $('#menssage').attr("class", " alert-danger ");
                            $('.alert').show();
                        }
                    });
                });
            });
        </script>


    </body>
</html>
