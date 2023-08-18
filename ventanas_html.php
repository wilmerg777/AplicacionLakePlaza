<?php 
	include('sesion.php');
	include('db.php');
	include('Scripts/consultas_varias.php');

	error_reporting(E_ERROR | E_WARNING | E_PARSE );
	$ocultar = 'd-none';

	// Accesos a botones de Editar y elimiar registros
	if (isset($_SESSION['autoridad'])) { 
		$nivel_autoridad = $_SESSION['autoridad'];
		if ($nivel_autoridad <>1) {
			$desactivar="disabled";
		} else {
			$desactivar="";
		}
	}
if (isset($_SESSION['message'])) { ?>
	<div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
		<?= $_SESSION['message']?>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
		</button>
	</div>
<?php unset($_SESSION['message']); 	 } ?>

<section id="section-modal">
	<?php include("modales/modalMaestros.php"); ?>
</section>
<!-- Maestro Productos -->
<div class="main container p-4  <?php if ($Tip_form_maestro<>'producto' ) { echo $ocultar ; } ?>">
	<div class="row">
		<div class="col-md-10">
					<table class="table table-bordered border-dark">
						<thead>
							<tr>
								<th>Código</th>
								<th>Producto</th>
								<th>Fecha de Registro</th>
								<th>Estado</th>
								<th>Acciones</th>
							</tr>
							<?php 	
								$query = "select * from productos order by 2";
								$productos = $conn->prepare($query);
								$productos->execute();
								while( $row = $productos->fetch(PDO::FETCH_ASSOC)) { ?>
									<tr>
										<td> <?php echo $row['cod_prod'] ?></td>
										<td> <?php echo $row['nombre'] ?></td>
										<td> <?php echo $row['fch_registro'] ?></td>
										<td> <?php echo $row['estado'] ?></td>
										<td>
											<a href="editar.php?id_prod=<?php echo $row['id_prod'] ?>" class="btn btn-secondary <?php echo $desactivar  ?>">
												<i class="fas fa-marker"></i>
											</a> 
											<a href="eliminar.php?id_prod=<?php echo $row['id_prod'] ?>" class="btn btn-danger <?php echo $desactivar  ?>" >
												<i class="fas fa-trash"></i>
											</a>
										</td>
									</tr>
								<?php } ?>
						</thead>
					</table>
			</div>
	</div>
</div> <!-- cierra div productos -->

 <!-- Maestro programas ventas -->
<div class="main container p-4  <?php if ($Tip_form_maestro<>'prog_vtas' ) { echo $ocultar ; } ?>">
	<div class="row">

		<div class="col-md-6">
					<table class="table table-bordered border-dark">
						<thead>
							<tr>
								<th>Código</th>
								<th>Programa</th>
								<th>Estado</th>
								<th>Acciones</th>
							</tr>
							<?php 	
								$query = "select * from prog_ventas order by 2";
								$programas = $conn->prepare($query);
								$programas->execute();
								while( $row = $programas->fetch(PDO::FETCH_ASSOC)) { ?>
									<tr>
										<td> <?php echo $row['cod_prog'] ?></td>
										<td> <?php echo $row['nombre_prog'] ?></td>
										<td> <?php echo $row['estatus'] ?></td>
										<td>
											<a href="editar.php?id_prog=<?php echo $row['id_prog'] ?>" class="btn btn-secondary <?php echo $desactivar  ?>">
												<i class="fas fa-marker"></i>
											</a> 
											<a href="eliminar.php?id_prog=<?php echo $row['id_prog'] ?>" class="btn btn-danger <?php echo $desactivar  ?>" >
												<i class="fas fa-trash"></i>
											</a>
										</td>
									</tr>
								<?php } ?>
						</thead>
					</table>
			</div>
	</div>
</div> <!-- cierra div programas ventas -->

 <!-- Maestro operativos -->
