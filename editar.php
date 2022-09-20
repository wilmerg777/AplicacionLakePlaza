<?php

	include("db.php");

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = "Select * from usuarios where id = $id";
		$resultado = mysqli_query($conn,$query);
		if (mysqli_num_rows($resultado) == 1) {
			$row = mysqli_fetch_array($resultado);
			$titulo = $row['usuario'];
			$descripcion = $row['mapa'];

		}
	}

	if (isset($_POST['update'])) {

		$id = $_GET['id'];
		$titulo = $_POST['titulo'];
		$descripcion = $_POST['descripcion'];

		$query = "Update usuarios set usuario='$titulo', mapa='$descripcion' where id='$id' ";
		$resultado = mysqli_query($conn,$query);

		if (!$resultado) {
			die("Accion fallida!");
		}else{
			echo 'Datos Actualizados!';
		}
		$_SESSION['message'] = "Registro actualizado correctamente.";
		$_SESSION['message_type'] = 'success';
		header("Location: index.php");

	}

?>

<?php include("includes/header.php") ?>

<div class="container p-4">
	<div class="row">
		<div class="col-md-4 mx-auto">
			<div class="card card-body">
				<form action="editar.php?id=<?php echo $_GET['id'];?>" method="POST">
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