<?php
	include("sesion.php");
	include("db.php");

	// (guardar: usuario = 1 ; afilnat = 2 ; afiljur = 3 ; Producto = 4 ; precios = 5 ;)

	if ($_POST['guardar_form']==1) { // usuario
		$codUser = $_POST['codUser'];
		$usuario = $_POST['usuario'];
		$emailUser = $_POST['email_user'];
		$password = $_POST['clave_usuario'];

	 	$query = "insert into usuarios(cod_user,usuario,email_user,password) values ('$codUser','$usuario','$emailUser','$password')";
		$resultado = $conn->prepare($query);

		try {
			$resultado->execute();
			$mensaje='Registro guardado correctamente!';
			$tipo_mensaje="success";
			} catch (Exception $e) {
			//die("Errorx: " . $e->getMessage() );
			$error = "Error: " . $e->getMessage() ;
			$mensaje='Problemas al guardar :<br>'.$error;
			$tipo_mensaje="danger";
		}

	  $_SESSION['message'] = $mensaje;
	  $_SESSION['message_type'] = $tipo_mensaje;
	  echo "<script>window.location.replace('https://localhost/AplicacionLakePlaza/registro_datos_maestros.php?maestro=usuarios ')</script>";

	}

	if ($_POST['guardar_form']==4) { // Producto
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
			//die("Errorx: " . $e->getMessage() );
			$error = "Error: " . $e->getMessage() ;
			$mensaje='Problemas al guardar :<br>'.$error;
			$tipo_mensaje="danger";
		}

	  $_SESSION['message'] = $mensaje;
	  $_SESSION['message_type'] = $tipo_mensaje;
	  echo "<script>window.location.replace('https://localhost/AplicacionLakePlaza/registro_datos_maestros.php?maestro=producto ')</script>";

	}

	if ($_POST['guardar_form']==2) { // afiliado natural.
		$cod_afil_natu = $_POST['cod_afil_natu'];
		$nom_afil_natu = $_POST['nom_afil_natu'];
		$ape_afil_natu = $_POST['ape_afil_natu'];
		$fch_nat = $_POST['fch_nat'];
		$sexo_afil_natu = $_POST['sexo_afil_natu'];
		$pais_orig_afil_natu = $_POST['pais_orig_afil_natu'];
		$direccion_afil_natu = $_POST['direccion_afil_natu'];
		$cod_ciudad = $_POST['cod_ciudad'];
		$telefonos = $_POST['telefonos'];
		$email_afil_natu = $_POST['email_afil_natu'];
		$user_reg = $_POST['cod_user'];

	 	$query = "insert into afiliados_natu(cod_afil_natu,nombre_afil_natu,apellido_afil_natu,fch_nac,sexo,pais_orig,direccion_afil_natu,cod_ciudad,telefonos,email_afil_natu,usuario) values ('$cod_afil_natu','$nom_afil_natu','$ape_afil_natu','$fch_nat','$sexo_afil_natu','$pais_orig_afil_natu','$direccion_afil_natu','$cod_ciudad',
		'$telefonos','$email_afil_natu','$user_reg')";
		$resultado = $conn->prepare($query);

		try {
			$resultado->execute();
			$mensaje='Registro guardado correctamente!';
			$tipo_mensaje="success";
			} catch (Exception $e) {
			//die("Errorx: " . $e->getMessage() );
			$error = "Error: " . $e->getMessage() ;
			$mensaje='Problemas al guardar :<br>'.$error;
			$tipo_mensaje="danger";
		}

	  $_SESSION['message'] = $mensaje;
	  $_SESSION['message_type'] = $tipo_mensaje;
	  echo "<script>window.location.replace('https://localhost/AplicacionLakePlaza/registro_datos_maestros.php?maestro=afilnat ')</script>";

	}

		if ($_POST['guardar_form']==3) { // afiliado juridico.
			$cod_afil_jur = $_POST['cod_afil_jurid'];
			$nombre_afil_jur = $_POST['nom_afil_jurid'];
			$fch_registro = $_POST['fch_reg'] ;
			$registro = $_POST['registro_jurid'];
			$tomo_reg = $_POST['tomo_reg'];
			$direccion_afil_jur = $_POST['direccion_afil_jurid'];
			$telefono_afil_jur = $_POST['telefonos'];
			$email_afil_jur = $_POST['email_afil_jurid'];
			$nombre_rep_afil_jur = $_POST['nom_representante'];
			$cedula_rep_afil_jur = $_POST['ced_representante'];

	 	$query = "insert into afiliados_jurid(cod_afil_jur,nombre_afil_jur,fch_registro,registro,tomo_reg,direccion_afil_jur,telefono_afil_jur,email_afil_jur,nombre_rep_afil_jur,cedula_rep_afil_jur) values (
	 		'$cod_afil_jur',
			'$nombre_afil_jur',
			'$fch_registro',
			'$registro',
			'$tomo_reg',
			'$direccion_afil_jur',
			'$telefono_afil_jur',
			'$email_afil_jur',
			'$nombre_rep_afil_jur',
			'$cedula_rep_afil_jur')";
		$resultado = $conn->prepare($query);

		try {
			$resultado->execute();
			$mensaje='Registro guardado correctamente!';
			$tipo_mensaje="success";
			} catch (Exception $e) {
			//die("Errorx: " . $e->getMessage() );
			$error = "Error: " . $e->getMessage() ;
			$mensaje='Problemas al guardar :<br>'.$error;
			$tipo_mensaje="danger";
		}

	  $_SESSION['message'] = $mensaje;
	  $_SESSION['message_type'] = $tipo_mensaje;
	  echo "<script>window.location.replace('https://localhost/AplicacionLakePlaza/registro_datos_maestros.php?maestro=afiljur ')</script>";

	}

 ?>