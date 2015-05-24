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

        <title>SB Admin 2 - Bootstrap Admin Theme</title>

        <!-- Bootstrap Core CSS -->
        <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                        <button type="button" class="btn btn-pinterest btn-primary btn-danger" data-dismiss="modal" ><a href="#" onclick="$('.alert').show()">Delete</a></button>
                    </div>
                </div>
            </div>
        </div>

        <!--alert-->

        <div class="alert alert-success alert-dismissable" style="display: none">
            <a class="close" onclick="$('.alert').hide()">×</a>
            <strong>Eliminado!</strong> El registro ha sido eliminado.
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
                    <a class="navbar-brand" href="index.html">Online Judge ITSMANTE</a>
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
                                <a href="#"><i class="fa fa-files-o fa-fw"></i> Panel de Control<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <!--<li>
                    <a href="enviarExamen.html">Enviar Examen -gil</a>
                </li>
                <li>
                    <a href="EnviarProyecto-josue.html">Enviar proyecto -josusue</a>
                </li>-->
                                    <li>
                                        <a href="listar_proyecto.php">Proyectos</a>
                                    </li>

                                    <li>
                                        <a href="Gestionar_Examenes.html">Examenes</a>
                                    </li>

                                    <li>
                                        <a href="listarMateria_merce.html">Materias</a>
                                    </li>

                                    <li>
                                        <a href="GestionarUsuario-joosuse.html">Usuarios</a>
                                    </li>
                                    <li>
                                        <a href="login.html">Login</a>
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
                                    <button class="btn  btn-outline btn-success" id="delete" onclick="window.open('gp_nuevo_proyecto.php', '_self', 'false')">Registrar Nuevo</button>
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
                                            include '../sql/conexion.php';
                                            try {
                                                $mysqli = Conectarse();

                                                $query = 'SELECT idproyecto,rutaProyecto,complejidad,nombreProyecto FROM proyecto WHERE estado='
                                                        . "'ACTIVO';";

                                                $resultado = $mysqli->query($query);

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

                                                                            <div class="btn-group" role="group">
                                                                                <button class="btn btn-sm btn-danger" type="submit" value="<?php echo $row['idproyecto']; ?>" name="delete" data-toggle="modal" data-target="#myModal">
                                                                                    <i class="glyphicon glyphicon-remove"></i>
                                                                                </button>
                                                                                                                                                                                                                                              
                                                                            </div>

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
                                            
                                            
                                            if(@$_POST['delete']){
                                                header('Location:../pages/Gestionar_Proyectos_visualizar.php');                                               
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
        <script src="../bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="../bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
        <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../dist/js/sb-admin-2.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
                                                                                    $(document).ready(function () {
                                                                                        $('#dataTables-example').DataTable({
                                                                                            responsive: true
                                                                                        });
                                                                                    });
        </script>

    </body>
</html>