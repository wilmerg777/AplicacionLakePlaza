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
		header("Location: index.php");

	}

?>