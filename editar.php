<?php
	include("sesion.php");
	include("db.php");
	include('Scripts/consultas_varias.php');
	$ocultar = 'hidden';

	// Geters para recuperar datos a actualizar

	// Usuarios

	if (isset($_GET['id_user'])) {
		$id = $_GET['id_user'];
		$query = "Select * from usuarios where id_user = $id";
		$resultado = $conn->prepare($query);
		$cuantos=$resultado->execute();
		if ($cuantos == 1) {
			$row = $resultado->fetch(PDO::FETCH_ASSOC);
			$codUser = $row['cod_user'];
			$usuario = $row['usuario'];
			$email = $row['email_user'];

		}
	}

	if (isset($_POST['update_user'])) {

		$id = $_GET['id_user'];
		$usuario = $_POST['usuario'];
		$email = $_POST['email_user'];
		$password = $_POST['clave_usuario'];

		$query = "Update usuarios set usuario='$usuario', email_user='$email', password='$password' where id_user='$id' ";
		$resultado = $conn->prepare($query);
		$cuantos=$resultado->execute();

		if ($cuantos<1) {
			die("Accion de editar fallida! ".$cuantos);
		}
		$_SESSION['message'] = "Registro actualizado correctamente.";
		$_SESSION['message_type'] = 'success';
		header('location:registro_datos_maestros.php?maestro=usuarios');

	}
		
	// Productos
	if (isset($_GET['id_prod'])) {
		$id = $_GET['id_prod'];
		$query = "Select * from productos where id_prod = $id";
		$resultado = $conn->prepare($query);
		$cuantos=$resultado->execute();
		if ($cuantos == 1) {
			$row = $resultado->fetch(PDO::FETCH_ASSOC);
			$codProd = $row['cod_prod'];
			$nombre = $row['nombre'];
			$estado = $row['estado'];
		}
	}

	if (isset($_POST['update_prod'])) {
		$id = $_GET['id_prod'];
		$nombre = $_POST['nombre'];
		$estado = $_POST['estado'];
		$query = "Update productos set nombre='$nombre', estado='$estado' where id_prod='$id' ";
		$resultado = $conn->prepare($query);
		$cuantos=$resultado->execute();

		if ($cuantos<1) {
			die("Accion de editar fallida! ".$cuantos);
		}
		$_SESSION['message'] = "Registro actualizado correctamente.";
		$_SESSION['message_type'] = 'success';


		header('location:registro_datos_maestros.php?maestro=producto');
		//echo "<script>window.location.replace('http://localhost/AplicacionLakePlaza/index.php')</script>";
	}

	// Programas
	if (isset($_GET['id_prog'])) {
		$id = $_GET['id_prog'];
		$query = "Select * from prog_ventas where id_prog = $id";
		$resultado = $conn->prepare($query);
		$cuantos=$resultado->execute();
		if ($cuantos == 1) {
			$row = $resultado->fetch(PDO::FETCH_ASSOC);
			$codProg = $row['cod_prog'];
			$nombre_prog = $row['nombre_prog'];
			$estatus = $row['estatus'];
		}
	}

	if (isset($_POST['update_prog'])) {
		$id = $_GET['id_prog'];
		$nombre_prog = $_POST['nom_prog_vta'];
		$estatus = $_POST['estado_programa'];
		$query = "Update prog_ventas set nombre_prog='$nombre_prog', estatus='$estatus' where id_prog='$id' ";
		$resultado = $conn->prepare($query);
		$cuantos=$resultado->execute();

		if ($cuantos<1) {
			die("Accion de editar fallida! ".$cuantos);
		}
		$_SESSION['message'] = "Registro actualizado correctamente.";
		$_SESSION['message_type'] = 'success';
		header('location:registro_datos_maestros.php?maestro=prog_vtas');
		//echo "<script>window.location.replace('http://localhost/AplicacionLakePlaza/index.php')</script>";
	}

	// Afiliados Naturales
	if (isset($_GET['id_afil_natu'])) {
		$id = $_GET['id_afil_natu'];
		$query = "Select * from afiliados_natu where id_afil_natu = $id";
		$resultado = $conn->prepare($query);
		$cuantos=$resultado->execute();
		if ($cuantos == 1) {
			$row = $resultado->fetch(PDO::FETCH_ASSOC);
			$cod_afil_natu = $row['cod_afil_natu'];
			$nom_afil_natu = $row['nombre_afil_natu'];
			$ape_afil_natu = $row['apellido_afil_natu'];
			$fch_nac = $row['fch_nac'];
			$sexo_afil_natu = $row['sexo'];
			$pais_orig_afil_natu = $row['pais_orig'];
			$direccion_afil_natu = $row['direccion_afil_natu'];
			$cod_ciudad = $row['cod_ciudad'];
			$telefonos = $row['telefonos'];
			$email_afil_natu = $row['email_afil_natu'];
			$user_reg = $row['cod_user'];
		}
	}

	if (isset($_POST['update_afilnatu'])) {
		print_r($_POST);
		$id = $_GET['id_afil_natu'];
			$cod_afil_natu = $_POST['cod_afil_natu'];
			$nombre_afil_natu = $_POST['nombre_afil_natu'];
			$apellido_afil_natu = $_POST['apellido_afil_natu'];
			$fch_nac = $_POST['fch_nac'];
			$sexo = $_POST['sexo'];
			$pais_orig = $_POST['pais_orig_afil_natu'];
			$direccion_afil_natu = $_POST['direccion_afil_natu'];
			$cod_ciudad = $_POST['cod_ciudad'];
			$telefonos = $_POST['telefonos'];
			$email_afil_natu = $_POST['email_afil_natu'];

		$query = "Update afiliados_natu set cod_afil_natu='$cod_afil_natu', 
		nombre_afil_natu='$nombre_afil_natu',
		apellido_afil_natu='$apellido_afil_natu',
		fch_nac = '$fch_nac',
		sexo = '$sexo',
		pais_orig = '$pais_orig' ,
		direccion_afil_natu = '$direccion_afil_natu',
		cod_ciudad ='$cod_ciudad' ,
		telefonos = '$telefonos',
		email_afil_natu = '$email_afil_natu'
		where id_afil_natu='$id' ";
		$resultado = $conn->prepare($query);
		$cuantos=$resultado->execute();

		if ($cuantos<1) {
			die("Accion de editar fallida! ".$cuantos);
		}
		$_SESSION['message'] = "Registro actualizado correctamente.";
		$_SESSION['message_type'] = 'success';
		header('location:registro_datos_maestros.php?maestro=afilnat');
		//echo "<script>window.location.replace('http://localhost/AplicacionLakePlaza/index.php')</script>";
	}

	// Afiliados Juridicos
	if (isset($_GET['id_afil_jur'])) {
		$id = $_GET['id_afil_jur'];
		$query = "Select * from afiliados_jurid where id_afil_jur = $id";
		$resultado = $conn->prepare($query);
		$cuantos=$resultado->execute();
		if ($cuantos == 1) {
			$row = $resultado->fetch(PDO::FETCH_ASSOC);
			$cod_afil_jur = $row['cod_afil_jur'];
			$nombre_afil_jur = $row['nombre_afil_jur'];
			$fch_registro = $row['fch_registro'] ;
			$registro = $row['registro'];
			$tomo_reg = $row['tomo_reg'];
			$direccion_afil_jur = $row['direccion_afil_jur'];
			$telefono_afil_jur = $row['telefono_afil_jur'];
			$email_afil_jur = $row['email_afil_jur'];
			$nombre_rep_afil_jur = $row['nombre_rep_afil_jur'];
			$cedula_rep_afil_jur = $row['cedula_rep_afil_jur'];
		}
	}

	if (isset($_POST['update_afiljuri'])) {
			$id = $_GET['id_afil_jur'];
			$cod_afil_jur = $_POST['cod_afil_jur'];
			$nombre_afil_jur = $_POST['nombre_afil_jur'];
			$fch_registro = $_POST['fch_registro'] ;
			$registro = $_POST['registro'];
			$tomo_reg = $_POST['tomo_reg'];
			$direccion_afil_jur = $_POST['direccion_afil_jur'];
			$telefono_afil_jur = $_POST['telefono_afil_jur'];
			$email_afil_jur = $_POST['email_afil_jur'];
			$nombre_rep_afil_jur = $_POST['nombre_rep_afil_jur'];
			$cedula_rep_afil_jur = $_POST['cedula_rep_afil_jur'];

		$query = "Update afiliados_jurid set 
			cod_afil_jur = '$cod_afil_jur',
			nombre_afil_jur = '$nombre_afil_jur',
			fch_registro = '$fch_registro',
			registro = '$registro',
			tomo_reg = '$tomo_reg',
			direccion_afil_jur = '$direccion_afil_jur',
			telefono_afil_jur = '$telefono_afil_jur',
			email_afil_jur = '$email_afil_jur',
			nombre_rep_afil_jur = '$nombre_rep_afil_jur',
			cedula_rep_afil_jur = '$cedula_rep_afil_jur'
		where id_afil_jur='$id' ";
		$resultado = $conn->prepare($query);
		$cuantos=$resultado->execute();

		if ($cuantos<1) {
			die("Accion de editar fallida! ".$cuantos);
		}
		$_SESSION['message'] = "Registro actualizado correctamente.";
		$_SESSION['message_type'] = 'success';
		header('location:registro_datos_maestros.php?maestro=afiljur');

	}

	// Condiciones de Ventas
	if (isset($_GET['id_cond'])) {
		$id = $_GET['id_cond'];
		$query = "Select * from condiciones_ventas where id_cond = $id";
		$resultado = $conn->prepare($query);
		$cuantos=$resultado->execute();
		if ($cuantos == 1) {
			$row = $resultado->fetch(PDO::FETCH_ASSOC);
			$cod_cond = $row['cod_cond'];
			$producto = $row['producto'];
			$operativo = $row['operativo'];
			$puntos_ini = $row['puntos_ini'];
			$puntos_fin = $row['puntos_fin'];
			$monto_pto = $row['monto_pto'];
			$mto_pto_comici = $row['mto_pto_comici'];
			$moneda = $row['moneda'];
			$cuotas = $row['cuotas'];
			$tasa = $row['tasa'];
			$descto_maximo = $row['descto_maximo'];
			$monto_gasto_admin = $row['monto_gasto_admin'];
			$usuario = $row['usuario'];
		}
	}

	if (isset($_POST['update_condic'])) {
		$id = $_GET['id_cond'];
		$cod_cond = $_POST['cod_cond_vta'];
		$producto = $_POST['cod_prod_vta'];
		$operativo = $_POST['cod_oper_vta'];
		$puntos_ini = $_POST['ptos_ini_vta']; 
		$puntos_fin = $_POST['ptos_fin_vta']; 
		$monto_pto = $_POST['precio_pto_vta']; 
		$mto_pto_comici = $_POST['precio_pto_com']; 
		$moneda = $_POST['moneda_condic']; 
		$cuotas = $_POST['cuot_max_vta']; 
		$monto_gasto_admin = $_POST['gastos_admin']; 
		$tasa = $_POST['tip_inter_vta']; 
		$descto_maximo = $_POST['%_desc_vta'];
		$query = "Update condiciones_ventas set cod_cond='$cod_cond',producto='$producto',operativo= '$operativo',puntos_ini='$puntos_ini',puntos_fin= '$puntos_fin',monto_pto= '$monto_pto',mto_pto_comici= '$mto_pto_comici',moneda= '$moneda',cuotas= '$cuotas',tasa= '$tasa',descto_maximo= '$descto_maximo',monto_gasto_admin= '$monto_gasto_admin',usuario= '$usuario' where id_cond='$id' ";
		$resultado = $conn->prepare($query);
		$cuantos=$resultado->execute();

		if ($cuantos<1) {
			die("Accion de editar fallida! ".$cuantos);
		}
		$_SESSION['message'] = "Registro actualizado correctamente.";
		$_SESSION['message_type'] = 'success';
		header('location:registro_datos_maestros.php?maestro=condiciones_ventas');
		//echo "<script>window.location.replace('http://localhost/AplicacionLakePlaza/index.php')</script>";
	}

