<?php
	include("sesion.php");
	include("includes/header.php");
	include("db.php");
?>

	<main class="container p-4">
		<div class="row">
			<div class="col-md-4">
				<!-- MESSAGES -->
				<?php if (isset($_SESSION['message'])) { ?>
				<div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
					<?= $_SESSION['message']?>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
					</button>
				</div>
				<?php unset($_SESSION['message']);
				 } 
				?>

				<div class="card card-body">
					<form action="guardardatos.php" method="POST">
						<input type="text" name="guardar_form" value="1" hidden>
            <div class="form-outline mb-4">
							<label class="form-label" for="codUser">Código del usuario:</label>
							<input type="text" name="codUser" class="form-control " placeholder="Numero de cedula preferiblemente" autofocus>
						</div>
            <div class="form-outline mb-4">
							<label class="form-label" for="usuario">Usuario</label>
							<input type="text" name="usuario" class="form-control " placeholder="Nick de usuario" autofocus>
						</div>
            <div class="form-outline mb-4">
            	<label class="form-label" for="email_user">Correo Electrónico</label>
							<input type="email" name="email_user" class="form-control"  placeholder="Escriba su correo electrónico" >
						</div>
						<div class="form-outline mb-4">
              <label class="form-label" for="clave_usuario">Password</label>
              <input type="password" id="clave_usuario" name="clave_usuario" placeholder="Debe tener max. 10 caracteres." class="form-control" />
            </div>
            <!-- Confirnar password
            <div class="form-outline mb-4">
              <label class="form-label" for="clave_usuario_conf">Confirme Password</label>
              <input type="password" id="clave_usuario_conf" name="clave_usuario_conf" placeholder="Debe tener max. 10 caracteres." class="form-control" />
            </div>
          -->
						<input type="submit" class="btn btn-success " name="guardardatos" value="Guardar Datos">
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
										<a href="editar.php?id_user=<?php echo $row['id_user'] ?>" class="btn btn-secondary">
											<i class="fas fa-marker"></i>
										</a> 
										<a href="eliminar.php?id_user=<?php echo $row['id_user'] ?>" class="btn btn-danger">
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

						$q = $conn->prepare('DESCRIBE afiliados_natu');
						$q->execute();
						while($row = $q->fetch(PDO::FETCH_ASSOC)) {
							echo "{$row['Field']} - {$row['Type']}<br>";
    				}
    				//return print_r($row) ;
						return  $codigo;
					}

					echo genera_MenuSeleccion($conn, $name, $label);

					?> 


			</div>
		</div>
	</main>

<?php  include("includes/footer.php"); ?>

