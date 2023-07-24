<?php
	include('db.php');
		$campo =	$_POST['campo'];
		$valor =	$_POST['valor'];
		print_r($campo,$valor);
		switch ($campo){
			case 'contrato':
				$sql = "select cod_afil_natu,nombre_afil_natu,apellido_afil_natu from
				 afiliados_natu where cod_afil_natu like $valor order by 1";
				$resultado = $conn->prepare($sql);
				$resultado->execute([$cedula]);
				$row = $resultado->fetchall(PDO::FETCH_ASSOC);
				printf(json_encode($row));
				break;
			case 'cedula':
				$sql = "select cod_afil_natu,nombre_afil_natu,apellido_afil_natu from
				 afiliados_natu where cod_afil_natu like $valor order by 1";
				$resultado = $conn->prepare($sql);
				$resultado->execute([$cedula]);
				$row = $resultado->fetchall(PDO::FETCH_ASSOC);
				printf(json_encode($row));
				break;
			case 'cedula':
				
				break;
			case 'cedula':
				
				break;
			case 'cedula':
				
				break;
			case 'cedula':
				
				break;

		}

 ?>