<div class="main container p-4  <?php if ($Tip_form_maestro<>'operativo' ) { echo $ocultar ; } ?>">
	<div class="row">

		<div class="col-md-6">
					<table class="table table-bordered border-dark">
						<thead>
							<tr>
								<th>Código</th>
								<th>Operativo</th>
								<th>Fecha de Inicio</th>
								<th>Fecha Fin</th>
								<th>Estatus</th>
								<th>Acciones</th>
							</tr>
							<?php 	
								$query = "select * from operativos order by 2";
								$operativos = $conn->prepare($query);
								$operativos->execute();
								while( $row = $operativos->fetch(PDO::FETCH_ASSOC)) { ?>
									<tr>
										<td> <?php echo $row['cod_oper'] ?></td>
										<td> <?php echo $row['nombre_oper'] ?></td>
										<td> <?php echo $row['fch_inicio'] ?></td>
										<td> <?php echo $row['fch_fin'] ?></td>
										<td> <?php echo $row['estatus'] ?></td>
										<td>
											<a href="editar.php?id_oper=<?php echo $row['id_oper'] ?>" class="btn btn-secondary <?php echo $desactivar  ?>">
												<i class="fas fa-marker"></i>
											</a> 
											<a href="eliminar.php?id_oper=<?php echo $row['id_oper'] ?>" class="btn btn-danger <?php echo $desactivar  ?>" >
												<i class="fas fa-trash"></i>
											</a>
										</td>
									</tr>
								<?php } ?>
						</thead>
					</table>
			</div>
	</div>
</div> <!-- cierra div operativos -->

  <!-- Maestro Usuarios -->
<div class="main container p-4 <?php if ($Tip_form_maestro<>'usuarios' ) { echo $ocultar ; } ?>">
	<div class="row">
		<div class="col-md-4">
			<div class="card card-body">
				<form action="guardardatos.php" method="POST" id="form_usuarios">
					<h3>Registro de Usuarios</h3><br>
					<input type="text" name="guardar_form" value="1" hidden>
          <div class="form-outline mb-4">
						<label class="form-label" for="codUser">Código del usuario:</label>
						<input type="text" name="codUser" class="form-control " placeholder="Numero de cedula preferiblemente" >
					</div>
          <div class="form-outline mb-4">
						<label class="form-label" for="usuario">Usuario:</label>
						<input type="text" name="usuario" class="form-control " placeholder="Nick de usuario" >
					</div>
          <div class="form-outline mb-4">
          	<label class="form-label" for="email_user">Correo Electrónico:</label>
						<input type="email" name="email_user" class="form-control"  placeholder="Escriba su correo electrónico" >
					</div>
					<div class="form-outline mb-4">
            <label class="form-label" for="clave_usuario">Password:</label>
            <input type="password" id="clave_usuario" name="clave_usuario" placeholder="Debe tener max. 10 caracteres." class="form-control" />
          </div>
					<button type="submit" class="btn btn-primary btn-lg " name="guardardatos" ><i class="fa-solid fa-save"></i> Guardar Datos</button>
				</form>
			</div>
		</div>
		<div class="col-md-8">
			<table class="table table-bordered border-dark">
				<thead>
					<tr>
						<th>Código</th>
						<th>Usuario</th>
						<th>CorreoE</th>
						<th>Fecha de Registro</th>
						<th>Acciones</th>
					</tr>
					<?php 	
						$query = "select * from usuarios";
						$usuarios = $conn->prepare($query);
						$usuarios->execute();
						while( $row = $usuarios->fetch(PDO::FETCH_ASSOC)) { ?>
							<tr>
								<td> <?php echo $row['cod_user'] ?></td>
								<td> <?php echo $row['usuario'] ?></td>
								<td> <?php echo $row['email_user'] ?></td>
								<td> <?php echo $row['fch_registro'] ?></td>
								<td>
									<a href="editar.php?id_user=<?php echo $row['id_user'] ?>" class="btn btn-secondary <?php echo $desactivar  ?>">
										<i class="fas fa-marker"></i>
									</a> 
									<a href="eliminar.php?id_user=<?php echo $row['id_user'] ?>" class="btn btn-danger <?php echo $desactivar  ?>">
										<i class="fas fa-trash-alt"></i>
									</a>
								</td>
							</tr>
						<?php } ?>
				</thead>
			</table>
		</div>
	</div>	
</div>  <!-- cierra div Usuarios -->

