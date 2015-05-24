
<?php
	
function Conectarse(){
    try {
	$mysqli = new mysqli("localhost", "userJuez", "P@ssw0rd", "online_judge");
	if ($mysqli->connect_errno) {
	    header('Location:../pages/index.html');
	}
	else{
            //echo $mysqli->host_info . "\n la conexion fue exitosa"
              //      .$mysqli->server_info;
	}

	return $mysqli;
    }  catch (RuntimeException $E){  header('Location:../pages/index.html');}
}

Conectarse();


?>