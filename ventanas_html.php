<?php 
	include('sesion.php');
	include('db.php');
	include('Scripts/consultas_varias.php');
	error_reporting(E_ERROR | E_WARNING | E_PARSE );
	$ocultar = 'd-none';
	if (isset($_SESSION['autoridad'])) { 
		$nivel_autoridad = $_SESSION['autoridad'];
		if ($nivel_autoridad <>1) {
			$desactivar="disabled";
		} else {
			$desactivar="";
		}
	}
?>


 <!-- Maestro Productos -->
<div class="main container p-4  <?php if ($Tip_form_maestro<>'producto' ) { echo $ocultar ; } ?>">
	<div class="row">
		<div class="col-md-4">
			<div class="card card-body">
				<form action="guardardatos.php" method="post">
					<h3>Registro de Productos</h3><br>
					<input type="text" name="guardar_form" value="4" hidden>
					<label class="form-label " for="cod_prod">Código del producto:</label>
					<div class="form-outline mb-4 col-md-4">
						<input type="text" name="cod_prod" class="form-control " placeholder="Ejm: TP001" autofocus>
					</div>
					<div class="form-outline mb-4 col-md-10 ">
						<label class="form-label " for="nom_prod">Nomdre del producto:</label>
						<input type="text" name="nom_prod" class="form-control " >
					</div>
					<div class="form-outline mb-4 col-md-4 ">
				    <label for="estado_producto" class="form-label">Estado</label>
				    <select class="form-select" id="estado_producto" name="estado_producto" >
				      <option selected value="1">Activo</option>
				      <option value="0">Inactivo</option>
				    </select>
					</div>
					<input type="text" name="cod_user" class="form-control " Value='<?php echo $_SESSION['id_user'] ?>' hidden>
					<div class="form-outline mb-4">
						<button type="submit" class="btn btn-primary btn-lg" name="guardar" ><i class="fa-solid fa-save"></i> Guardar Datos</button>
					</div>				
				</form>
			</div>
		</div>
		<div class="col-md-6">
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
		<div class="col-md-4">
			<div class="card card-body">
				<form action="guardardatos.php" method="post">
					<h3>Registro de Programas de Ventas</h3><br>
					<input type="text" name="guardar_form" value="5" hidden>
					<label class="form-label " for="cod_prog_vta">Código del Programa:</label>
					<div class="form-outline mb-4 col-md-4">
						<input type="text" name="cod_prog_vta" id="cod_prog_vta" class="form-control " placeholder="Ejm: IH001" autofocus>
					</div>
					<div class="form-outline mb-4 col-md-10 ">
						<label class="form-label " for="nom_prog_vta">Nomdre del programa:</label>
						<input type="text" name="nom_prog_vta" id="nom_prog_vta" class="form-control" placeholder="Ejm: IN HOUSE">
					</div>
					<div class="form-outline mb-4 col-md-4 ">
				    <label for="estado_programa" class="form-label">Estado</label>
				    <select class="form-select" id="estado_programa" name="estado_programa" >
				      <option selected value="1">Activo</option>
				      <option value="0">Inactivo</option>
				    </select>
					</div>
					<input type="text" name="cod_user" class="form-control " Value='<?php echo $_SESSION['id_user'] ?>' hidden>
					<div class="form-outline mb-4">
						<button type="submit" class="btn btn-primary btn-lg" name="guardar" ><i class="fa-solid fa-save"></i> Guardar Datos</button>
					</div>				
				</form>
			</div>
		</div>
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

  <!-- Maestro Usuarios -->
