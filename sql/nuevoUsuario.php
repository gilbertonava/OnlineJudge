<?php
include 'conexion.php';


$tipo=@$_POST['tipo'];
$nombre=@$_POST['name'];
$apellidos=@$_POST['apellidos'];
$pwd=@$_POST['password2'];
$mail=@$_POST['mail'];
$alias=@$_POST['nickname'];
$sexo=@$_POST['sexo'];

$mysqli=Conectarse();
$query='INSERT INTO users(idtipo,nombre,apellidos,password,nickname,mail,sexo) 
		values('.$tipo.',"'.$nombre.'","'.$apellidos.'","'.$pwd.'","'.$alias.'","'.$mail.'","'.$sexo.'");';
		
$resultado = $mysqli->query($query);
$row=mysqli_fetch_array($resultado,MYSQLI_BOTH);
		

 if(isset($row["idusers"])){						   
			echo 'The user has been added with the id: '.$row['idusers'].' ';
			}
else{
	echo 'The cannot be added';
}
		    
?>