<?php 
	include('sesion.php');
	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
?>

<div class="container">
	<div class="row col-md-8">
		<div class="card card-body">
			<form action="guardardatos.php" method="post">
				<input type="text" name="guardar_form" value="4" hidden>
	      <div class="form-outline col-md-4 ">
					<label class="form-label " for="cod_prod">Código del producto:</label>
					<input type="text" name="cod_prod" class="form-control " placeholder="Código producto" autofocus>
				</div>
				<div class="form-outline col-md-6 ">
					<label class="form-label " for="nom_prod">Nomdre del producto:</label>
					<input type="text" name="nom_prod" class="form-control " >
				</div>
				<div class="form-outline col-md-3 ">
			    <label for="estado_producto" class="form-label">Estado</label>
			    <select class="form-select" id="estado_producto" name="estado_producto" >
			      <option selected value="1">Activo</option>
			      <option value="0">Inactivo</option>
			    </select>
				</div>
				<input type="text" name="cod_user" class="form-control " Value='<?php echo $_SESSION['id_user'] ?>' >
				<div class="form-outline mb-4">
					<button type="submit" class="btn btn-primary btn-lg" name="guardarProd" >Guardar Datos</button>
				</div>				
			</form>
		</div>
	</div>
</div>