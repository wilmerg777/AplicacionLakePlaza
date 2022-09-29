<?php include("db.php") ?>

<?php 
	$titulo = $_POST['titulo'];
	$descripcion = $_POST['descripcion'];

 	$query = "insert into usuarios(usuario,mapa,password) values ('$titulo','$descripcion','1234')";
	$resultado = mysqli_query($conn,$query);

	if (!$resultado) {
		die("Accion fallida guardando datos!");
	}else{
		echo 'Datos insertados!';
	}

  $_SESSION['message'] = 'Registro guardado correctamente!';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');
 ?>