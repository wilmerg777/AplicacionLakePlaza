<?php
	include("sesion.php");
	include("db.php");

	$codUser = $_POST['codUser'];
	$usuario = $_POST['usuario'];
	$emailUser = $_POST['email_user'];
	$password = $_POST['clave_usuario'];


 	$query = "insert into usuarios(cod_user,usuario,email_user,password) values ('$codUser','$usuario','$emailUser',$password)";
	$resultado = $conn->prepare($query);

	try {
		$resultado->execute();
		$mensaje='Registro guardado correctamente!';
		$tipo_mensaje="success";
		} catch (Exception $e) {
		die("Error: " . $e->getMessage() );
		$mensaje='Problemas al guardar :<br>'.$e;
		$tipo_mensaje="danger";
	}


  $_SESSION['message'] = $mensaje;
  $_SESSION['message_type'] = $tipo_mensaje;
  echo "<script>window.location.replace('http://localhost/AplicacionLakePlaza/index.php')</script>";
 ?>