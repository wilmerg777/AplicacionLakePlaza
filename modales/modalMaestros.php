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

<div class="d-grid gap-2 d-md-flex justify-content-md-end <?php if ($Tip_form_maestro=='contrato' ) { echo $ocultar ; } ?>">
	<div class="col-4 justify-content-end me-md-5" >
		<button type="button" class="btn btn-primary m-2 " data-bs-toggle="modal" data-bs-target="#productoModal">
		  Nuevo Registro: <?php echo $cTitulo_modal ;?>
		</button>
	</div>
</div>

<div class="modal fade" id="productoModal" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="productoModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="nuevoModalLabel">Registro de: <?php echo $cTitulo_modal ;?> </h1>
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
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