?>

<?php include("includes/header.php") ?>
<div class="container p-4 ">
	<div class="row">
		<div class="col-6 mx-auto justify-content-center ">
			<div class="card border-success " >

				<!-- Form Edit usuarios -->
				
				<div <?php 	if (!isset($_GET['id_user'])) { echo $ocultar ; } ?> >
					<div class="card-header bg-transparent text-primary border-success text-center">EDITAR USUARIO
					</div>
					<div class="card card-body">
						<form action="editar.php?id_user=<?php echo $_GET['id_user'];?>" method="POST">
							<div class="form-outline mb-3 col-10">
								<label for="usuario" class="form-label">Usuario:</label>
								<input type="text" name="usuario" value="<?php echo $usuario ;?>" class="form-control" placeholder="Actualiza usuario" autofocus>
							</div>
							<div class="form-outline mb-3 col-10">
								<label for="email_user" class="form-label">Correo:</label>
								<input type="email" name="email_user" class="form-control" value="<?php echo $email; ?>" placeholder="Actualiza el correo">
							</div>
							<div class="form-outline mb-3 col-10">
								<label for="clave_usuario" class="form-label">Contraseña:</label>
								<input type="password" name="clave_usuario" value="<?php echo $password ;?>" class="form-control" placeholder="Nueva clave" >
							</div>
							<div class="card-footer bg-transparent border-success text-center">
								<button type="submit" class="btn btn-success" name="update_user"><i class="fa-solid fa-save"></i> Actualizar</button>
				  		</div>
						</form>
					</div>
				</div>

				<!-- Form Edit producto -->

				<div <?php if (!isset($_GET['id_prod'])) { echo $ocultar ; } ?> >
					<div class="card-header bg-transparent text-primary border-success text-center">EDITAR PRODUCTO</div>
			  	<div class="card-body text-success">
						<form action="editar.php?id_prod=<?php echo $_GET['id_prod'];?>" method="POST">
							<div class="form-outline mb-3 col-10">
								<label for="nombre" class="form-label">Nombre del Producto:</label>
								<input type="text" name="nombre" value="<?php echo $nombre ;?>" class="form-control" placeholder="Actualiza producto" autofocus>
							</div>
							<div class="form-outline mb-3 col-md-5 ">
						    <label for="estado_producto" class="form-label">Estado</label>
						    <select class="form-select" id="estado" name="estado" >
						    	<?php if ($estado == 1) { ?>
											<option selected value="1">Activo</option>
											<option value="0">Inactivo</option>
							    <?php }else{ ?>
											<option  value="1">Activo</option>
											<option selected value="0">Inactivo</option>					    	
									<?php } ?>
						    </select>
							</div>							
				  		<div class="card-footer bg-transparent border-success text-center">
								<button type="submit" class="btn btn-success" name="update_prod"><i class="fa-solid fa-save"></i> Actualizar</button>
				  		</div>
		  			</form>
		  		</div>
				</div> <!--Fin form Edit producto -->

				<!-- Form Edit programas ventas -->

				<div <?php if (!isset($_GET['id_prog'])) { echo $ocultar ; } ?> >
					<div class="card-header bg-transparent text-primary border-success text-center">EDITAR PROGRAMA</div>
			  	<div class="card-body text-success">
						<form action="editar.php?id_prog=<?php echo $_GET['id_prog'];?>" method="POST">
							<div class="form-outline mb-3 col-10">
								<label for="nom_prog_vta" class="form-label">Nombre del Programa:</label>
								<input type="text" name="nom_prog_vta" value="<?php echo $nombre_prog ;?>" class="form-control" placeholder="Actualiza programa" autofocus>
							</div>
							<div class="form-outline mb-3 col-md-5 ">
						    <label for="estado_programa" class="form-label">Estatus</label>
						    <select class="form-select" id="estado_programa" name="estado_programa" >
						    	<?php if ($estatus == 1) { ?>
											<option selected value="1">Activo</option>
											<option value="0">Inactivo</option>
							    <?php }else{ ?>
											<option  value="1">Activo</option>
											<option selected value="0">Inactivo</option>					    	
									<?php } ?>
						    </select>
							</div>							
				  		<div class="card-footer bg-transparent border-success text-center">
								<button type="submit" class="btn btn-success" name="update_prog"><i class="fa-solid fa-save"></i> Actualizar</button>
				  		</div>
		  			</form>
		  		</div>
				</div> <!--Fin form Edit producto -->

				<!-- Form Edit afiliados naturales -->

				<div <?php if (!isset($_GET['id_afil_natu'])) { echo $ocultar ; } ?> >
					<div class="card-header bg-transparent text-primary border-success text-center">EDITAR DATOS DEL AFILIADO</div>
			  	<div class="card-body text-success">
						<form action="editar.php?id_afil_natu=<?php echo $_GET['id_afil_natu'];?>" method="POST">
							<div class="form-outline mb-3 col-10">
								<label for="cod_afil_natu" class="form-label">Código:</label>
								<input type="text" name="cod_afil_natu" value="<?php echo $cod_afil_natu ;?>" class="form-control" placeholder="código o cédula" autofocus>
							</div>

							<div class="form-outline mb-3 col-10">
								<label for="nom_afil_natu" class="form-label">Nombre:</label>
								<input type="text" name="nombre_afil_natu" value="<?php echo $nom_afil_natu ;?>" class="form-control" >
							</div>

							<div class="form-outline mb-3 col-10">
								<label for="ape_afil_natu" class="form-label">Apellido:</label>
								<input type="text" name="apellido_afil_natu" value="<?php echo $ape_afil_natu ;?>" class="form-control" >
							</div>

							<div class="form-outline mb-3 col-10">
								<label for="fch_nac" class="form-label">Fecha de Nacimiento:</label>
								<input type="date" name="fch_nac" value="<?php echo $fch_nac ;?>" class="form-control" >
							</div>

							<div class="form-outline mb-3 col-10">
								<label for="pais_orig_afil_natu" class="form-label">Pais de origen:</label>
								<input type="text" name="pais_orig_afil_natu" value="<?php echo $pais_orig_afil_natu ;?>" class="form-control" >
							</div>

							<div class="form-outline mb-3 col-10">
								<label for="direccion_afil_natu" class="form-label">Dirección de Habitación:</label>
								<input type="text" name="direccion_afil_natu" value="<?php echo $direccion_afil_natu ;?>" class="form-control"  >
							</div>

							<div class="form-outline mb-3 col-10">
								<label for="cod_ciudad" class="form-label">Ciudad:</label>
								<input type="text" name="cod_ciudad" value="<?php echo $cod_ciudad ;?>" class="form-control"  >
							</div>

							<div class="form-outline mb-3 col-10">
								<label for="telefonos" class="form-label">Telefono:</label>
								<input type="text" name="telefonos" value="<?php echo $telefonos ;?>" class="form-control"  >
							</div>

							<div class="form-outline mb-3 col-md-5 ">
						    <label for="email_afil_natu" class="form-label">Email:</label>
								<input type="text" name="email_afil_natu" value="<?php echo $email_afil_natu ;?>" class="form-control" placeholder="email@tudominio.com" >
							</div>							
				  		<div class="card-footer bg-transparent border-success text-center">
								<button type="submit" class="btn btn-success" name="update_afilnatu"><i class="fa-solid fa-save"></i> Actualizar</button>
				  		</div>
		  			</form>
		  		</div>
				</div> <!--Fin form Edit afiliados naturales -->

				<!-- Form Edit afiliados juridicos -->

				<div <?php if (!isset($_GET['id_afil_jur'])) { echo $ocultar ; } ?> >
					<div class="card-header bg-transparent text-primary border-success text-center">EDITAR DATOS DEL JURÍDICO</div>
			  	<div class="card-body text-success">
						<form action="editar.php?id_afil_jur=<?php echo $_GET['id_afil_jur'];?>" method="POST">
							<div class="form-outline mb-3 col-10">
								<label for="cod_afil_jur" class="form-label">Código:</label>
								<input type="text" name="cod_afil_jur" value="<?php echo $cod_afil_jur ;?>" class="form-control" placeholder="código o RIF" autofocus>
							</div>
							<div class="form-outline mb-3 col-10">
								<label for="nombre_afil_jur" class="form-label">Nombre:</label>
								<input type="text" name="nombre_afil_jur" value="<?php echo $nombre_afil_jur ;?>" class="form-control" >
							</div>
							<div class="form-outline mb-3 col-10">
								<label for="fch_registro" class="form-label">Fecha de Registro:</label>
								<input type="date" name="fch_registro" value="<?php echo $fch_registro ;?>" class="form-control" >
							</div>
							<div class="form-outline mb-3 col-10">
								<label for="registro" class="form-label">Registro:</label>
								<input type="text" name="registro" value="<?php echo $registro ;?>" class="form-control" >
							</div>
							<div class="form-outline mb-3 col-10">
								<label for="tomo_reg" class="form-label">Tomo Registro:</label>
								<input type="text" name="tomo_reg" value="<?php echo $tomo_reg ;?>" class="form-control" >
							</div>

							<div class="form-outline mb-3 col-10">
								<label for="direccion_afil_jur" class="form-label">Dirección Jurídica:</label>
								<input type="text" name="direccion_afil_jur" value="<?php echo $direccion_afil_jur ;?>" class="form-control"  >
							</div>
							<div class="form-outline mb-3 col-10">
								<label for="telefono_afil_jur" class="form-label">Telefono:</label>
								<input type="text" name="telefono_afil_jur" value="<?php echo $telefono_afil_jur ;?>" class="form-control"  >
							</div>

							<div class="form-outline mb-3 col-md-5 ">
						    <label for="email_afil_jur" class="form-label">Email:</label>
								<input type="text" name="email_afil_jur" value="<?php echo $email_afil_jur ;?>" class="form-control" placeholder="email@tudominio.com" >
							</div>
							<div class="form-outline mb-3 col-10">
								<label for="nombre_rep_afil_jur" class="form-label">Nombre Representante:</label>
								<input type="text" name="nombre_rep_afil_jur" value="<?php echo $nombre_rep_afil_jur ;?>" class="form-control" >
							</div>
							<div class="form-outline mb-3 col-10">
								<label for="cedula_rep_afil_jur" class="form-label">Cédula Representante:</label>
								<input type="text" name="cedula_rep_afil_jur" value="<?php echo $cedula_rep_afil_jur ;?>" class="form-control" >
							</div>	
							<div class="card-footer bg-transparent border-success text-center">
								<button type="submit" class="btn btn-success" name="update_afiljuri"><i class="fa-solid fa-save"></i> Actualizar</button>
				  		</div>
		  			</form>
		  		</div>
				</div> <!--Fin form Edit afiliado juridico -->

				<!-- Form Edit condiciones de ventas -->

				<div <?php if (!isset($_GET['id_cond'])) { echo $ocultar ; } ?> >
					<div class="card-header bg-transparent text-primary border-success text-center">EDITAR CONDICION DE VENTA</div>
			  	<div class="card-body text-success">
						<form action="editar.php?id_cond=<?php echo $_GET['id_cond'];?>" method="POST">
							<div class="form-outline mb-3 col-10">
								<label class="form-label " for="cod_cond_vta">Código Condic:</label>
								<input type="text" name="cod_cond_vta" class="form-control " value="<?php echo $cod_cond ; ?>">							
							</div>
							<div class="form-outline mb-3 col-10">
								<?php 
									$label = '<label class="form-label " for="cod_prod_vta">Producto:</label>';
									$name = 'cod_prod_vta';
									$campos=array('cod_prod','nombre');
									echo cargar_selects_update('productos', $campos, $label, $name , $conn); 
								?>							
							</div>
							<div class="form-outline mb-3 col-10">
								<?php 
									$label = '<label class="form-label " for="cod_oper_vta">Operativo:</label>';
									$name = 'cod_oper_vta';
									$campos=array('cod_oper','nombre_oper');
									$camp_cond="cod_oper";
									echo cargar_selects_update('operativos', $campos, $label, $name , $conn); 
								?>							
							</div>
							<div class="input-group  col-md-3 mb-sm-3 ">
							  <span class="input-group-text">Ptos. Desde:</span>
							  <input name="ptos_ini_vta" type="text" class="form-control" value="<?php echo $puntos_ini; ?>" >
							</div>
							<div class="input-group  col-md-3 mb-sm-3 ">
							  <span class="input-group-text">Ptos. Hasta:</span>
							  <input name="ptos_fin_vta" type="text" class="form-control" value="<?php echo $puntos_fin; ?>" >
							</div>
							<div class="input-group  col-md-3 mb-sm-3 ">
							  <span class="input-group-text">Precio Pto:</span>
							  <input name="precio_pto_vta" type="text" class="form-control" value="<?php echo $monto_pto; ?>" >
							</div>
							<div class="input-group  col-md-3 mb-sm-3 ">
							  <span class="input-group-text">Precio Pto. Comic.:</span>
							  <input name="precio_pto_com" type="text" class="form-control" value="<?php echo $mto_pto_comici; ?>" >
							</div>
							<div class="input-group  col-md-3 mb-sm-3 ">
								<span class="form-label " >Moneda :</span>
								<select name="moneda_condic" id="moneda_condic">
									<option value="US$" selected>US$</option>
									<option value="BS.">Bs.</option>
								</select>
							</div>
							<div class="input-group  col-md-3 mb-sm-3 ">
							  <span class="input-group-text">Max. Cuotas:</span>
							  <input name="cuot_max_vta" type="text" class="form-control" value="<?php echo $cuotas; ?>" >
							</div>
							<div class="input-group  col-md-3 mb-sm-3 ">
							  <span class="input-group-text">Monto Gastos Admin.:</span>
							  <input name="gastos_admin" type="text" class="form-control" value="<?php echo $monto_gasto_admin; ?>" >
							</div>
							<div class="input-group  col-md-3 mb-sm-3 ">
							  <span class="input-group-text">Tipo de Interes:</span>
							  <input name="tip_inter_vta" type="text" class="form-control" value="<?php echo $tasa; ?>" >
							</div>
							<div class="input-group  col-md-3 mb-sm-3 ">
							  <span class="input-group-text">Desc. Máximo:</span>
							  <input name="%_desc_vta" type="text" class="form-control" value="<?php echo $descto_maximo; ?>" >
							</div>
				  		<div class="card-footer bg-transparent border-success text-center">
								<button type="submit" class="btn btn-success" name="update_condic"><i class="fa-solid fa-save"></i> Actualizar</button>
				  		</div>
		  			</form>
		  		</div>
				</div> <!--Fin form Edit condiciones de ventas -->
			</div>
		</div>
	</div>
</div>

