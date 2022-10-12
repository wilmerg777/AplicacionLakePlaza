<?php
	include('includes/header.php');

	if (isset($_GET['maestro'])) {

		$Tip_form_maestro=$_GET['maestro'];

		function mostrar_maestro($Tip_form_maestro){
			switch ($Tip_form_maestro) {
		    case "contrato":
		        return $form_contrato ;
		        break;
		    case "afilnat":
		        echo "i es igual a 1";
		        break;
		    case "afiljur":
		        echo "i es igual a 1";
		        break;
		    case "producto":
		        echo "i es igual a 1";
		        break;
		    case "cond_ventas":
		        echo "i es igual a 2";
		        break;
				}
		}		
	}
?>
<?php
	mostrar_maestro('contrato');
	$form_contrato='
		<div class="container">
			<form action="guardar_maestro.php" method="POST">
				<div class="col-md-6 mb-4">
					<div class="form-outline">
						<label class="form-label" for="cod_prod">Código del Producto:</label>
						<input type="text" name="cod_prod" class="form-control">
					</div>
				</div>	
			</form>
		</div>';


?>