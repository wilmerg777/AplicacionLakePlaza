<?php
	session_start();
	if (!isset($_SESSION['id_user'])) {
		echo "<script>alert('Sesion no inicida o vencida!')
				window.location.replace('http://localhost/AplicacionLakePlaza/login.php')</script>";
	}
 ?>