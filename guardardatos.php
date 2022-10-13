<<<<<<< HEAD
<?php 
	session_start();
	include("db.php") 
?>

=======
>>>>>>> bd85ebd052148a0fa04ee28f2e5bc51740ecbf0f
<?php 
	session_start();
	include("db.php");
?>

<<<<<<< HEAD
 	$query = "insert into usuarios(usuario,mapa,password) values ('$titulo','$descripcion','1234')";
	$resultado = $conn->prepare($query);
	$cuantos=$resultado->execute();

=======
<?php
	$codUser = $_POST['codUser'];
	$usuario = $_POST['usuario'];
	$emailUser = $_POST['email_user'];
	$password = $_POST['clave_usuario'];

 	$query = "insert into usuarios(cod_user,usuario,email_user,password) values ('$codUser','$usuario','$emailUser',$password)";
	$resultado = $conn->prepare($query);
	$cuantos=$resultado->execute();
	echo 'string';
>>>>>>> bd85ebd052148a0fa04ee28f2e5bc51740ecbf0f
	if (!$cuantos) {
		die("Accion fallida guardando datos!");
	}

  $_SESSION['message'] = 'Registro guardado correctamente!';
  $_SESSION['message_type'] = 'success';
<<<<<<< HEAD
  echo "<script>window.location.replace('https://localhost/AplicacionLakePlaza/index.php')</script>";
=======
  echo "<script>window.location.replace('http://localhost/AplicacionLakePlaza/index.php')</script>";
>>>>>>> bd85ebd052148a0fa04ee28f2e5bc51740ecbf0f
 ?>