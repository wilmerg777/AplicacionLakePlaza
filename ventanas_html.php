<?php 
	include('sesion.php');
	include('db.php');
	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
?>

<div class="main container p-4 productos">
	<div class="row">
		<div class="col-md-6">
			<?php if (isset($_SESSION['message'])) { ?>
				<div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
					<?= $_SESSION['message']?>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
					</button>
				</div>
				<?php unset($_SESSION['message']); } ?>
			<div class="card card-body">
				<form action="guardardatos.php" method="post">
					<h3>Registro de Productos</h3><br>
					<input type="text" name="guardar_form" value="4" hidden>
					<label class="form-label " for="cod_prod">Código del producto:</label>
					<div class="form-outline mb-4 col-md-2">
						<input type="text" name="cod_prod" class="form-control " placeholder="Ejm: TP001" autofocus>
					</div>
					<div class="form-outline mb-4 col-md-6 ">
						<label class="form-label " for="nom_prod">Nomdre del producto:</label>
						<input type="text" name="nom_prod" class="form-control " >
					</div>
					<div class="form-outline mb-4 col-md-3 ">
				    <label for="estado_producto" class="form-label">Estado</label>
				    <select class="form-select" id="estado_producto" name="estado_producto" >
				      <option selected value="1">Activo</option>
				      <option value="0">Inactivo</option>
				    </select>
					</div>
					<input type="text" name="cod_user" class="form-control " Value='<?php echo $_SESSION['id_user'] ?>' hidden>
					<div class="form-outline mb-4">
						<button type="submit" class="btn btn-primary btn-lg" name="guardarProd" >Guardar Datos</button>
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
								$query = "select * from productos";
								$productos = $conn->prepare($query);
								$productos->execute();
								while( $row = $productos->fetch(PDO::FETCH_ASSOC)) { ?>
									<tr>
										<td> <?php echo $row['cod_prod'] ?></td>
										<td> <?php echo $row['nombre'] ?></td>
										<td> <?php echo $row['fch_registro'] ?></td>
										<td> <?php echo $row['estado'] ?></td>
										<td>
											<a href="editar.php?id_prod=<?php echo $row['id_prod'] ?>" class="btn btn-secondary">
												<i class="fas fa-marker"></i>
											</a> 
											<a href="eliminar.php?id_prod=<?php echo $row['id_prod'] ?>" class="btn btn-danger">
												<i class="fas fa-trash-alt"></i>
											</a>
										</td>
									</tr>
								<?php } ?>
						</thead>
					</table>
			</div>
	</div>
</div> <!-- cierra div productos -->
<?php  include("includes/footer.php"); ?>