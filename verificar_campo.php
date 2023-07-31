<?php
	include('db.php');

		$valor =	$_POST['valor'];
		$campo =	$_POST['elemento'];

		switch ($campo){
			case 'contrato':
				$sql = "select cod_afil_natu,nombre_afil_natu,apellido_afil_natu from
				 afiliados_natu where cod_afil_natu like ? order by 1";
				$resultado = $conn->prepare($sql);
				$resultado->execute([$valor]);
				$row = $resultado->fetchall(PDO::FETCH_ASSOC);
				printf(json_encode($row));
				break;

			case 'ced_titular1':
				$sql = "select cod_afil_natu,nombre_afil_natu,apellido_afil_natu from
				 afiliados_natu where cod_afil_natu like ? order by 1";
				$resultado = $conn->prepare($sql);
				$resultado->execute([$valor]);
				$row = $resultado->fetch();
				printf(json_encode($row));  // json_encode traduce cualquier cosa codificada en UTF-8 (salvo resources) de PHP a un string JSON
				break;
				
			case 'ced_titular2':
				$sql = "select cod_afil_natu,nombre_afil_natu,apellido_afil_natu from
				 afiliados_natu where cod_afil_natu like ? order by 1";
				$resultado = $conn->prepare($sql);
				$resultado->execute([$valor]);
				$row = $resultado->fetch(PDO::FETCH_ASSOC);
				printf(json_encode($row));
				break;

		}

 ?>