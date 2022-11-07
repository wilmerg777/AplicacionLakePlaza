<?php
	include("db.php");


	function cargar_inputs($tabla, $campos, $label,$name,$conn){
			$query = "select * from ".$tabla;
			$resultado = $conn->prepare($query);
			$resultado->execute();
			$codigo = $label.'<br>';

			$codigo= $codigo.'<select name="'.$name.'" id="'.$name.'">.\n';
			$codigo= $codigo.'<option  selected value= "0">Seleccione un Operativo...</option>'."/n";

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
			$codigo= $codigo.'<option  selected value= "0">Seleccione un Operativo...</option>'."/n";

			while ( $fila = $resultado->fetch(PDO::FETCH_ASSOC)){
				$codigo = $codigo.'<option value= "'.$fila[$campos[0]].'">'.$fila[$campos[0]].'-'.$fila[$campos[1]].'</option>'."/n";
			}
			$codigo = $codigo."</select>\n";
			return  $codigo;
		}

?>