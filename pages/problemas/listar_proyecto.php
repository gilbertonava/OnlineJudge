<?php
session_start();
$inicio = TRUE;
if (isset($_SESSION['visualizar']) && $inicio) {
    //unset($_SESSION['visualizar']);
    $inicio = FALSE;
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

        <!--?php
        if (isset($_SESSION['delete'])) {
            if ($_SESSION['delete'] == true) {

                echo ' <!--confirmation dialog-->
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
                    <form name="contact" class="contact">
                        <input type="hidden" id="idTo" name="idTo" value="sinValor"/>
                    </form>
                        <button type="button" class="btn btn-pinterest btn-default "  name="candel" value="none"
                                data-dismiss="modal">Cancelar</button>
                        
                        <button type="submit" id="delete_proyecto" 
                                class="btn btn-pinterest btn-primary btn-danger" 
                                data-dismiss="modal" >Delete</button>
                        <!--onclick="$(\'.alert\').show()"-->
                    
                    </div>
                </div>
            </div>
        </div>
        <!--';        }       }        ?>


        <!--alert-->

        <div id="alerta" class="alert alert-success alert-dismissable" style="display: none">
            <a class="close" onclick="$('.alert').hide();
                window.open('listar_proyecto.php','_self','false');">×</a>
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
                    <a class="navbar-brand" href="../pages/index.html">Online Judge ITSMANTE</a>
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
                            <li><a href="../pages/login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                                    <a href="../examenes/gestionarExamenes.html">Examenes</a>
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
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Problema</th>
                                                <th>Nivel complejidad</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>

<?php
//include '../../sql/conexion.php';
include_once '../../sql/dbconnection.php';
try {
    $mysqli = DbConnection::getInstance();

    $query = 'SELECT idproyecto,rutaProyecto,complejidad,nombreProyecto FROM proyecto WHERE estado='
            . "'ACTIVO';";

    //$resultado = $mysqli->query($query);
    $resultado=$mysqli->executeQuery($query,'');

    if (!$resultado) {
        printf("Error: %s\n", $mysqli->error);
    }

    while ($row = mysqli_fetch_array($resultado, MYSQLI_BOTH)) {

        if (isset($row['idproyecto'])) {
            ?>   


                                                        <tr class="odd gradeX">
                                                            <td><?php echo $row['nombreProyecto']; ?></td>
                                                            <td><?php echo $row['complejidad']; ?></td>
                                                            <td class="">
                                                                <div class="row">
                                                                    <div class="toolbar text-center "  role="toolbar" >

                                                                        <div class="row col-md-offset-2 col-md-4"><form role="form" class="form-inline"  method="POST" action="Gestionar_Proyectos _vizualizar.php">
                                                                                <div class="btn-group" role="group" >
                                                                                    <input type="hidden" name="nombreProblema" value="<?php echo $row['nombreProyecto']; ?>">
                                                                                    <button type="submit"  class="btn btn-sm btn-success col-md-offset-2"  
                                                                                            name="visualizar" value="<?php echo $row['rutaProyecto']; ?>"
                                                                                            onclick="window.open('Gestionar_Proyectos _vizualizar.php', '_self', 'false')">
                                                                                        <i class="glyphicon fa fa-file-o"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </form></div>


                                                                        <div class="row col-md-4 "> 
                                                                            <form role="form" class="form-inline"  method="POST" action="gp_modificar_proyecto.php">
                                                                                <div class="btn-group" role="group" >
                                                                                    <button type="submit" class="btn btn-sm btn-primary col-md-offset-2" name="editar"
                                                                                            value="<?php echo $row['idproyecto']; ?>"
                                                                                            onclick="window.open('gp_modificar_proyecto.php', '_self', 'false')">
                                                                                        <i class="glyphicon glyphicon-edit"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <div class="row col-md-4 form-inline">

                                                                                        <!--<form class="form-inline" method="POST" action="php echo $_SERVER['PHP_SELF']; "><div class="btn-group" role="group">-->
                                                                            <button class="btn btn-sm btn-danger"  value="<?php echo ' '.$row['idproyecto']; ?>" id="btn_delete" name="elimiar_pro" data-toggle="modal"  data-target="#myModal">
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
            echo $query;
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


if (@$_POST['delete']) {
    // header('Location:../../pages/Gestionar_Proyectos_visualizar.php'); 
    $_SESSION['delete'] = TRUE;
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
            $(document).ready(function () {
                $("button#delete_proyecto").click(function () {
                    $.ajax({
                        type: "POST",
                        url: "../../sql/eliminar_proyecto.php", //process to mail
                        data: $('form.contact').serialize(),
                        success: function (msg) {
                            $("#menssage").html(msg);
                            $("#myModal").modal('hide'); //hide popup
                            //$('#menssage').attr("class"," alert-success alert-dismissable ");
                            $('.alert').show();
                        },
                        error: function () {
                             $("#menssage").html("No se pudo eliminar el registro seleccionado");
                             $('#menssage').attr("class"," alert-danger ");
                              $('.alert').show();
                        }
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function () {
            $("#btn_delete").click(function () {
                $('#idTo').val($("#btn_delete").attr("value"));                               
            });});
        </script>
        
       

    </body>
</html>