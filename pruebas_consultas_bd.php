<?php
	include('db.php');

		$valor =	$_POST['valor'];
		$campo =	$_POST['elemento'];

		$sql = "select * from afiliados_natu  order by 1";
		$resultado = $conn->prepare($sql);
<<<<<<< HEAD
		if (!$resultado) {
		    echo "Hay problemas en el script de la consulta";       // Si la preparación de la consulta falla
		} elseif (!$resultado->execute([$valor])) {
		    

		   echo "Hay problemas en el script de la consulta"; 
=======

		if (!$resultado) {

		} elseif (!$resultado->execute([$valor])) {
		} else {
	    // Si la consulta se ejecuta correctamente
			$row = $resultado->fetchall(PDO::FETCH_ASSOC);
			printf(json_encode($row));
		}
>>>>>>> 28070544f5b98f0483c5002179011753dcf32853

		} else {
		    
		    // Si la consulta se ejecuta correctamente
			$row = $resultado->fetchall(PDO::FETCH_ASSOC);
			printf(json_encode($row));
		}
		

 ?>