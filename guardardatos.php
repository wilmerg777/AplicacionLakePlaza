<?php
	include("sesion.php");
	include("db.php");

	// (guardar: usuario = 1 ; afilnat = 2 ; afiljur = 3 ; Producto = 4 ; precios = 5 ;)

	if ($_POST['guardar_form']==1) { // usuario
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

	}

	if ($_POST['guardar_form']==4) { // Producto
		print_r($_POST);
		$codProd = $_POST['cod_prod'];
		$nomProd = $_POST['nom_prod'];
		$estProd = $_POST['estado_producto'];
		$usuario = $_POST['cod_user'];

	 	$query = "insert into productos(cod_prod,nombre,estado,usuario) values ('$codProd','$nomProd','$estProd','$usuario')";
		$resultado = $conn->prepare($query);

		try {
			$resultado->execute();
			$mensaje='Producto guardado correctamente!';
			$tipo_mensaje="success";
			} catch (Exception $e) {
			die("Error: " . $e->getMessage() );
			$mensaje='Problemas al guardar :<br>'.$e;
			$tipo_mensaje="danger";
		}

	  $_SESSION['message'] = $mensaje;
	  $_SESSION['message_type'] = $tipo_mensaje;
	  echo "<script>window.location.replace('http://localhost/AplicacionLakePlaza/registro_datos_maestros.php?maestro=producto ')</script>";

	}
 ?>