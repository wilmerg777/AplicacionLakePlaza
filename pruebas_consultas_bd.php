<?php
	include('db.php');

		$valor =	$_POST['valor'];
		$campo =	$_POST['elemento'];

		$sql = "select cod_afil_natu from afiliados_natu where cod_afil_natu = ? order by 1";
		$resultado = $conn->prepare($sql);

		if (!$resultado) {
		    echo "Hay problemas en el script de la consulta";       // Si la preparación de la consulta falla
		} elseif (!$resultado->execute([$valor])) {
		    

		   echo "Hay problemas en el script de la consulta"; 
		}

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