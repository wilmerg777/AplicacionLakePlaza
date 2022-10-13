<?php
	session_start();
	include("db.php");

	if (isset($_GET['id_user'])) {
		$id = $_GET['id_user'];
		$query = "Delete from usuarios where id_user = $id";
		$resultado = $conn->prepare($query);
		$cuantos=$resultado->execute();
		if (!$cuantos) {
			die("No se ha borrado el registro!");
		}
		$_SESSION['id_user'] = $id;
		$_SESSION['message'] = "Registro eliminado correctamente.";
		$_SESSION['message_type'] = 'danger';
		header("Location: index.php");

	}

?>