<?php
	include("sesion.php");
	include("db.php");

	// (guardar: usuario = 1 ; afilnat = 2 ; afiljur = 3 ; Producto = 4 ;Operativo = 7 ; prog_vtas = 5 ;condicion_ventas = 6 ; tasas = 9)

	if ($_POST['guardar_form']==1) { // usuario
		$codUser = $_POST['codUser'];
		$usuario = $_POST['usuario'];
		$emailUser = $_POST['email_user'];
		$password = $_POST['clave_usuario'];

	 	$query = "insert into usuarios(cod_user,usuario,email_user,password) values ('$codUser','$usuario','$emailUser','$password')";
		$resultado = $conn->prepare($query);

		try {
			$resultado->execute();
			$mensaje='Registro guardado correctamente!';
			$tipo_mensaje="success";
			} catch (Exception $e) {
			//die("Errorx: " . $e->getMessage() );
			$error = "Error: " . $e->getMessage() ;
			$mensaje='Problemas al guardar :<br>'.$error;
			$tipo_mensaje="danger";
		}

	  $_SESSION['message'] = $mensaje;
	  $_SESSION['message_type'] = $tipo_mensaje;
	  echo "<script>window.location.replace('https://localhost/AplicacionLakePlaza/registro_datos_maestros.php?maestro=usuarios ')</script>";

	}

	if ($_POST['guardar_form']==4) { // Producto
		$codProd = $_POST['cod_prod'];
		$nomProd = $_POST['nom_prod'];
		$estProd = $_POST['estado_producto'];
		$usuario = $_POST['cod_user'];

	 	$query = "insert into productos(cod_prod,nombre,estado,usuario) values ('$codProd','$nomProd','$estProd','$usuario')";
		$resultado = $conn->prepare($query);

		try {
			$resultado->execute();
			$mensaje='Producto guardado correctamente!';
			$tipo_mensaje="success";
			} catch (Exception $e) {
			//die("Errorx: " . $e->getMessage() );
			$error = "Error: " . $e->getMessage() ;
			$mensaje='Problemas al guardar :<br>'.$error;
			$tipo_mensaje="danger";
		}

	  $_SESSION['message'] = $mensaje;
	  $_SESSION['message_type'] = $tipo_mensaje;
	  echo "<script>window.location.replace('https://localhost/AplicacionLakePlaza/registro_datos_maestros.php?maestro=producto ')</script>";

	}

	if ($_POST['guardar_form']==7) { // Operativo
		$codOper = $_POST['cod_operativo'];
		$nomOper = $_POST['nom_operativo'];
		$estatus = $_POST['estatus_operativo'];
		$usuario = $_POST['cod_user'];

	 	$query = "insert into operativos(cod_oper,nombre_oper,estatus,usuario) values ('$codOper','$nomOper', '$estatus','$usuario')";
		$resultado = $conn->prepare($query);

		try {
			$resultado->execute();
			$mensaje='Operativo guardado correctamente!';
			$tipo_mensaje="success";
			} catch (Exception $e) {
			$error = "Error: " . $e->getMessage() ;
			$mensaje='Problemas al guardarx :<br>'.$error;
			$tipo_mensaje="danger";
		}

	  $_SESSION['message'] = $mensaje;
	  $_SESSION['message_type'] = $tipo_mensaje;
	  echo "<script>window.location.replace('https://localhost/AplicacionLakePlaza/registro_datos_maestros.php?maestro=operativo ')</script>";

	}

	if ($_POST['guardar_form']==5) { // Programas ventas
		$codProg = $_POST['cod_prog_vta'];
		$nombreProg = $_POST['nom_prog_vta'];
		$estProg = $_POST['estado_programa'];

	 	$query = "insert into prog_ventas(cod_prog,nombre_prog,estatus) values ('$codProg','$nombreProg','$estProg')";
		$resultado = $conn->prepare($query);

		try {
			$resultado->execute();
			$mensaje='Programa guardado correctamente!';
			$tipo_mensaje="success";
			} catch (Exception $e) {
			//die("Errorx: " . $e->getMessage() );
			$error = "Error: " . $e->getMessage() ;
			$mensaje='Problemas al guardar :<br>'.$error;
			$tipo_mensaje="danger";
		}

	  $_SESSION['message'] = $mensaje;
	  $_SESSION['message_type'] = $tipo_mensaje;
	  echo "<script>window.location.replace('http://localhost/AplicacionLakePlaza/registro_datos_maestros.php?maestro=prog_vtas')</script>";

	}

		if ($_POST['guardar_form']==6) { // Condiciones de Ventas
			$cod_cond = $_POST['cod_cond_vta'];
			$producto = $_POST['cod_prod_vta'];
			$operativo = $_POST['cod_oper_vta'];
			$puntos_ini = $_POST['ptos_ini_vta'];
			$puntos_fin = $_POST['ptos_fin_vta'];
			$monto_pto = $_POST['precio_pto_vta'];
			$mto_pto_comici = $_POST['precio_pto_com'];
			$moneda = $_POST['moneda_condic'];
			$cuotas = $_POST['cuot_max_vta'];
			$tasa = $_POST['tip_interes'];
			$descto_maximo = $_POST['%_desc_vta'];
			$monto_gasto_admin = $_POST['gastos_admin'];
			$usuario = $_POST['cod_user'];

	 	$query = "insert into condiciones_ventas(cod_cond,producto,operativo,puntos_ini,puntos_fin,monto_pto,mto_pto_comici,moneda,cuotas,tasa,descto_maximo,monto_gasto_admin,usuario) 
	 		values ('$cod_cond','$producto','$operativo','$puntos_ini','$puntos_fin','$monto_pto','$mto_pto_comici','$moneda','$cuotas','$tasa','$descto_maximo','$monto_gasto_admin','$usuario')";
		$resultado = $conn->prepare($query);

		try {
			$resultado->execute();
			$mensaje='Condicion de ventas guardada correctamente!';
			$tipo_mensaje="success";
			} catch (Exception $e) {
			//die("Errorx: " . $e->getMessage() );
			$error = "Error: " . $e->getMessage() ;
			$mensaje='Problemas al guardar :<br>'.$error;
			$tipo_mensaje="danger";
		}

	  $_SESSION['message'] = $mensaje;
	  $_SESSION['message_type'] = $tipo_mensaje;
	  echo "<script>window.location.replace('https://localhost/AplicacionLakePlaza/registro_datos_maestros.php?maestro=condiciones_ventas ')</script>";

	}

	if ($_POST['guardar_form']==2) { // afiliado natural.
		$cod_afil_natu = $_POST['cod_afil_natu'];
		$nom_afil_natu = $_POST['nom_afil_natu'];
		$ape_afil_natu = $_POST['ape_afil_natu'];
		$fch_nat = $_POST['fch_nat'];
		$sexo_afil_natu = $_POST['sexo_afil_natu'];
		$pais_orig_afil_natu = $_POST['pais_orig_afil_natu'];
		$direccion_afil_natu = $_POST['direccion_afil_natu'];
		$cod_ciudad = $_POST['cod_ciudad'];
		$telefonos = $_POST['telefonos'];
		$email_afil_natu = $_POST['email_afil_natu'];
		$user_reg = $_POST['cod_user'];

	 	$query = "insert into afiliados_natu(cod_afil_natu,nombre_afil_natu,apellido_afil_natu,fch_nac,sexo,pais_orig,direccion_afil_natu,cod_ciudad,telefonos,email_afil_natu,usuario) values ('$cod_afil_natu','$nom_afil_natu','$ape_afil_natu','$fch_nat','$sexo_afil_natu','$pais_orig_afil_natu','$direccion_afil_natu','$cod_ciudad',
		'$telefonos','$email_afil_natu','$user_reg')";
		$resultado = $conn->prepare($query);

		try {
			$resultado->execute();
			$mensaje='Registro guardado correctamente!';
			$tipo_mensaje="success";
			} catch (Exception $e) {
			//die("Errorx: " . $e->getMessage() );
			$error = "Error: " . $e->getMessage() ;
			$mensaje='Problemas al guardar :<br>'.$error;
			$tipo_mensaje="danger";
		}

	  $_SESSION['message'] = $mensaje;
	  $_SESSION['message_type'] = $tipo_mensaje;
	  echo "<script>window.location.replace('https://localhost/AplicacionLakePlaza/registro_datos_maestros.php?maestro=afilnat ')</script>";

	}

		if ($_POST['guardar_form']==3) { // afiliado juridico.
			$cod_afil_jur = $_POST['cod_afil_jurid'];
			$nombre_afil_jur = $_POST['nom_afil_jurid'];
			$fch_registro = $_POST['fch_reg'] ;
			$registro = $_POST['registro_jurid'];
			$tomo_reg = $_POST['tomo_reg'];
			$direccion_afil_jur = $_POST['direccion_afil_jurid'];
			$telefono_afil_jur = $_POST['telefonos'];
			$email_afil_jur = $_POST['email_afil_jurid'];
			$nombre_rep_afil_jur = $_POST['nom_representante'];
			$cedula_rep_afil_jur = $_POST['ced_representante'];

	 	$query = "insert into afiliados_jurid(cod_afil_jur,nombre_afil_jur,fch_registro,registro,tomo_reg,direccion_afil_jur,telefono_afil_jur,email_afil_jur,nombre_rep_afil_jur,cedula_rep_afil_jur) values (
	 		'$cod_afil_jur',
			'$nombre_afil_jur',
			'$fch_registro',
			'$registro',
			'$tomo_reg',
			'$direccion_afil_jur',
			'$telefono_afil_jur',
			'$email_afil_jur',
			'$nombre_rep_afil_jur',
			'$cedula_rep_afil_jur')";
		$resultado = $conn->prepare($query);

		try {
			$resultado->execute();
			$mensaje='Registro guardado correctamente!';
			$tipo_mensaje="success";
			} catch (Exception $e) {
			//die("Errorx: " . $e->getMessage() );
			$error = "Error: " . $e->getMessage() ;
			$mensaje='Problemas al guardar :<br>'.$error;
			$tipo_mensaje="danger";
		}

	  $_SESSION['message'] = $mensaje;
	  $_SESSION['message_type'] = $tipo_mensaje;
	  echo "<script>window.location.replace('https://localhost/AplicacionLakePlaza/registro_datos_maestros.php?maestro=afiljur ')</script>";

	}

	if ($_POST['guardar_form']==9) { // Tasas
			$idTasa = $_POST['id'];
			$monedaBase = $_POST['moneda_base'];
			$valorMBase = $_POST['valor_m_base'];
			$operadorCambio = $_POST['operador_cambio'];
			$monedaAlterna = $_POST['moneda_alterna'];
			$valorMAlterna = $_POST['valor_m_alterna'];
			$fechaTasa = $_POST['fecha_tasa'];
	 	$query = "insert into tasas(moneda_base,valor_m_base,operador_cambio,moneda_alterna,valor_m_alterna,fecha_tasa) 
	 		values ('$monedaBase','$valorMBase','$operadorCambio','$monedaAlterna','$valorMAlterna','$fechaTasa')";
		$resultado = $conn->prepare($query);

		try {
			$resultado->execute();
			$mensaje='Tasa guardada correctamente!';
			$tipo_mensaje="success";
			} catch (Exception $e) {
			//die("Errorx: " . $e->getMessage() );
			$error = "Error: " . $e->getMessage() ;
			$mensaje='Problemas al guardar :<br>'.$error;
			$tipo_mensaje="danger";
		}

	  $_SESSION['message'] = $mensaje;
	  $_SESSION['message_type'] = $tipo_mensaje;
	  echo "<script>window.location.replace('https://localhost/AplicacionLakePlaza/registro_datos_maestros.php?maestro=tasa ')</script>";

	}

		if ($_POST['guardar_form']==8) { // contratos
			$contrato = strtoupper($_POST['contrato']);
			$fch_venta = $_POST['fch_venta'];
			$moneda_condic = $_POST['moneda_condic_cont']; 
			$tasa = $_POST['tasa'];
			$cod_prod_vta = $_POST['cod_prod_cont'];
			$cod_oper_vta = $_POST['cod_oper_cont'];
			$sucursal = $_POST['sucursal'];
			$cod_prog_vta = $_POST['cod_prog_cont'];
			$ced_titular1 = $_POST['ced_titular1']; 
			$ced_titular2 = $_POST['ced_titular2'];
			$tot_puntos = $_POST['tot_puntos'];
			$val_pto = $_POST['val_pto'];
			$pto_comici = $_POST['pto_comici'];
			$descuento = $_POST['descuento_%'];
			$monto_desc = $_POST['monto_desc'];
			$val_contrato = $_POST['val_contrato'];
			$mtto_anio1 = $_POST['mtto_anio1'];
			$gastos_admin = $_POST['gastos_admin'];
			$miscelaneos = $_POST['miscelaneos'];
			$val_total = $_POST['val_total'];
			$ini_mesa = $_POST['ini_mesa'];
			$ini_diferida = $_POST['ini_diferida'];
			$cap_especial = $_POST['cap_especial'];
			$cap_normal = $_POST['cap_normal'];
			$val_contrato_finan = $_POST['val_contrato_finan'];
			$observaciones = $_POST['observaciones'];

	 		$query = "insert into contratos(
	 		contrato,emision,moneda,tasa,cod_prod_cont,
	 		cod_prog_cont,cod_oper_cont,doc_suc_cont,
	 		titular1,titular2,tot_ptos_cont,val_pto_cont,
	 		val_pto_comis_cont,porcent_desc_cont,monto_desc_cont,
	 		valor_contrato,mtto_anio1,gast_adm_cont,miscelaneos_cont,
	 		valot_total_cont,inicial_mesa,inicial_diferida,Capital_espec,
				capital_normal,valor_contrato_dist,observaciones) values (
				'$contrato',
				'$fch_venta',
				'$moneda_condic',
				$tasa,
				'$cod_prod_vta',
				'$cod_prog_vta',
				'$cod_oper_vta',			
				'$sucursal',
				'$ced_titular1',
				'$ced_titular2',
				$tot_puntos,
				$val_pto,
				$pto_comici,
				$descuento,
				$monto_desc,
				$val_contrato,
				$mtto_anio1,
				$gastos_admin,
				$miscelaneos,
				$val_total,
				$ini_mesa,
				$ini_diferida,
				$cap_especial,
				$cap_normal,				
				$val_contrato_finan,
				'$observaciones')";
		$resultado = $conn->prepare($query);

		try {
			$resultado->execute();
			$mensaje='Registro guardado correctamente!';
			$tipo_mensaje="success";
			} catch (Exception $e) {
			$error = "Error: " . $e->getMessage() ;
			$mensaje='Problemas al guardar :<br>'.$error;
			$tipo_mensaje="danger";
		}

	  $_SESSION['message'] = $mensaje;
	  $_SESSION['message_type'] = $tipo_mensaje;
	  echo "<script>window.location.replace('https://localhost/AplicacionLakePlaza/index.php ')</script>";

	}

 ?>