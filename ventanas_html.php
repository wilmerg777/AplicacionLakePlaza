<?php 
	include('sesion.php');
	include('db.php');
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
	echo "string";
?>

<!-- MESSAGES -->
<?php if (isset($_SESSION['message'])) { ?>
	<div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
		<?= $_SESSION['message']?>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
		</button>
	</div>
<?php unset($_SESSION['message']); 	 } ?>
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
 				
			<?php
				$label = "Usuarios";
				$name = "usuarios";
				function genera_MenuSeleccion ($conn, $name, $label){
					$query = "select * from usuarios";
					$resultado = $conn->prepare($query);
					$resultado->execute();
					$codigo = '<label>'.$label.'</label><br>';

					$codigo= $codigo.'<select name="'.$name.'">.\n';

					while ( $fila = $resultado->fetch(PDO::FETCH_ASSOC)){
						$codigo = $codigo.'<option value= "'.$fila["id_user"].'">'.$fila["id_user"].'-'.utf8_encode($fila["usuario"]).'</option>'."/n";
					}

					$codigo = $codigo."</select>\n";

					$q = $conn->prepare('DESCRIBE afiliados_jurid');
					$q->execute();
					while($row = $q->fetch(PDO::FETCH_ASSOC)) {
						echo "{$row['Field']} - {$row['Type']}<br>";
  				}
					return  $codigo;
				}

				echo genera_MenuSeleccion($conn, $name, $label);
			?>
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

<div class="row">

</div>


<?php  include("includes/footer.php"); ?>