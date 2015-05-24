<?php

include 'conexion.php';

session_start();


function START_SESSION(){

	//validate if items doesn´t come empty

	if (@$_POST['user']!==''&& @$_POST['pwd']!=='') {

		//verify if user ans pwd match in the database

		$query='SELECT idusers FROM users where nickname="'.@$_POST['user'].'" and password="'.@$_POST['pwd'].'";';

		echo 'quering..\n';
		$mysqli=Conectarse();

		$resultado = $mysqli->query($query);

		$row=mysqli_fetch_array($resultado,MYSQLI_BOTH);
       
	       if(isset($row["idusers"])){

	       	 $_SESSION['user']=@$_POST['user'];   
				echo 'user founded';
		      header('Location:../index.php');
		      return $_SESSION['user'];
	       } 

	       else
    			{
					echo 'user not found';
    				header('Location:../login.php');
    			}       
  		}
    		else
    			{
				echo 'without Post[]';
    				header('Location:../login.php');
    			}
	}

	START_SESSION();


function loggedin() {
  return isset($_SESSION['user']);
}


loggedin();
				/* Consultas de selección que devuelven un conjunto de resultados 
					if ($resultado = $mysqli->query($query)) {
					    printf("La selección devolvió %d filas.\n", $resultado->num_rows);

					    /* liberar el conjunto de resultados 
					    $resultado->close();
					}
				*/
?>


