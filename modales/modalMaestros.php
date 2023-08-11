
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productoModal">
  Launch demo modal x
</button>

<div class="modal fade" id="productoModal" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="productoModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="nuevoModalLabel">Registro de:</h1>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="guarda.php" method="post" enctype="multipart/form-data">
					<div class="mb-3">
						<label for="cod_producto" class="form-label">Código del producto:</label>
						<input type="text" class="form-control" id="cod_producto" name="cod_producto" required>
					</div>
					<div class="mb-3">
						<label for="producto" class="form-label">Producto:</label>
						<input type="text" class="form-control" id="producto" name="producto" required>						
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary"> Guardar cambios</button>
			</div>
		</div>
	</div>
</div>


