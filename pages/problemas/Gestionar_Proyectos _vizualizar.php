<?php
session_start();
                    
                    if (!empty($_POST)){
                         $ruta='../../_Proyectos/'.$_POST['visualizar'].'.pdf';
                         $nombre=$_POST['nombreProblema'];
                    }
                                        
                    else{
                        header('Location:../../pages/listar_proyecto.php');
                        exit();
                        }
                ?>


﻿<!DOCTYPE html>
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
                <a class="navbar-brand" href="../usuarios/index.html"> Juez en Linea ITSMante </a>
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

 <!-- Page Content -->
        <div id="page-wrapper">

               


            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <h1 class="page-header"><?php echo $nombre; ?></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

				<div class="row">

				<div class="form-group col-md-4 text-left">

                                <button class="btn  btn-outline btn-primary" id="delete" 
                                        onclick="window.open('EnviarProyecto-josue.html', '_self', 'false')">Enviar Solución</button>
                            
                </div>
                    <div class="row text-right col-md-6">
                        <div class="btn-group">
                            <div class="btn-group" role="group">
                                <button class="btn btn-sm btn-circle btn-pinterest btn-success col-md-offset-2" 
                                        id="return" onclick="window.open('listar_proyecto.php', '_self', 'false')">
                                    <i class="fa fa-arrow-circle-left"></i>
                                </button>
                            </div>
                        </div>
                    </div> 
                    </div>
                    
				 
                


                        <div class="row">
                            <div class="col-md-6 col-lg-9">
                                
                                <h2></h2>
                                <div id="portapdf"> 
                                 <center>
                                 <object data="<?php echo $ruta; ?>" type="application/pdf" width="800px" height="900px">
                                 </object> </center>
                                </div> 
                                <h2></h2>

                            </div>
                        </div> 
						
						
						



                
                



            </div>
            <!-- /.container-fluid -->
        </div>
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

       

</body>




</html>