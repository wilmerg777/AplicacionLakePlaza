<?php 
	session_start();
	include("db.php");
?>

<?php
	$codUser = $_POST['codUser'];
	$usuario = $_POST['usuario'];
	$emailUser = $_POST['email_user'];
	$password = $_POST['clave_usuario'];

 	$query = "insert into usuarios(cod_user,usuario,email_user,password) values ('$codUser','$usuario','$emailUser',$password)";
	$resultado = $conn->prepare($query);
	$cuantos=$resultado->execute();
	echo 'string';

	if (!$cuantos) {
		die("Accion fallida guardando datos!");
	}

  $_SESSION['message'] = 'Registro guardado correctamente!';
  $_SESSION['message_type'] = 'success';

  echo "<script>window.location.replace('https://localhost/AplicacionLakePlaza/index.php')</script>";

 ?>