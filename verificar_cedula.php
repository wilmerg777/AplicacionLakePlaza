<?php
	include('db.php');
		$cedula =	$_POST['campo'];
		$sql = "select cod_afil_natu,nombre_afil_natu,apellido_afil_natu from
		 afiliados_natu where cod_afil_natu like ? order by 1";
		$resultado = $conn->prepare($sql);
		$resultado->execute([$cedula]);
		$row = $resultado->fetchall(PDO::FETCH_ASSOC);
		printf(json_encode($row));
 ?>