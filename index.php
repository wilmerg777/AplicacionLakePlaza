<?php 
	include("db.php");
	include("includes/header.php"); 
?>

	<main class="container p-4">
		<div class="row">
			<div class="col-md-4">
				<!-- MESSAGES -->
				<?php if (isset($_SESSION['message'])) { ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<?php $_SESSION['message']?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
	      			<?php session_unset(); } ?>

				<div class="card card-body">
					<form action="guardardatos.php" method="POST">
						<div class="form-group">
							<input type="text" name="titulo" class="form-control " placeholder="Título" autofocus>
						</div>
						<div class="form-group">
							<textarea name="descripcion" rows="2" class="form-control" placeholder="Inserta Descripción"></textarea>
						</div>
						<input type="submit" class="btn btn-success " name="guardardatos" value="Guardar Datos">
					</form>
				</div>
			</div>
			<div class="col-md-8">
				<table class="table table-bordered">
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
									<td> </td>
								</tr>
							<?php } ?>
					</thead>
				</table>
			</div>
		</div>
	</main>

<?php  include("includes/footer.php"); ?>

