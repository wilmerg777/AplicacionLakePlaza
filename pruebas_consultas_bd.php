<?php
	include('db.php');

		$valor =	$_POST['valor'];
		$campo =	$_POST['elemento'];

		$sql = "select cod_afil_natu,nombre_afil_natu,apellido_afil_natu from
		 afiliados_natu where cod_afil_natu like ? order by 1";
		$resultado = $conn->prepare($sql);

		if (!$resultado) {

		} elseif (!$resultado->execute([$valor])) {
		} else {
	    // Si la consulta se ejecuta correctamente
			$row = $resultado->fetchall(PDO::FETCH_ASSOC);
			printf(json_encode($row));
		}


 ?>