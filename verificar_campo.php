<?php
	include('db.php');

		$campo =	$_POST['elemento'];
		$valor =	$_POST['valor'];
		echo($campo );
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
				$row = $resultado->fetchall(PDO::FETCH_ASSOC);
				printf(json_encode($row));
				break;

		}

 ?>