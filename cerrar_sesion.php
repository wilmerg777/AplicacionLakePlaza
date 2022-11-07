<?php 
	session_start();

	session_destroy();
	echo "<script>alert('Sesion cerrada!')
				window.location.replace('https://localhost/AplicacionLakePlaza/login.php')</script>";
 ?>