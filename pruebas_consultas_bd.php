<?php
	include('db.php');

		$valor =	$_POST['valor'];
		$campo =	$_POST['elemento'];


		switch ($campo) {
			case "contrato":
				$sql = "select contrato from contratos where contrato = ? order by 1";
				break;
			case "ced_titular1":
				$sql = "select contrato from contratos where cod_afil_natu = ? order by 1";
				break;
			case "ced_titular2":
				$sql = "select contrato from contratos where cod_afil_natu = ? order by 1";
				break;
			
			default:
				$sql = false;
				$row = '{respuesta: "vacia"}';
				break;
		}
	
		if (!$sql) {
			
		}else{
			$resultado = $conn->prepare($sql);

			if (!$resultado) {

			} elseif (!$resultado->execute([$valor])) {
			} else {
		    // Si la consulta se ejecuta correctamente
				$row = $resultado->fetchall(PDO::FETCH_ASSOC);
				//printf(json_encode($row));
			}
		}
		printf(json_encode($row));

 ?>