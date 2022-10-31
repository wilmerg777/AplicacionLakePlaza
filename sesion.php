<?php
	if (!isset($_SESSION)) {
	  session_start();
	}
	if (!isset($_SESSION['id_user'])) {
		header('location:login.php');
	}
 ?>