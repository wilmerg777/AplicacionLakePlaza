<?php
	session_start();
	include("db.php");

	if (isset($_GET['id_user'])) {
		$id = $_GET['id_user'];
		$query = "Select * from usuarios where id_user = $id";
		$resultado = $conn->prepare($query);
		$cuantos=$resultado->execute();
		if ($cuantos == 1) {
			$row = $resultado->fetch(PDO::FETCH_ASSOC);
			$titulo = $row['usuario'];
			$descripcion = $row['mapa'];

		}
	}

	if (isset($_POST['update'])) {

		$id = $_GET['id_user'];
		$titulo = $_POST['titulo'];
		$descripcion = $_POST['descripcion'];

		$query = "Update usuarios set usuario='$titulo', mapa='$descripcion' where id_user='$id' ";
		$resultado = $conn->prepare($query);
		$cuantos=$resultado->execute();

		if (!$cuantos) {
			die("Accion de editar fallida!");
		}else{
			echo 'Datos Actualizados!';
		}
		$_SESSION['message'] = "Registro actualizado correctamente.";
		$_SESSION['message_type'] = 'success';
		echo "<script>window.location.replace('http://localhost/AplicacionLakePlaza/index.php')</script>";
	}

?>

<?php include("includes/header.php") ?>

<div class="container p-4">
	<div class="row">
		<div class="col-md-4 mx-auto">
			<div class="card card-body">
				<form action="editar.php?id_user=<?php echo $_GET['id_user'];?>" method="POST">
					<div class="form-group">
						<input type="text" name="titulo" value="<?php echo $titulo ;?>" class="form-control" placeholder="Actualiza usuario">
					</div>
					<div class="form-group">
						<textarea name="descripcion" rows="2" class="form-control" placeholder="Actualiza mapa"><?php echo $descripcion; ?></textarea>
					</div>
					<button type="submit" class="btn btn-success" name="update">Actualizar</button>
				</form>
			</div>
		</div>
	</div>
</div>