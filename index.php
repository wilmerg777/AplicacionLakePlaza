<?php 
	include("db.php");
	include("includes/header.php"); 
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
				<?php session_unset(); } ?>

				<div class="card card-body">
					<form action="guardardatos.php" method="POST">
						<div class="input-group mb-3">
							<input type="text" name="titulo" class="form-control " placeholder="Título" autofocus>
						</div>
						<div class="input-group mb-3">
							<textarea name="descripcion" rows="2" class="form-control " placeholder="Inserta Descripción" ></textarea>
						</div>
						<input type="submit" class="btn btn-success " name="guardardatos" value="Guardar Datos">
					</form>
				</div>
			</div>
			<div class="col-md-8">
				<table class="table table-bordered border-dark">
					<thead>
						<tr>
							<th>Usuario</th>
							<th>Mapa</th>
							<th>Fecha de Registro</th>
							<th>Acciones</th>
						</tr>
						<?php 	
							$query = "select * from usuarios";
							$usuarios = mysqli_query($conn,$query);
							while( $row = mysqli_fetch_array($usuarios)) { ?>
								<tr>
									<td> <?php echo $row['usuario'] ?></td>
									<td> <?php echo $row['mapa'] ?></td>
									<td> <?php echo $row['fch_registro'] ?></td>
									<td>
										<a href="editar.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
											<i class="fas fa-marker"></i>
										</a> 
										<a href="eliminar.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
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
						$datos = mysqli_query($conn,$query);
						$codigo = '<label>'.$label.'</label><br>';

						$codigo= $codigo.'<select name="'.$name.'">.\n';

						while ( $fila = mysqli_fetch_array($datos)){
							$codigo = $codigo.'<option value= "'.$fila["id"].'">'.$fila["id"].'-'.utf8_encode($fila["usuario"]).'</option>'."/n";
						}

						$codigo = $codigo."</select>\n";

						$q = mysqli_query($conn,'DESCRIBE afiliados_natu');
						while($row = mysqli_fetch_array($q)) {
    					echo "{$row['Field']} - {$row['Type']}<br>";
    				}
						return  $codigo;
					}

					echo genera_MenuSeleccion($conn, $name, $label);

					?> 


			</div>
		</div>
	</main>

<?php  include("includes/footer.php"); ?>

