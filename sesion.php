<?php
	session_start();
	if (!isset($_SESSION['id_user'])) {
		header('location:login.php');
		// echo "window.location.replace('http://localhost/AplicacionLakePlaza/login.php')</script>";
	}
 ?>