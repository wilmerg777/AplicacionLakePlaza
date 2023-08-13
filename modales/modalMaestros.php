<?php 

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
?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productoModal">
  Nuevo Registro:
</button>

<div class="modal fade" id="productoModal" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="productoModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="nuevoModalLabel">Registro de Productos:</h1>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="guardardatos.php" method="post" enctype="multipart/form-data">
					<input type="text" name="guardar_form" value="4" hidden>
					<div class="mb-3">
						<label for="cod_prod" class="form-label">Código del producto:</label>
						<input type="text" class="form-control" id="cod_prod" name="cod_prod" placeholder="Ejm: TP001" required>
					</div>
					<div class="mb-3">
						<label for="nom_prod" class="form-label">Producto:</label>
						<input type="text" class="form-control" id="nom_prod" name="nom_prod" required>						
					</div>
					<div class="mb-3">
						<label for="estado_producto" class="form-label">Estado:</label>
				    <select class="form-select" id="estado_producto" name="estado_producto" >
				      <option selected value="1">Activo</option>
				      <option value="0">Inactivo</option>
				    </select>
				  </div>
				  <button type="submit" class="btn btn-primary" name="guardar"><i class="fa-solid fa-save"></i> Guardar Datos</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
</div>
		</div>
	</div>

				<div class="card card-body">
				<form action="../guardardatosx.php" method="post" id="form_productos">
					<h3>Registro de Productos</h3><br>
					<input type="text" name="guardar_form" value="4" hidden>
					<label class="form-label " for="cod_prod">Código del producto:</label>
					<div class="form-outline mb-4 col-md-4">
						<input type="text" name="cod_prod" class="form-control " placeholder="Ejm: TP001" >
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
