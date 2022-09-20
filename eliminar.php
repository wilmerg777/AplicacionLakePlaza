<?php 
	include("db.php");

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = "Delete from usuarios where id = $id";
		$resultado = mysqli_query($conn,$query);
		if (!$resultado) {
			die("No se ha borrado el registro!");
		}

		$_SESSION['message'] = "Registro eliminado correctamente.";
		$_SESSION['message_type'] = 'danger';
		header("Location: index.php");

	}

?>