<!-- Maestro Afiliados Naturales -->
<div class="main container p-4  <?php if ($Tip_form_maestro<>'afilnat' ) { echo $ocultar ; } ?>">
	<div class="row">
		<div class="col-md-6">
					<table class="table table-bordered border-dark">
						<thead>
							<tr>
								<th>Código (cédula)</th>
								<th>Nombres y Apellidos</th>
								<th>Fecha de Nacimiento</th>
								<th>Sexo</th>
								<th>País de Origen</th>
								<th>Dirección de Habitación</th>
								<th>Cuidad</th>
								<th>Telefonos</th>
								<th>Email's</th>
								<th>Fch. Registro</th>
								<th>Acciones</th>
							</tr>
							<?php 	
								$query = "select * from afiliados_natu order by 3";
								$afilnatu = $conn->prepare($query);
								$afilnatu->execute();
								while( $row = $afilnatu->fetch(PDO::FETCH_ASSOC)) { ?>
									<tr>
										<td> <?php echo $row['cod_afil_natu'] ?></td>
										<td> <?php echo $row['nombre_afil_natu'].", ".$row['apellido_afil_natu'] ?></td>
										<td> <?php echo $row['fch_nac'] ?></td>
										<td> <?php echo $row['sexo'] ?></td>
										<td> <?php echo $row['pais_orig'] ?></td>
										<td> <?php echo $row['direccion_afil_natu'] ?></td>
										<td> <?php echo $row['cod_ciudad'] ?></td>
										<td> <?php echo $row['telefonos'] ?></td>
										<td> <?php echo $row['email_afil_natu'] ?></td>
										<td> <?php echo $row['actualizado'] ?></td>
										<td>
											<a href="editar.php?id_afil_natu=<?php echo $row['id_afil_natu'] ?>" class="btn btn-secondary <?php echo $desactivar  ?>">
												<i class="fas fa-marker"></i>
											</a> 
											<a href="eliminar.php?id_afil_natu=<?php echo $row['id_afil_natu'] ?>" class="btn btn-danger <?php echo $desactivar  ?>" >
												<i class="fas fa-trash"></i>
											</a>
										</td>
									</tr>
								<?php } ?>
						</thead>
					</table>
			</div>
	</div>
</div> <!-- cierra div Afiliados Naturales -->

<!-- Maestro Afiliados Juridicos -->
<div class="main container p-4  <?php if ($Tip_form_maestro<>'afiljur' ) { echo $ocultar ; } ?>">
	<div class="row">
		<div class="col-md-6">
			<table class="table table-bordered border-dark">
				<thead>
					<tr>
						<th>Código (RIF)</th>
						<th>Nombres Empresa</th>
						<th>Fecha de Registro</th>
						<th>Registro</th>
						<th>Tomo Registro</th>
						<th>Dirección Jurídica</th>
						<th>Telefonos</th>
						<th>Email's</th>
						<th>Nombres Representante</th>
						<th>Cédula Representante</th>
						<th>Acciones</th>
					</tr>
					<?php 	
						$query = "select * from afiliados_jurid order by 3";
						$afiljurid = $conn->prepare($query);
						$afiljurid->execute();
						while( $row = $afiljurid->fetch(PDO::FETCH_ASSOC)) { ?>
							<tr>
								<td> <?php echo $row['cod_afil_jur'] ?></td>
								<td> <?php echo $row['nombre_afil_jur'] ?></td>
								<td> <?php echo $row['fch_registro'] ?></td>
								<td> <?php echo $row['registro'] ?></td>
								<td> <?php echo $row['tomo_reg'] ?></td>
								<td> <?php echo $row['direccion_afil_jur'] ?></td>
								<td> <?php echo $row['telefono_afil_jur'] ?></td>
								<td> <?php echo $row['email_afil_jur'] ?></td>
								<td> <?php echo $row['nombre_rep_afil_jur'] ?></td>
								<td> <?php echo $row['cedula_rep_afil_jur'] ?></td>
								<td>
									<a href="editar.php?id_afil_jur=<?php echo $row['id_afil_jur'] ?>" class="btn btn-secondary <?php echo $desactivar  ?>">
										<i class="fas fa-marker"></i>
									</a> 
									<a href="eliminar.php?id_afil_jur=<?php echo $row['id_afil_jur'] ?>" class="btn btn-danger <?php echo $desactivar  ?>" >
										<i class="fas fa-trash"></i>
									</a>
								</td>
							</tr>
						<?php } ?>
				</thead>
			</table>
		</div>
	</div>
