<?php
	include('sesion.php');
	include('includes/header.php');

	function registro_maestro($tabla,$campos,$Tip_form_maestro, $cTitulo_modal){
		include("ventanas_html.php" );
	}

	if (isset($_GET['maestro'])) {

		$Tip_form_maestro=$_GET['maestro'];

		function mostrar_maestro($Tip_form_maestro){

			switch ($Tip_form_maestro) {
		    case "contrato":
		    	$tabla = 'contratos';
		        $campos = array('cod_contr','fch_emision','fch_carga','sucursal') ;
		        registro_maestro($tabla="", $campos="", $Tip_form_maestro, "Contrato");
		        break;
		    case "afilnat":
		    	$tabla = 'afiliados_natu';
		        $campos = array('cod_afil_natu','nombre_afil_natu','apellido_afil_natu','fch_nac','sexo','pais_orig','direccion_afil_natu','cod_ciudad','telefonos','email_afil_natu') ;
		        registro_maestro($tabla="", $campos="", $Tip_form_maestro, "Afiliado-Natural");
		        break;
		    case "afiljur":
		    	$tabla = 'afiliados_jurid';
		        $campos = "" ;
		        registro_maestro($tabla="", $campos="", $Tip_form_maestro,"Afiliado-Jurídico");
		        break;
		    case "producto":
		    	$tabla = 'productos';
		        $campos = array('id_prod','cod_prod','nombre','fch_registro','estatus','usuario') ;
		        registro_maestro($tabla="", $campos="", $Tip_form_maestro, "Producto");
		    case "prog_vtas":
		    	$tabla = 'prog_ventas';
		        $campos = array('id_prog','cod_prog','nombre_prog','estatus') ;
		        registro_maestro($tabla="", $campos="", $Tip_form_maestro, "Programa de Venta");
		        break;
		    case "operativo":
		    	$tabla = 'prog_ventas';
		        $campos = array('id_oper','cod_oper','nombre_oper','fch_inicio','fch_fin','estatus','usuario') ;
		        registro_maestro($tabla="", $campos="", $Tip_form_maestro, "Operativo");
		        break;
		    case "condiciones_ventas":
		    	$tabla = 'condiciones_ventas';
		        $campos = "'id_cond','cod_cond','producto','operativo','puntos_ini','puntos_fin','monto_pto','mto_pto_comici','moneda','cuotas','tasa','descto_maximo','monto_gasto_admin','usuario'" ;
		        registro_maestro($tabla="", $campos="", $Tip_form_maestro, "Condicion de Venta");
		        break;
		    case "usuarios":
		    	$tabla = 'usuarios';
		        $campos = array('cod_user','usuario','email_user','password','fch_registro') ;
		        registro_maestro($tabla="",$campos="", $Tip_form_maestro, "Usuario");
		        break;
		    case "tasa":
		    	$tabla = 'tasas';
		      $campos = array('cod_user','usuario','email_user','password','fch_registro') ;
		      registro_maestro($tabla="",$campos="", $Tip_form_maestro, "Tasa");
		      break;
		    case "error":
		    	$tabla = 'errores';
		        $campos = array('cod_err','error','email_reporte','fch_err') ;
		        registro_maestro($tabla="",$campos="", $Tip_form_maestro);
		        break;
				}
		}
	}
	
	mostrar_maestro($Tip_form_maestro);

?>