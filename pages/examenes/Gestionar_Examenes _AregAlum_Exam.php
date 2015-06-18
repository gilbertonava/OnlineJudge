<?php
include '../../logs/errorLogging.php';
include '../../modelo/examencontroller.php';
session_start();

//$examen = "";

if (isset($_POST['idexamen'])) {
    $examen = 'Agregar alumnos a examen de ' . $_POST['materia'] . ' Unidad ' . $_POST['unidad'];
} else {
    header('Location:gestionarExamenes.php');
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
        <link href="../../static/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../../static/DATA_TABLES/datatables-plugins/integration/bootstrap/2/dataTables.bootstrap.css" type="text/css"/>
        <link rel="stylesheet" href="../../static/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="../../static/css/bootstrap.css" type="text/css"/>
        <link rel="stylesheet" href="../../static/css/sb-admin-2.css" type="text/css">
        <link rel="stylesheet" href="../../static/css/font-awesome.min.css" type="text/css">
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
                        <p class="text-center text-danger">¿Estas seguro de querer remover este alumno del Examen?</p>
                    </div>
                    <div class="modal-footer">
                        <form role="form" id="fdelete" name="remover" class="contact" nctype="multipart/form-data"
                              method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                            <input type="hidden" id="idAlumno" name="idAlumno" value="sinValor"/>
                            <input type="hidden" id="ideliminar" name="ideliminar" value="<?php echo ' ' . $_POST['idexamen']; ?>"/>

                            <a class="btn btn-pinterest btn-default" data-dismiss="modal">Cancelar</a>
                            <button type="submit" id="delete_proyecto" 
                                    class="btn btn-pinterest btn-primary btn-danger" 
                                    data-dismiss="modal" name="delete_proyecto" value="send">Delete</button>  
                        </form>                  
                    </div>
                </div>
            </div>
        </div>        

        <!--alert-->

        <div id="alerta" class="alert alert-success alert-dismissable" style="display: none">
            <a class="close" onclick="$('.alert').hide();
                    window.open('Gestionar_Examenes _AregAlum_Exam.php', '_self', 'false');">×</a>
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
                            <li><a href="../usuarios/login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <!-- /input-group -->
                            </li>

                            <li class="active">
                                <a href="#"><i class="fa fa-files-o fa-fw"></i>Panel de Control<span class="fa arrow"></span></a>
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
                                        <a href="../usuarios/login.php">Login</a>
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



                    <!--hbdfjhghfd-->  
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                <?php
                                if (isset($examen)) {
                                    echo $examen;
                                } else {
                                    echo 'Agregar alumnos a examen';
                                }
                                ?></h1>

                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">

                        <div class="form-group col-md-4 text-left">

                            <button class="btn  btn-outline btn-primary" id="delete"
                                    onclick="window.open('enviarExamen.php', '_self', 'false')">Nuevo</button>

                        </div>
                        <div class="row text-right col-md-8">
                            <div class="btn-group">
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-circle btn-pinterest btn-success col-md-offset-2"
                                            id="return" onclick="window.open('gestionarExamenes.php', '_self', 'false')">
                                        <i class="fa fa-arrow-circle-left"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">

                        <div class="panel-heading">
                            Alumnos
                        </div>
                        <!-- /.panel-heading -->


                        <div class="panel-body">
                            <div class="dataTable_wrapper">

                                <form id="agregarAlumnos" name="agregarAlumnos" enctype="multipart/form-data" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Seleccionar</th>
                                                <th>No. Control</th>
                                                <th>Nombre</th>
                                                <th> Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            try {

                                                $anadirAlumnos = new gestionExamenes();
                                                $alumnos = $anadirAlumnos->listarAlumnos();

                                                $addedStudents = $anadirAlumnos->obtenerAlumnosAgregadosaExamen($_POST['idexamen']);
                                                if (!empty($addedStudents)) {
                                                    $verify = array_column($addedStudents, 'alumno_idUsuario');
                                                }



                                                foreach ($alumnos as $value) {
                                                    if (isset($value['idUsuario'])) {
                                                        ?>


                                                        <tr class="odd gradeA">
                                                            <td class="text-center">
                                                                <input type="checkbox" class="checkbox"id="seleccionar"  name="seleccion[]"
                                                                       value="<?php echo $value['idUsuario']; ?>"
                                                                       <?php
                                                                       if (isset($verify)) {
                                                                           if (in_array($value['idUsuario'], $verify)) {
                                                                               echo 'checked disabled';
                                                                           }
                                                                       }
                                                                       ?> /></td>
                                                            <td><?php echo $value['nControl']; ?></td>
                                                            <td><?php echo $value['paterno'] . ' ' . $value['materno'] . ' ' . $value['nombre']; ?></td>                                            
                                                            <td>
                                                                <div class="toolbar text-center" role="toolbar">
                                                                    <input type="hidden" id="examen_qiut_<?php echo $_POST['idexamen']; ?>" name="examen_quit" value=""/>
                                                                    <button  type="button" class="btn btn-sm btn-danger"  value="<?php echo ' ' . $value['idUsuario']; ?>" 
                                                                             id="btn_delete_<?php echo $value['idUsuario']; ?>" name="elimiar_pro"
                                                                             onclick="$('#idAlumno').val($('#btn_delete_<?php echo $value['idUsuario']; ?>').attr('value'));

                                                                                     $('#myModal').modal('show');
                                                                             ">
                                                                        <i class="glyphicon glyphicon-remove"></i>
                                                                    </button>
                                                                    <!--$('#ideliminar').val($('#examen_quit_?php echo $_POST['idexamen']; ?').attr('value'));-->

                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                            } catch (RuntimeException $e) {
                                                
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <input type="hidden" name="idexamen" value="<?php echo $_POST['idexamen']; ?>"/>
                                    <input type="hidden" name="materia" value="<?php echo $_POST['materia']; ?>"/>
                                    <input type="hidden" name="unidad" value="<?php echo $_POST['unidad']; ?>"/>
                                    <button type="submit" class="btn btn-outline btn-success" id="agregar" name="agregar" value="enviar">Enlistar en Examen</button>
                                </form>




                                <?php
                                if (!empty($_POST)) {

                                    if (isset($_POST['agregar'])) {


                                        if (isset($_POST['seleccion'])) {

                                            $alumnosIds = filter_input(INPUT_POST, 'seleccion', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

                                            print_r($alumnosIds);
                                            if (!is_null($alumnosIds)) {
                                                $addAlumnos = new gestionExamenes();
                                                $addAlumnos->anadirAlumnosExamen($_POST);
                                            }
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
            </div>

        </div>
        <!-- termina lo de la pestaña agregar examen           
        <!-- /.container-fluid -->

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
                                                                     $(document).ready(function () {
                                                                         $('#dataTables-example').DataTable({
                                                                             responsive: true
                                                                         });



                                                                     });
        </script>

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
                     url: "../../modelo/removeStudentFromExam.php", //process to mail
                     data: $('form.contact').serialize(),
                     success: function (msg) {
                     $("#menssage").html(msg);
                     $("#myModal").modal('hide'); //hide popup
                     //$('#menssage').attr("class"," alert-success alert-dismissable ");
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
