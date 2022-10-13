<?php
	include('includes/header.php');

	if (isset($_GET['maestro'])) {

		$Tip_form_maestro=$_GET['maestro'];


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


	function mostrar_maestro($Tip_form_maestro){

		$form_contrato="";
	}
?>

<div class="container-fluid">
  ...
</div>


