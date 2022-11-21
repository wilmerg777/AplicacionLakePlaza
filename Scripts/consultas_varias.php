<?php
	include("db.php");


	function cargar_inputs($tabla, $campos, $label,$name,$conn){
			$query = "select * from ".$tabla;
			$resultado = $conn->prepare($query);
			$resultado->execute();
			$codigo = $label.'<br>';

			$codigo= $codigo.'<select name="'.$name.'" id="'.$name.'">.\n';
			$codigo= $codigo.'<option  selected value= "0">Seleccione un registro...</option>'."/n";

			while ( $fila = $resultado->fetch(PDO::FETCH_ASSOC)){
				$codigo = $codigo.'<option value= "'.$fila[$campos[0]].'">'.$fila[$campos[0]].'-'.$fila[$campos[1]].'</option>'."/n";
			}
			$codigo = $codigo."</select>\n";
			return  $codigo;
		}

		function cargar_inputs_update($tabla, $campos, $label,$name, $conn){
			$query = "select * from ".$tabla ;
			$resultado = $conn->prepare($query);
			$resultado->execute();
			$codigo = $label.'<br>';

			$codigo= $codigo.'<select name="'.$name.'" id="'.$name.'">.\n';
			$codigo= $codigo.'<option  selected value= "0">Seleccione un registro...</option>'."/n";

			while ( $fila = $resultado->fetch(PDO::FETCH_ASSOC)){
				$codigo = $codigo.'<option value= "'.$fila[$campos[0]].'">'.$fila[$campos[0]].'-'.$fila[$campos[1]].'</option>'."/n";
			}
			$codigo = $codigo."</select>\n";
			return  $codigo;
		}

		if (isset($_POST['campo'])) {
			$cedula =	$_POST['campo'];
			$sql = "select cod_afil_natu,nombre_afil_natu,apellido_afil_natu from
			 afiliados_natu where cod_afil_natu like ? order by 1";

			$resultado = $conn->prepare($sql);
			$resultado->execute([$cedula. "%"]);

			$html = "";

			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)){
			    $html .= "<li>".$row['cod_afil_natu']." - ".$row['nombre_afil_natu']."</li>";
			}
			echo json_encode($html, JSON_UNESCAPED_UNICODE);
		}

?>