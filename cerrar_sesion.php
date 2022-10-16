<?php 
	session_start();

	session_destroy();
	echo "<script>alert('Sesion cerrada!')
				window.location.replace('http://localhost/AplicacionLakePlaza/login.php')</script>";
 ?>