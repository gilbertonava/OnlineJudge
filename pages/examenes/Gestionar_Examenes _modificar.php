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

                    <div class="row">
                        <div class="col-md-4 col-lg-12">
                            <h1 class="page-header">Agregar Examen</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->

                    <div class="tab-content" data-target="#tabGestionMateria"> <!--empieza -->

                        <div class=" active tab-pane fade in" id="registrarMateria">

                            <div class="row">
                                <div class="col-md-6 col-lg-9">
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
                                    <br>
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">Proporcione los datos del examen</div>


                                        <div class="panel-body">
                                            <form role="form">

                                                <div class="form-group">
                                                    <label class="control-label" for="nombreExamen">Nombre del examen</label>
                                                    <input type="text" class="form-control" id="nombreExamen" placeholder="examen" required>
                                                </div>

                                                <div class=" form-group">
                                                    <label for="unidades" class="control-label">Unidad</label>
                                                    <select class="form-control" id="unidades">
                                                        <option id="unidad1">Unidad 1</option>
                                                        <option id="unidadn">Unidad 2</option>
                                                        <option id="unidadn">Unidad 3</option>
                                                        <option id="unidadn">Unidad 4</option>
                                                        <option id="unidadn">Unidad 5</option>
                                                        <option id="unidadn">Unidad 6</option>
                                                        <option id="unidadn">Unidad 7</option>
                                                        <option id="unidadn">Unidad 8</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Ruta del archivo</label>

                                                    <input type="file">
                                                </div>
                                                <div class="form-group">
                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label" 
                                                           for="fecha">Fecha</label>
                                                    <input type="date" name="fecha">

                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" 
                                                           for="fecha">Hora de inicio</label>
                                                    <input type="time" name="hora">
                                                    <label class="control-label" 
                                                           for="fecha">Hora de terminación</label>
                                                    <input type="time" name="hora">
                                                </div>


                                                <div class=" form-group col-md-offset-3" align ="right">
                                                    <button type="submit" id="btn-cancel-registrarMateria" 
                                                            class="btn btn-outline btn-danger">Cancelar</button>
                                                    <button type="submit" id="btn-registrarMateria" class="btn btn-outline btn-primary">Registrar</button>
                                                </div>

                                            </form>
                                        </div> 
                                    </div>
                                    <!--</div> --> 
                                    <BR>

                                </div>
                            </div>
                            <!-- /.container-fluid -->
                        </div>
                        <!-- /#page-wrapper -->
                    </div>
                </div>
            </div>
        </div>
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



    </body>




</html>
