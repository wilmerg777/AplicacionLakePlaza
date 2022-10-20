<?php
	include('sesion.php');
	include('includes/header.php');
	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);


	if (isset($_GET['maestro'])) {

		$Tip_form_maestro=$_GET['maestro'];


			switch ($Tip_form_maestro) {
		    case "contrato":
		        $campos = array('cod_contr','fch_emision','fch_carga','sucursal') ;
		        registro_maestro($tabla="", $campos="", $Tip_form_maestro);
		        break;
		    case "afilnat":
		        $campos = "" ;
		        registro_maestro($tabla="", $campos="", $Tip_form_maestro);
		        break;
		    case "afiljur":
		        $campos = "" ;
		        registro_maestro($tabla="", $campos="", $Tip_form_maestro);
		        break;
		    case "producto":
		    		$tabla = 'productos';
		        $campos = array('id_prod','cod_prod','nombre','fch_registro','estatus','usuario') ;
		        registro_maestro($tabla="", $campos="", $Tip_form_maestro);
		        break;
		    case "cond_ventas":
		        $campos = "" ;
		        registro_maestro($tabla="", $campos="", $Tip_form_maestro);
		        break;
		    case "usuarios":
		    		$tabla = 'usuarios';
		        $campos = array('cod_user','usuario','email_user','password','fch_registro') ;
		        registro_maestro($tabla,$campos="", $Tip_form_maestro);
		        break;
				}
		}		


	function registro_maestro($tabla,$campos,$Tip_form_maestro){

		include("ventanas_html.php" );
	}

		include('includes/footer.php');
?>