<div class="main container p-4 <?php if ($Tip_form_maestro<>'usuarios' ) { echo $ocultar ; } ?>">
	<div class="row">
		<div class="col-md-4">
			<div class="card card-body">
				<form action="guardardatos.php" method="POST" >
					<h3>Registro de Usuarios</h3><br>
					<input type="text" name="guardar_form" value="1" hidden>
          <div class="form-outline mb-4">
						<label class="form-label" for="codUser">Código del usuario:</label>
						<input type="text" name="codUser" class="form-control " placeholder="Numero de cedula preferiblemente" autofocus>
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
		<div class="col-md-4">
			<div class="card card-body">
				<form action="guardardatos.php" method="post">
					<h3>Registro de Afiliado Natural</h3><br>
					<input type="text" name="guardar_form" value="2" hidden>
					<label class="form-label " for="cod_afil_natu">Código del Afiliado (cédula):</label>
					<div class="form-outline mb-4 col-md-4">
						<input type="text" name="cod_afil_natu" class="form-control " placeholder="Ejm: 19.999.999" autofocus>
					</div>
					<div class="form-outline mb-4 col-md-10 ">
						<label class="form-label " for="nom_afil_natu">Nomdres:</label>
						<input type="text" name="nom_afil_natu" class="form-control " >
					</div>
					<div class="form-outline mb-4 col-md-10 ">
						<label class="form-label " for="ape_afil_natu">Apellidos:</label>
						<input type="text" name="ape_afil_natu" class="form-control " >
					</div>
					<div class="form-outline mb-4 col-md-10 ">
						<label class="form-label " for="fch_nat">Fecha de Nacimiento:</label>
						<input type="date" name="fch_nat" class="form-control " >
					</div>
					<div class="form-control mb-4">
						<label class="form-label" >Sexo:</label>
						<div>
						  <label class="form-check-label" for="F">
						    Femenino
						  <input class="form-check-input" type="radio" name="sexo_afil_natu" id="sexo_afil_natu_F" value="F">
						  </label><br>
							<label class="form-check-label" for="M">
								Masculino
						  <input class="form-check-input" type="radio" name="sexo_afil_natu" id="sexo_afil_natu_M" value="M">
						  </label>
						</div>
					</div>
					<div class="form-outline mb-4 col-md-10 ">
						<label class="form-label " for="pais_orig_afil_natu">Pais Origen:</label>
						<input type="text" name="pais_orig_afil_natu" class="form-control " >
					</div>
					<div class="form-outline mb-4 col-md-10 ">
						<label class="form-label " for="direccion_afil_natu">Direccion Hab.:</label>
						<input type="text" name="direccion_afil_natu" class="form-control " >
					</div>
					<div class="form-outline mb-4 col-md-10 ">
						<label class="form-label " for="cod_ciudad">Ciudad:</label>
						<input type="text" name="cod_ciudad" class="form-control " >
					</div>
					<div class="form-outline mb-4 col-md-10 ">
						<label class="form-label " for="telefonos">Telefonos:</label>
						<input type="text" name="telefonos" class="form-control " >
					</div>
					<div class="form-outline mb-4 col-md-4 ">
				    <label for="email_afil_natu" class="form-label">Email:</label>
						<input type="text" name="email_afil_natu" class="form-control " >
					</div>
					<input type="text" name="cod_user" class="form-control " Value='<?php echo $_SESSION['id_user'] ?>' hidden>
					<div class="form-outline mb-4">
						<button type="submit" class="btn btn-primary btn-lg" name="guardardatos" ><i class="fa-solid fa-save"></i> Guardar Datos</button>
					</div>				
				</form>
			</div>
		</div>
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
		<div class="col-md-4">


			<div class="card card-body">
				<form action="guardardatos.php" method="post">
					<h3>Registro de Afiliado Jurídico</h3><br>
					<input type="text" name="guardar_form" value="3" hidden>
					<label class="form-label " for="cod_afil_jurid">Código de la Empresa (RIF):</label>
					<div class="form-outline mb-4 col-md-6">
						<input type="text" name="cod_afil_jurid" class="form-control " placeholder="Ejm: J-09999999-1" autofocus>
					</div>
					<div class="form-outline mb-4 col-md-10 ">
						<label class="form-label " for="nom_afil_jurid">Nombre:</label>
						<input type="text" name="nom_afil_jurid" class="form-control " >
					</div>
					<div class="form-outline mb-4 col-md-10 ">
						<label class="form-label " for="fch_reg">Fecha de Registro:</label>
						<input type="date" name="fch_reg" class="form-control " >
					</div>
					<div class="form-outline mb-4 col-md-10 ">
						<label class="form-label " for="registro_jurid">Registro:</label>
						<input type="text" name="registro_jurid" class="form-control " >
					</div>
					<div class="form-outline mb-4 col-md-10 ">
						<label class="form-label " for="tomo_reg">Tomo Registro:</label>
						<input type="text" name="tomo_reg" class="form-control " >
					</div>
					<div class="form-outline mb-4 col-md-10 ">
						<label class="form-label " for="direccion_afil_jurid">Dirección:</label>
						<input type="text" name="direccion_afil_jurid" class="form-control " >
					</div>
					<div class="form-outline mb-4 col-md-10 ">
						<label class="form-label " for="telefonos">Telefonos:</label>
						<input type="text" name="telefonos" class="form-control " >
					</div>
					<div class="form-outline mb-4 col-md-10 ">
				    <label for="email_afil_jurid" class="form-label">Email:</label>
						<input type="text" name="email_afil_jurid" class="form-control " >
					</div>
					<div class="form-outline mb-4 col-md-10 ">
						<label class="form-label " for="nom_representante">Nombre Representante:</label>
						<input type="text" name="nom_representante" class="form-control " >
					</div>
					<label class="form-label " for="ced_representante">Cédula Representante:</label>
					<div class="form-outline mb-4 col-md-6">
						<input type="text" name="ced_representante" class="form-control " placeholder="Ejm: 99.999.999" >
					</div>
					<input type="text" name="cod_user" class="form-control " Value='<?php echo $_SESSION['id_user'] ?>' hidden>
					<div class="form-outline mb-4">
						<button type="submit" class="btn btn-primary btn-lg" name="guardardatos" ><i class="fa-solid fa-save"></i> Guardar Datos</button>
					</div>				
				</form>
			</div>
		</div>
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
<div class="main container-fluid p-4  <?php if ($Tip_form_maestro<>'condiciones_ventas' ) { echo $ocultar ; } ?>">
	<div class="row">
		<div class="col-md-4">
			<div class="card card-body">
				<form action="guardardatos.php" method="post" >
					<h3>Registro de Condiciones de ventas</h3><br>
					<input type="text" name="guardar_form" value="6" hidden>
					<label class="form-label " for="cod_cond_vta">Identificador de la condición:</label>
					<div class="form-outline mb-4 col-md-4 ">
						<input type="text" name="cod_cond_vta" class="form-control " placeholder="Ejm: TP001" autofocus >
					</div>
					<div class="input-group  col-md-3 mb-sm-3">
						<?php 
							$label = '<span class="input-group-text" >Producto:</span>';
							$name = 'cod_prod_vta';
							$campos=array('cod_prod','nombre');
							echo cargar_inputs('productos', $campos, $label, $name , $conn); 
						?>
					</div>
					<div class="input-group  col-md-3 mb-3 ">
						<?php 
							$label = '<span class="input-group-text" >Operativo:</span>';
							$name = 'cod_oper_vta';
							$campos=array('cod_oper','nombre_oper');
							echo cargar_inputs('operativos', $campos, $label, $name , $conn); 
						?>
					</div>
					<div class="input-group  col-md-3 mb-3 ">
					  <span class="input-group-text">Ptos. Desde</span>
					  <div class="form-outline  col-md-4 ">
						  <input name="ptos_ini_vta" type="text" class="form-control " placeholder="000" >
						</div>
					</div>

					<div class="input-group  col-md-3 mb-sm-3 ">
						<span class="input-group-text">Ptos. hasta:</span>
						<div class="form-outline  col-md-4 ">
							<input type="text" name="ptos_fin_vta" class="form-control " placeholder="000">
						</div>
					</div>
					<div class="input-group  col-md-3 mb-sm-3 ">
						<span class="input-group-text">Precio Pto.</span>
						<div class="form-outline  col-md-4 ">
							<input type="text" name="precio_pto_vta" class="form-control" placeholder="0,00" >
						</div>
					</div>
					<div class="input-group  col-md-3 mb-sm-3 ">
						<span class="input-group-text">Precio Pto. Comisión:</span>
						<div class="form-outline  col-md-4 ">
							<input type="money" name="precio_pto_com" class="form-control " >
						</div>
					</div>
					<div class="form-outline mb-3 col-md-10 ">
						<label class="form-label " for="moneda_condic">Moneda:</label>
						<select name="moneda_condic" id="moneda_condic">
							<option value="US$" selected>US$</option>
							<option value="BS.">Bs.</option>
						</select>
					</div>
					<div class="input-group  col-md-3 mb-sm-3 ">
						<span class="input-group-text">Maximo de Cuotas:</span>
						<div class="form-outline  col-md-4 ">
							<input type="text" name="cuot_max_vta" class="form-control " >
						</div>
					</div>
					<div class="input-group mb-sm-3">
					  <span class="input-group-text">Gastos Adm.</span>
					  <span class="input-group-text">US$</span>
						<div class="form-outline  col-md-4 ">
							<input type="text" class="form-control" name="gastos_admin" placeholder="0.00" >
						</div>					  
					</div>
					<div class="input-group mb-sm-3">
					  <span class="input-group-text">Tipo Interes:</span>
					  <div class="form-outline  col-md-4 ">
							<input type="text" name="tip_interes" class="form-control " >
						</div>
					</div>
					<div class="input-group mb-sm-3">
					  <span class="input-group-text">Descuento:</span>
					  <div class="form-outline  col-md-4 ">
							<input type="text" name="%_desc_vta" class="form-control " placeholder="%" >
						</div>
					</div>
					<input type="text" name="cod_user" class="form-control " Value='<?php echo $_SESSION['id_user'] ?>' hidden>
					<div class="form-outline mb-4">
						<button type="submit" class="btn btn-primary btn-lg" name="guardar" ><i class="fa-solid fa-save"></i> Guardar Datos</button>
					</div>				
				</form>
			</div>
		</div>
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
</div> <!-- cierra div productos -->

