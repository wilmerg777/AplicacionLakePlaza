<?php
	include('sesion.php');
	include('includes/header.php');
	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);


	if (isset($_GET['maestro'])) {

		$Tip_form_maestro=$_GET['maestro'];


			switch ($Tip_form_maestro) {
		    case "contrato":
		        $campos = array('cod_contr','fch_emision','fch_carga','sucursal') ;
		        registro_contrato($_SESSION['id_user']);
		        break;
		    case "afilnat":
		        $campos = "" ;
		        registro_afilnat($_SESSION['id_user']);
		        break;
		    case "afiljur":
		        $campos = "" ;
		        registro_afiljur($_SESSION['id_user']);
		        break;
		    case "producto":
		    		$tabla = 'productos';
		        $campos = array('id_prod','cod_prod','nombre','fch_registro','estatus','usuario') ;
		        registro_producto($tabla,$campos);
		        break;
		    case "cond_ventas":
		        $campos = "" ;
		        registro_cond_ventas($_SESSION['id_user']);
		        break;
				}
		}		


	function registro_producto($tabla,$campos){

		include('ventanas_html.php');
	}
?>