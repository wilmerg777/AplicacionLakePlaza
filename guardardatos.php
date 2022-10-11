<?php 
	session_start();
	include("db.php") 
?>

<?php 
	$titulo = $_POST['titulo'];
	$descripcion = $_POST['descripcion'];

 	$query = "insert into usuarios(usuario,mapa,password) values ('$titulo','$descripcion','1234')";
	$resultado = $conn->prepare($query);
	$cuantos=$resultado->execute();

	if (!$cuantos) {
		die("Accion fallida guardando datos!");
	}else{
		echo 'Datos insertados!';
	}

  $_SESSION['message'] = 'Registro guardado correctamente!';
  $_SESSION['message_type'] = 'success';
  echo "<script>window.location.replace('https://localhost/AplicacionLakePlaza/index.php')</script>";
 ?>