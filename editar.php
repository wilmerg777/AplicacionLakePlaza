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
<<<<<<< HEAD
			$titulo = $row['usuario'];
			$descripcion = $row['mapa'];

=======
			$codUser = $row['cod_user'];
			$usuario = $row['usuario'];
			$email = $row['email_user'];
>>>>>>> bd85ebd052148a0fa04ee28f2e5bc51740ecbf0f
		}
	}

	if (isset($_POST['update'])) {

		$id = $_GET['id_user'];
<<<<<<< HEAD
		$titulo = $_POST['titulo'];
		$descripcion = $_POST['descripcion'];

		$query = "Update usuarios set usuario='$titulo', mapa='$descripcion' where id_user='$id' ";
		$resultado = $conn->prepare($query);
		$cuantos=$resultado->execute();

		if (!$cuantos) {
			die("Accion de editar fallida!");
=======
		$usuario = $_POST['usuario'];
		$email = $_POST['email_user'];
		$password = $_POST['clave_usuario'];

		$query = "Update usuarios set usuario='$usuario', email_user='$email', password='$password' where id_user='$id' ";
		$resultado = $conn->prepare($query);
		$cuantos=$resultado->execute();

		if ($cuantos<1) {
			die("Accion de editar fallida! ".$cuantos);
>>>>>>> bd85ebd052148a0fa04ee28f2e5bc51740ecbf0f
		}else{
			echo 'Datos Actualizados!';
		}
		$_SESSION['id_user'] = $id;
		$_SESSION['message'] = "Registro actualizado correctamente.";
		$_SESSION['message_type'] = 'success';
<<<<<<< HEAD
		echo "<script>window.location.replace('https://localhost/AplicacionLakePlaza/index.php')</script>";
=======
		echo "<script>window.location.replace('http://localhost/AplicacionLakePlaza/index.php')</script>";
>>>>>>> bd85ebd052148a0fa04ee28f2e5bc51740ecbf0f
	}

?>

<?php include("includes/header.php") ?>

<div class="container p-4">
	<div class="row">
		<div class="col-md-4 mx-auto">
			<div class="card card-body">
				<form action="editar.php?id_user=<?php echo $_GET['id_user'];?>" method="POST">
<<<<<<< HEAD
=======
					<div class="form-group">
						<input type="text" name="usuario" value="<?php echo $usuario ;?>" class="form-control" placeholder="Actualiza usuario">
					</div>
>>>>>>> bd85ebd052148a0fa04ee28f2e5bc51740ecbf0f
					<div class="form-group">
						<input type="email" name="email_user" class="form-control" value="<?php echo $email; ?>" placeholder="Actualiza el correo">
					</div>
					<div class="form-group">
						<input type="password" name="clave_usuario" value="<?php echo $password ;?>" class="form-control" placeholder="Nueva clave" >
					</div>
					<button type="submit" class="btn btn-success" name="update">Actualizar</button>
				</form>
			</div>
		</div>
	</div>
</div>