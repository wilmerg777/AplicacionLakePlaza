<?php
	include("sesion.php");
	include("db.php");

	if (isset($_GET['id_user'])) {
		$id = $_GET['id_user'];
		$query = "Delete from usuarios where id_user = $id";
		$resultado = $conn->prepare($query);

		try {
			$cuantos=$resultado->execute();
			$mensaje='Registro eliminado correctamente!';
			$tipo_mensaje="success";		
		} catch (Exception $e) {
			$mensaje='Problemas al Eliminar :<br>'.$e;
			$tipo_mensaje="danger";
		}

		$_SESSION['message'] = $mensaje;
    $_SESSION['message_type'] = $tipo_mensaje;
		header("Location: registro_datos_maestros.php?maestro=usuarios");

	}elseif (isset($_GET['id_prod'])) {
		$id = $_GET['id_prod'];
		$query = "Delete from productos where id_prod = $id";
		$resultado = $conn->prepare($query);

		try {
			$cuantos=$resultado->execute();
			$mensaje='Registro eliminado correctamente!';
			$tipo_mensaje="success";		
		} catch (Exception $e) {
			$mensaje='Problemas al Eliminar :<br>'.$e;
			$tipo_mensaje="danger";
		}

		$_SESSION['message'] = $mensaje;
    $_SESSION['message_type'] = $tipo_mensaje;
		header("Location: registro_datos_maestros.php?maestro=producto");

	}elseif (isset($_GET['id_oper'])) {
		$id = $_GET['id_oper'];
		$query = "Delete from operativos where id_oper = $id";
		$resultado = $conn->prepare($query);

		try {
			$cuantos=$resultado->execute();
			$mensaje='Registro eliminado correctamente!';
			$tipo_mensaje="success";		
		} catch (Exception $e) {
			$mensaje='Problemas al Eliminar :<br>'.$e;
			$tipo_mensaje="danger";
		}

		$_SESSION['message'] = $mensaje;
    $_SESSION['message_type'] = $tipo_mensaje;
		header("Location: registro_datos_maestros.php?maestro=operativo");

	}elseif (isset($_GET['id_prog'])) {
		$id = $_GET['id_prog'];
		$query = "Delete from prog_ventas where id_prog = $id";
		$resultado = $conn->prepare($query);

		try {
			$cuantos=$resultado->execute();
			$mensaje='Registro eliminado correctamente!';
			$tipo_mensaje="success";		
		} catch (Exception $e) {
			$mensaje='Problemas al Eliminar :<br>'.$e;
			$tipo_mensaje="danger";
		}

		$_SESSION['message'] = $mensaje;
    $_SESSION['message_type'] = $tipo_mensaje;
		header("Location: registro_datos_maestros.php?maestro=prog_vtas");

	}elseif (isset($_GET['id_cond'])) {
		$id = $_GET['id_cond'];
		$query = "Delete from condiciones_ventas where id_cond = $id";
		$resultado = $conn->prepare($query);

		try {
			$cuantos=$resultado->execute();
			$mensaje='Registro eliminado correctamente!';
			$tipo_mensaje="success";		
		} catch (Exception $e) {
			$mensaje='Problemas al Eliminar :<br>'.$e;
			$tipo_mensaje="danger";
		}

		$_SESSION['message'] = $mensaje;
    $_SESSION['message_type'] = $tipo_mensaje;
		header("Location: registro_datos_maestros.php?maestro=condiciones_ventas");

	}elseif (isset($_GET['id_afil_natu'])) {
		$id = $_GET['id_afil_natu'];
		$query = "Delete from afiliados_natu where id_afil_natu = $id";
		$resultado = $conn->prepare($query);

		try {
			$cuantos=$resultado->execute();
			$mensaje='Registro eliminado correctamente!';
			$tipo_mensaje="success";		
		} catch (Exception $e) {
			$mensaje='Problemas al Eliminar :<br>'.$e;
			$tipo_mensaje="danger";
		}

		$_SESSION['message'] = $mensaje;
    $_SESSION['message_type'] = $tipo_mensaje;
		header("Location: registro_datos_maestros.php?maestro=afilnat");

	}elseif (isset($_GET['id_afil_jur'])) {
		$id = $_GET['id_afil_jur'];
		$query = "Delete from afiliados_jurid where id_afil_jur = $id";
		$resultado = $conn->prepare($query);

		try {
			$cuantos=$resultado->execute();
			$mensaje='Registro eliminado correctamente!';
			$tipo_mensaje="success";		
		} catch (Exception $e) {
			$mensaje='Problemas al Eliminar :<br>'.$e;
			$tipo_mensaje="danger";
		}

		$_SESSION['message'] = $mensaje;
    $_SESSION['message_type'] = $tipo_mensaje;
		header("Location: registro_datos_maestros.php?maestro=afiljur");

	}

?>