</div> <!-- cierra div Afiliados Juridicos -->

 <!-- Maestro Condiciones de ventas -->
<div class="main container p-4  <?php if ($Tip_form_maestro<>'condiciones_ventas' ) { echo $ocultar ; } ?>">
	<div class="row">
		<div class="col-md-6">
					<table class="table table-sm table-bordered border-dark">
						<thead>
							<tr>
								<th>Código</th>
								<th>Código Prod.</th>								
								<th>Operativo</th>
								<th>Puntos desde:</th>
								<th>Puntos hasta:</th>
								<th>Precio Pto.</th>
								<th>Prec. Pto. Com.</th>
								<th>Moneda</th>
								<th>Cuotas</th>
								<th>Tip de interes</th>
								<th>% Desc.</th>
								<th>Gastos Admin.</th>
								<th>Usuario</th>
								<th>Acciones</th>
							</tr>
							<?php 	
								$query = "select * from condiciones_ventas order by 2";
								$codic_ventas = $conn->prepare($query);
								$codic_ventas->execute();
								while( $row = $codic_ventas->fetch(PDO::FETCH_ASSOC)) { ?>
									<tr>
									  <td> <?php echo $row['cod_cond'] ?></td>
									  <td> <?php echo $row['producto'] ?></td>
									  <td> <?php echo $row['operativo'] ?></td>
									  <td> <?php echo $row['puntos_ini'] ?></td>
									  <td> <?php echo $row['puntos_fin'] ?></td>
									  <td> <?php echo $row['monto_pto'] ?></td>
									  <td> <?php echo $row['mto_pto_comici'] ?></td>
									  <td> <?php echo $row['moneda'] ?></td>
									  <td> <?php echo $row['cuotas'] ?></td>
									  <td> <?php echo $row['tasa'] ?></td>
									  <td> <?php echo $row['descto_maximo'] ?></td>
									  <td> <?php echo $row['monto_gasto_admin'] ?></td>
									  <td> <?php echo $row['usuario'] ?></td>
										<td>
											<a href="editar.php?id_cond=<?php echo $row['id_cond'] ?>" class="btn btn-secondary <?php echo $desactivar  ?>">
												<i class="fas fa-marker"></i>
											</a> 
											<a href="eliminar.php?id_cond=<?php echo $row['id_cond'] ?>" class="btn btn-danger <?php echo $desactivar  ?>" >
												<i class="fas fa-trash"></i>
											</a>
										</td>
									</tr>
								<?php } ?>
						</thead>
					</table>
			</div>
	</div>
</div> <!-- cierra div Condiciones de ventas -->

