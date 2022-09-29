<?php 

	session_start();
	
	$conn = mysqli_connect(
		'localhost',
		'root',
		'wilmer',
		'lakeplaza'
	);



	if ($conn) {
		// echo "Coneccion exitosa";
	}else {

		header("Location: conect_err.php");
	}

 ?>
