<?php
	include('sesion.php');
	include('includes/header.php');
	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);


	if (isset($_GET['maestro'])) {

		$Tip_form_maestro=$_GET['maestro'];


			switch ($Tip_form_maestro) {
		    case "contrato":
		    		$tabla = 'contratos';
		        $campos = array('cod_contr','fch_emision','fch_carga','sucursal') ;
		        registro_maestro($tabla="", $campos="", $Tip_form_maestro);
		        break;
		    case "afilnat":
		    		$tabla = 'afiliados_natu';
		        $campos = array('cod_afil_natu','nombre_afil_natu','apellido_afil_natu','fch_nac','sexo','pais_orig','direccion_afil_natu','cod_ciudad','telefonos','email_afil_natu') ;
		        registro_maestro($tabla="", $campos="", $Tip_form_maestro);
		        break;
		    case "afiljur":
		    		$tabla = 'afiliados_jurid';
		        $campos = "" ;
		        registro_maestro($tabla="", $campos="", $Tip_form_maestro);
		        break;
		    case "producto":
		    		$tabla = 'productos';
		        $campos = array('id_prod','cod_prod','nombre','fch_registro','estatus','usuario') ;
		        registro_maestro($tabla="", $campos="", $Tip_form_maestro);
		    case "prog_vtas":
		    		$tabla = 'prog_ventas';
		        $campos = array('id_prog','cod_prog','nombre_prog','estatus') ;
		        registro_maestro($tabla="", $campos="", $Tip_form_maestro);
		        break;		        break;
		    case "condiciones_ventas":
		    		$tabla = 'condiciones_ventas';
		        $campos = "'id_cond','cod_cond','producto','operativo','puntos_ini','puntos_fin','monto_pto','mto_pto_comici','moneda','cuotas','tasa','descto_maximo','monto_gasto_admin','usuario'" ;
		        registro_maestro($tabla="", $campos="", $Tip_form_maestro);
		        break;
		    case "usuarios":
		    		$tabla = 'usuarios';
		        $campos = array('cod_user','usuario','email_user','password','fch_registro') ;
		        registro_maestro($tabla="",$campos="", $Tip_form_maestro);
		        break;
		    case "operativos":
		    		$tabla = 'operativos';
		        $campos = array('cod_user','usuario','email_user','password','fch_registro') ;
		        registro_maestro($tabla="",$campos="", $Tip_form_maestro);
		        break;
		    case "error":
		    		$tabla = 'errores';
		        $campos = array('cod_err','error','email_reporte','fch_err') ;
		        registro_maestro($tabla="",$campos="", $Tip_form_maestro);
		        break;
				}
		}		


	function registro_maestro($tabla,$campos,$Tip_form_maestro){

		include("ventanas_html.php" );
	}

		include('includes/footer.php');
?>