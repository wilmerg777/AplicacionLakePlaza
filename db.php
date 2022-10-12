<?php 

try {
	$conn = new PDO("mysql:host=localhost; dbname=lakeplaza", "root", "wilmer");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch (Exception $e) {
	die("Error: " . $e->getMessage() );
}

	// $conn = mysqli_connect(
	// 	'localhost',
	// 	'root',
	// 	'wilmer',
	// 	'lakeplaza'
	// );



	// if ($conn) {
	// 	// echo "Coneccion exitosa";
	// }else {

	// 	header("Location: conect_err.php");
	// }

 ?>
