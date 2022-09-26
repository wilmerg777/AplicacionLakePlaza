<?php 

	session_start();
	
	$conn = mysqli_connect(
		'localhost',
		'root',
		'wilmer',
		'lakeplaza'
	);

	if (!isset($conn)) {
		echo "Coneccion exitosa!!!";
	}
 ?>
