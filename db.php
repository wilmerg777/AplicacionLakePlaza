<?php 

	try {
		$conn = new PDO("mysql:host=localhost; dbname=lakeplaza", "root", "wilmer");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		} catch (Exception $e) {
		die("Error: " . $e->getMessage() );
	}
 ?>