<!-- Div contratos -->
<div class="container bg-primary rounded <?php if ($Tip_form_maestro<>'contrato' ) { echo $ocultar ; } ?>" name="form_contrato">
	<div class="row align-content-center mt-1 rounded">
		<div class="col-11">
			<h2 class="text-center">Registro de Contrato</h2>
		</div>
		<div class="col-1 mt-2">
			<button type="button" class="btn btn-success position-relative">
  			Alerts <span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-warning p-2"><span class="visually-hidden">Avisos pendientes</span></span>
			</button>

		</div>
	<hr size=8>
	</div>	
	<form action="guardardatos.php " method="post" class="row" >
		<input type="text" name="guardar_form" value="7" hidden>
		<div class="row">
			<div class="col 	p-2 " >
				<div class="input-group  ">
					<label class="input-group-text " for="contrato"><i class="fas fa-file-edit"></i>  Contrato:</label>
					<input type="text" class="form-control text-uppercase fs-6" name="contrato" id="contrato">
				</div>			
			</div>
			<div class="col p-2" >
				<div class="col-9">
				<div class="input-group ">
					<label class="input-group-text "><i class="fas fa-calendar-check"></i> Emisión:</label>
					<input type="date" class="form-control" name="fch_venta">
				</div>
				</div>		
			</div>
			<div class="col p-2" >
				<div class="input-group ">
					<span class="input-group-text ">Moneda:</span>
					<select name="moneda_condic" id="moneda_condic" disabled>
						<option value="US$" selected>US$</option>
						<option value="BS." disabled>Bs.</option>
					</select>
				</div>			
			</div>
			<div class="col p-2" >
				<div class="input-group ">
					<span class="input-group-text ">tasa:</span>
					<input type="text" class="form-control" name="tasa">
				</div>			
			</div>
		</div>
		<hr >
		<div class="row"> 
			<div class="col 	p-2 " >
				<div class="input-group  ">
					<?php 
						$label = '<span class="input-group-text" >Producto:</span>';
						$name = 'cod_prod_vta';
						$campos=array('cod_prod','nombre');
						echo cargar_inputs('productos', $campos, $label, $name , $conn);
					?>
				</div>			
			</div>
			<div class="col p-2" >
				<div class="col-9">
					<div class="input-group ">
						<?php 
							$label = '<span class="input-group-text" >Operativo:</span>';
							$name = 'cod_oper_vta';
							$campos=array('cod_oper','nombre_oper');
							echo cargar_inputs('operativos', $campos, $label, $name , $conn); 
						?>
					</div>
				</div>		
			</div>
			<div class="col p-2" >
				<div class="input-group ">
					<span class="input-group-text ">Sucursal:</span>
					<select name="sucursal" id="sucursal">
						<option value="00001" selected>Mérida</option>
						<option value="00002" >Margarita</option>
					</select>
				</div>			
			</div>
			<div class="col p-2" >
				<div class="input-group ">
						<?php 
							$label = '<span class="input-group-text" >Programa:</span>';
							$name = 'cod_prog_vta';
							$campos=array('cod_prog','nombre_prog');
							echo cargar_inputs('prog_ventas', $campos, $label, $name , $conn); 
						?>
				</div>			
			</div>
		</div>
		<hr >
		<div class="form-row  bg-info text-center"><h6 class="m-0">T i t u l a r e s</h6>
		</div>
		<div class="row"> 
			<div class="col 	p-2 " >
				<div class="input-group  ">
					<label class="input-group-text " for="ced_titular1">Titular 1:</label>
					<div class="col-2">
						<input type="text" class="form-control" name="ced_titular1" placeholder="Cedula">
					</div>
					<input type="text" class="form-control" name="nom_titular1" placeholder="Nombre">
					<input type="text" class="form-control" name="ape_titular1" placeholder="Apellido">
				</div>
			</div>
			<div class="col 	p-2 " >
				<div class="input-group  ">
					<label class="input-group-text " for="ced_titular2">Titular 2:</label>
					<div class="col-2">
						<input type="text" class="form-control" name="ced_titular2" placeholder="Cedula">
					</div>
					<input type="text" class="form-control" name="nom_titular2" placeholder="Nombre">
					<input type="text" class="form-control" name="ape_titular2" placeholder="Apellido">
				</div>			
			</div>
		</div>
		<hr>
		<div class="form-row  bg-info text-center "><h6 class="m-0">E s q u e m a  -   d e  -   v e n t a</h6>
		</div>
		<div class="row">
			<div class="col p-2">				<div class="input-group  ">
					<label for="tot_puntos" class="input-group-text " >Total Puntos:</label>
					<input type="number" class="form-control" name="tot_puntos" min="1" max="1800" placeholder="1">
				</div>
			</div>
			<div class="col p-2">
				<div class="input-group  ">
					<label for="val_pto" class="input-group-text " >Valor Pto:</label>
					<input type="text" class="form-control" name="val_pto">
				</div>
			</div>
			<div class="col p-2">
				<div class="input-group  ">
					<label for="pto_comici" class="input-group-text " >Pto. Comisc:</label>
					<input type="text" class="form-control" name="pto_comici">
				</div>
			</div>
			<div class="col p-2">
				<div class="input-group  ">
					<label for="descuento_%" class="input-group-text " >% Descuento:</label>
					<input type="number" class="form-control" name="descuento_%">
				</div>
			</div>
			<div class="col p-2">
				<div class="input-group  ">
					<label for="monto_desc" class="input-group-text " >Monto Desc:</label>
					<input type="number" class="form-control" name="monto_desc">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col p-2">				<div class="input-group  ">
					<label for="val_contrato" class="input-group-text " >Valor Contrato:</label>
					<input type="text" class="form-control" name="val_contrato">
				</div>
			</div>
			<div class="col p-2">
				<div class="input-group  ">
					<label for="mtto_anio1" class="input-group-text " >Mtto 1er Año:</label>
					<input type="text" class="form-control" name="mtto_anio1">
				</div>
			</div>
			<div class="col p-2">
				<div class="input-group  ">
					<label for="gastos_admin" class="input-group-text " >Gast. Admin:</label>
					<input type="text" class="form-control" name="gastos_admin">
				</div>
			</div>
			<div class="col p-2">
				<div class="input-group  ">
					<label for="miscelaneos" class="input-group-text " >Miscelaneos:</label>
					<input type="text" class="form-control" name="miscelaneos">
				</div>
			</div>
			<div class="col p-2">
				<div class="input-group  ">
					<label for="val_total" class="input-group-text " >Valor Total:</label>
					<input type="text" class="form-control" name="val_total">
				</div>
			</div>
		</div>
		<hr>
		<div class="form-row  bg-info text-center "><h6 class="m-0">Distribución de Financiamiento de los Puntos Adquiridos</h6>
		</div>
		<div class="row">
			<div class="col p-2">
				<div class="input-group  ">
					<label for="ini_mesa" class="input-group-text " >Inicial en Mesa:</label>
					<input type="text" class="form-control" name="ini_mesa">
				</div>
			</div>
			<div class="col p-2">
				<div class="input-group  ">
					<label for="ini_diferida" class="input-group-text " >Inicial Diferida:</label>
					<input type="text" class="form-control" name="ini_diferida">
				</div>
			</div>
			<div class="col p-2">
				<div class="input-group  ">
					<label for="cap_especial" class="input-group-text " >Cap. Especial:</label>
					<input type="text" class="form-control" name="cap_especial">
				</div>
			</div>
			<div class="col p-2">
				<div class="input-group  ">
					<label for="cap_normal" class="input-group-text " >Cap. Normal:</label>
					<input type="text" class="form-control" name="cap_normal">
				</div>
			</div>
			<div class="col p-2">
				<div class="input-group  ">
					<label for="val_contrato" class="input-group-text " >Valor Contrato:</label>
					<input type="text" class="form-control" name="val_contrato">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col p-2">
				<div class="input-group  ">
					<label for="ini_mesa_%" class="input-group-text " >%</label>
					<input type="text" class="form-control" name="ini_mesa_%">
				</div>
			</div>
			<div class="col p-2">
				<div class="input-group  ">
					<label for="ini_diferida_%" class="input-group-text " >%:</label>
					<input type="text" class="form-control" name="ini_diferida_%">
				</div>
			</div>
			<div class="col p-2">
				<div class="input-group  ">
					<label for="cap_especial_%" class="input-group-text " >%</label>
					<input type="text" class="form-control" name="cap_especial_%">
				</div>
			</div>
			<div class="col p-2">
				<div class="input-group  ">
					<label for="cap_normal_%" class="input-group-text " >%</label>
					<input type="text" class="form-control" name="cap_normal_%">
				</div>
			</div>
			<div class="col p-2">
				<div class="input-group  ">
					<label for="val_contrato_%" class="input-group-text " >%</label>
					<input type="text" class="form-control" name="val_contrato_%">
				</div>
			</div>
		<div class="row">
			<div class="col p-2">
				<div class="input-group  ">
					<label for="observaciones" class="input-group-text " >Observaciones:</label>
					<textarea class="form-control" name="observaciones"></textarea>  
				</div>
			</div>
		</div>
		<div class="row ">
			<div class="col p-2 text-center">
				<button type="submit" class="btn btn-secondary btn-lg" name="guardar" ><i class="fa-solid fa-save"></i> Guardar Datos</button>
	</form>
</div>

<?php  include("includes/footer.php"); ?>