<!-- Div contratos -->
<div class="container bg-primary rounded <?php if ($Tip_form_maestro<>'contrato' ) { echo $ocultar ; } ?>" name="form_contrato">
	<div class="row align-content-center mt-1 rounded">
		<div class="col-11" id="titulo_contratos_pendientes">
			<h2 class="text-center">Registro de Contrato</h2>
		</div>
		<div class="col-1 mt-2">
			<button type="button" class="btn btn-success position-relative"  id="avisos">
  			Alerts <span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-warning p-2" ><span class="visually-hidden">Avisos pendientes</span></span>
			</button>

		</div>
	<hr size=8>
	</div>	
	<form action="#" method="post" class="row" id="form_contratos">

		<input type="text" name="guardar_form" value="7" hidden id="guardar_form">

		<div class="input-group">
			<div class="col 	p-1 " >
					<label class="input-group-text " for="contrato"><i class="fas fa-file-edit"></i>  Contrato:</label>
					<input autofocus  type="text" class="form-control text-uppercase fs-6 " name="contrato" id="contrato"  >
			</div>
			<div class="col p-1" >
					<label class="input-group-text "><i class="fas fa-calendar-check"></i> Emisión:</label>
					<input type="date" class="form-control" name="fch_venta" id="fch_venta" >
			</div>
			<div class="col p-1" >
					<label class="input-group-text ">Moneda:</label>
					<select name="moneda_condic_cont" id="moneda_condic_cont" disabled>
						<option value="US$" selected>US$</option>
						<option value="BS." disabled>Bs.</option>
					</select>
			</div>
			<div class="col p-1" >
					<label class="input-group-text ">tasa Bs.:</label>
					<input type="text" class="form-control" name="tasa" id="tasa" disabled>
			</div>
		</div>
		<hr >
		<div class="input-group"> 
			<div class="col	p-1 " >
					<?php 
						$label = '<label class="input-group-text" >Producto:</label>';
						$name = 'cod_prod_cont';
						$campos=array('cod_prod','nombre');
						echo cargar_selects('productos', $campos, $label, $name , $conn);
					?>
			</div>
			<div class="col p-1" >
				<?php 
					$label = '<label class="input-group-text" >Operativo:</label>';
					$name = 'cod_oper_cont';
					$campos=array('cod_oper','nombre_oper');
					echo cargar_selects('operativos', $campos, $label, $name , $conn); 
				?>
			</div>
			<div class="col p-1" >
					<label class="input-group-text ">Sucursal:</label>
					<select name="sucursal" id="sucursal">
						<option value="00001" selected>Mérida</option>
						<option value="00002" >Margarita</option>
					</select>
			</div>
			<div class="col p-1" >
						<?php 
							$label = '<label class="input-group-text" >Programa:</label>';
							$name = 'cod_prog_cont';
							$campos=array('cod_prog','nombre_prog');
							echo cargar_selects('prog_ventas', $campos, $label, $name , $conn); 
						?>
			</div>
		</div>
		<hr >
		<div class="form-row  bg-info text-center"><h6 class="m-0">T i t u l a r e s</h6>
		</div>
		<div class="input-group"> 
			<div class="col-6	p-1 " >
					<label class="input-group-text " for="ced_titular1">Titular 1:</label>
					<input type="text" class="form-control" name="ced_titular1" id="ced_titular1" size="10" maxlength="10" placeholder="Cedula" required>
					<div class="lista" id="lista"></div>

					<input type="text" class="form-control" name="nom_titular1" id="nom_titular1" placeholder="Nombre">
					<input type="text" class="form-control" name="ape_titular1" id="ape_titular1" placeholder="Apellido">
			</div>
			<div class="col-6 p-1 " >
					<label class="input-group-text " for="ced_titular2">Titular 2:</label>
					<div class="col-2">
						<input type="text" class="form-control" name="ced_titular2" id="ced_titular2" placeholder="Cedula">
					</div>
					<input type="text" class="form-control" name="nom_titular2" id="nom_titular2" placeholder="Nombre">
					<input type="text" class="form-control" name="ape_titular2" id="ape_titular2" placeholder="Apellido">
			</div>
		</div>
		<hr>
		<div class="form-row  bg-info text-center">
			<h6 class="m-0">E s q u e m a  -   d e  -   v e n t a</h6>
		</div>
		<div  id="esq_venta" class="input-group">
			<div class="col p-1">
					<label for="tot_puntos" class="input-group-text " >Total Puntos:</label>
					<input type="number" class="form-control" name="tot_puntos" id="tot_puntos" placeholder="00000"  >
			</div>
			<div class="col p-1">
					<label for="val_pto" class="input-group-text " >Valor Pto:</label>
					<input type="number" class="form-control" name="val_pto" id="val_pto" disabled>
			</div>
			<div class="col p-1">
					<label for="pto_comici" class="input-group-text " >Pto. Comisc:</label>
					<input type="number" class="form-control" name="pto_comici" id="pto_comici" disabled>
			</div>
			<div class="col p-1">
					<label for="descuento_%" class="input-group-text " >% Descuento:</label>
					<input type="number" class="form-control" name="descuento_%" id="descuento_%">
			</div>
			<div class="col p-1">
					<label for="monto_desc" class="input-group-text " >Monto Desc:</label>
					<input type="number" class="form-control" name="monto_desc" id="monto_desc">
			</div>
		</div>
		<div class="input-group">
			<div class="col p-1 ">
					<label for="val_contrato" class="input-group-text " >Valor Contrato:</label>
					<input type="number" class="form-control" name="val_contrato" id="val_contrato" disabled>
			</div>
			<div class="col p-1 ">
					<label for="mtto_anio1" class="input-group-text " >Mtto 1er Año:</label>
					<input type="number" class="form-control" name="mtto_anio1" id="mtto_anio1">
			</div>
			<div class="col p-1 ">
					<label for="gastos_admin" class="input-group-text " >Gast. Admin:</label>
					<input type="number" class="form-control" name="gastos_admin" id="gastos_admin" disabled>
			</div>
			<div class="col p-1 ">
					<label for="miscelaneos" class="input-group-text " >Miscelaneos:</label>
					<input type="number" class="form-control" name="miscelaneos" id="miscelaneos">
			</div>
			<div class="col p-1 ">
					<label for="val_total" class="input-group-text " >Valor Total:</label>
					<input type="number" class="form-control" name="val_total" id="val_total" disabled>
			</div>
		</div>
		<hr>
		<div class="form-row  bg-info text-center "><h6 class="m-0">Distribución de Financiamiento de los Puntos Adquiridos</h6>
		</div>
		<div class="input-group">
			<div class="col p-1">
					<label for="ini_mesa" class="input-group-text " >Inicial en Mesa:</label>
					<input type="number" class="form-control" name="ini_mesa" id="ini_mesa">
			</div>
			<div class="col p-1">
					<label for="ini_diferida" class="input-group-text " >Inicial Diferida:</label>
					<input type="number" class="form-control" name="ini_diferida" id="ini_diferida">
			</div>
			<div class="col p-1">
					<label for="cap_especial" class="input-group-text " >Cap. Especial:</label>
					<input type="number" class="form-control" name="cap_especial" id="cap_especial">
			</div>
			<div class="col p-1">
					<label for="cap_normal" class="input-group-text " >Cap. Normal:</label>
					<input type="number" class="form-control" name="cap_normal" id="cap_normal">
			</div>
			<div class="col p-1">
					<label for="val_contrato_finan" class="input-group-text " >Valor Contrato:</label>
					<input type="number" class="form-control" name="val_contrato_finan" id="val_contrato_finan" disabled>
			</div>
		</div>
		<div class="input-group">
			<div class="col p-1">
					<label for="ini_mesa_%" class="input-group-text " >%</label>
					<input type="text" class="form-control" name="ini_mesa_%" id="ini_mesa_%" disabled disabled>
			</div>
			<div class="col p-1">
					<label for="ini_diferida_%" class="input-group-text " >%:</label>
					<input type="text" class="form-control" name="ini_diferida_%" id="ini_diferida_%">
			</div>
			<div class="col p-1">
					<label for="cap_especial_%" class="input-group-text " >%</label>
					<input type="text" class="form-control" name="cap_especial_%" id="cap_especial_%" disabled>
			</div>
			<div class="col p-1">
					<label for="cap_normal_%" class="input-group-text " >%</label>
					<input type="text" class="form-control" name="cap_normal_%" id="cap_normal_%" disabled>
			</div>
			<div class="col p-1">
					<label for="val_contrato_%" class="input-group-text " >%</label>
					<input type="text" class="form-control" name="val_contrato_%" id="val_contrato_%" disabled>
			</div>
		</div>
		<div class="input-group ">
			<div class="col-12 p-1">
					<label for="observaciones" class="input-group-text " >Observaciones:</label>
					<textarea class="form-control" name="observaciones"></textarea>
			</div>
		</div>
		<div class="row ">
			<div class="col p-1 text-center">
				<button type="submit" class="btn btn-secondary btn-lg" name="guardar_contrato" id="guardar_contrato" ><i class="fa-solid fa-save"></i> Guardar Datos</button>
			</div>
	</form>
</div>

<?php  include("includes/footer.php"); ?>