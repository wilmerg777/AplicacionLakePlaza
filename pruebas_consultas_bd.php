<?php
	include('db.php');

		$valor =	$_POST['valor'];
		$campo =	$_POST['elemento'];

		$sql = "select * from afiliados_natu  order by 1";
		$resultado = $conn->prepare($sql);

		if (!$resultado) {
		    echo "Hay problemas en el script de la consulta";       // Si la preparación de la consulta falla
		} elseif (!$resultado->execute([$valor])) {
		    

		   echo "Hay problemas con el resultado que devuelve la consulta"; 

		} else {
	    // Si la consulta se ejecuta correctamente
			$row = $resultado->fetch(PDO::FETCH_ASSOC);
			printf(json_encode($row));
		}
		

 ?>
