<?php 

	try {
		$conn = new PDO("mysql:host=localhost; dbname=lakeplaza", "root", "wilmer");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Activando el atributo que se encarga de gestionar los errores de conexion y/o respuesta de la BD

		} catch (Exception $e) {
		die("Error: " . $e->getMessage() );
	}
 ?>
