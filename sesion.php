<?php
	session_start();
	if (!isset($_SESSION['id_user'])) {
		echo "window.location.replace('http://localhost/AplicacionLakePlaza/login.php')</script>";
	}
 ?>