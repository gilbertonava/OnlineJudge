<?php
include '../../logs/errorLogging.php';
include '../../modelo/usersController.php';
session_start();
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
                            <input type="hidden" id="idTo" name="idmateria" value="sinValor"/>
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
                    window.open('listarMaterias.php', '_self', 'false');">×</a>
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
                            <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                        <h1 class="page-header">Gestionar Usuario</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3><b>Usuarios Actuales</b></h3>

                                <div class="form-group text-right">

                                    <button  type="button" class="btn btn-success"  onClick=" window.location.href = 'Registrar_NuevoUsuario.html'">Registrar Nuevo</button>   
                                </div>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Usuario</th>
                                                <th>Tipo de Usuario</th>
                                                <th>Opciones</th>



                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $usuarios = new usersController();
                                            $users_Array = $usuarios->listarUsuarios();

                                            $usersTypes_Array = $usuarios->tipoAlumno();

                                            
                                            print_r($usersTypes_Array);
                                            $students = array_column($users_Array, 'student');
                                            print_r($students);
                                            $docente = array_column($users_Array, 'teacher');
                                            $concursante = array_column($users_Array, 'coder');


                                            foreach ($users_Array as $value) {
                                                if (isset($value['idUsuario'])) {
                                                    ?> 

                                                    <tr class="odd gradeA">
                                                        <td><?php echo $value['paterno'] . ' ' . $value['materno'] . ' ' . $value['nombre']; ?></td>
                                                        <td><?php
                                                            if (in_array($value['idUsuario'], $students)) {
                                                                echo 'Alumno';
                                                            } else if (in_array ($value['idUsuario'], $docente)) {
                                                                echo 'Docente';
                                                            }
                                                            elseif (in_array($value['idUsuario'], $concursante)) {
                                                                echo 'Concursante';
                                                        }
                                                            ?></td>


                                                        <td>
                                                            <div class="toolbar text-center" role="toolbar">

                                                                <div class="btn-group" role="group">

                                                                    <form action="Modificar_Usuario.php" method="POST">
                                                                        <input type="hidden" id="editar<?php echo '_' . $value['idUsuario']; ?>" name="editar" value="<?php echo $value['idUsuario']; ?>"/>                                                                        <button class="btn btn-sm btn-primary col-md-offset-2" id="editar" 
                                                                                                                                                                                                                style="padding-right:10px">
                                                                            <i class="glyphicon glyphicon-edit" onClick=" window.location.href = 'Modificar_Usuario.php'">

                                                                            </i></button>

                                                                    </form>

                                                                </div>
                                                                <div class="btn-group" role="group">

                                                                    <form role="form" class="form-inline col-md-2"  method="POST" action="">
                                                                        <div class="btn-group" role="group">
                                                                            <button  type="button" class="btn btn-sm btn-danger"  value="<?php echo ' ' . $value['idUsuario']; ?>" 
                                                                                     id="btn_delete_<?php echo $value['idUsuario']; ?>" name="elimiar_pro"
                                                                                     onclick="$('#idTo').val($('#btn_delete_<?php echo $value['idUsuario']; ?>').attr('value'));
                                                                                             $('#myModal').modal('show');">
                                                                                <i class="glyphicon glyphicon-remove"></i>
                                                                            </button>

                                                                        </div>

                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <?php
                                                }
                                            }
                                            ?>

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

        <script>
            //eliminar (1) un proyecto seleccionado al confirmar el modal de eliminacion
            $(document).ready(function () {
                $("button#delete_proyecto").click(function () {
                    $.ajax({
                        type: "POST",
                        url: "../../modelo/eliminar_usuario.php", //process
                        data: $('form.contact').serialize(),
                        success: function (msg) {
                            $("#menssage").html(msg);
                            $("#myModal").modal('hide'); //hide popup

                            $('.alert').show();
                        },
                        error: function () {
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
