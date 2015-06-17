<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Online Judge ITSMANTE </title>

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
                        <h1 class="page-header">Resultados del Examen</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <div class="row">
                    
                    <img class="img-thumbnail col-md-offset-2 col-lg-offset-4" src="../../static/images/resultados.jpg" height="200" width="200" />                   
                    
                </div> 
                <h2></h2>

                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            
                            <tbody>
                                <tr class="odd gradeX">
                                    <td width="40px"><b>Alumno:</b></td>
                                    <td>[el alumno]</td>
                                   

                                </tr>
                                <tr class="odd gradeX">
                                    <td width="40px"><b>Materia:</b></td>
                                    <td>[la materia]</td>


                                </tr>
                                <tr class="odd gradeX">
                                    <td width="40px"><b>Unidad:</b></td>
                                    <td>[la unidad]</td>


                                </tr>
                                <tr class="even gradeC">
                                    <td width="40px"><b>Fecha de envio:</b></td>
                                    <td>[fecha]</td>
                                    
                                </tr>
                                <tr class="odd gradeA">
                                    <td width="40px"><b>Hora de envio:</b></td>
                                    <td>[hora]</td>
                                    
                                </tr>
                                <tr class="even gradeA">
                                    <td width="40px"><b>Calificación:</b></td>
                                    <td>[nota obtenida]</td>
                                    
                                
                                </tr>
                                <tr class="even gradeA">
                                    <td width="40px"><b>Observaciones:</b></td>
                                    <td>[observaciones]</td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
            <!-- /.container-fluid -->
        </div>
 <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
</div>
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
