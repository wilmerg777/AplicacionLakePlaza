<?php

	function cargar_selects($tabla, $campos, $label,$name,$conn){
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

	function cargar_selects_update($tabla, $campos, $label,$name, $conn, $regActual){
		$query = "select * from ".$tabla ;
		$resultado = $conn->prepare($query);
		$resultado->execute();
		$codigo = $label.'<br>';

		$codigo.= '<select name="'.$name.'" id="'.$name.'">.\n';
		$codigo.= '<option  selected value= "0">Seleccione un registro...</option>'."/n";

		while ( $fila = $resultado->fetch(PDO::FETCH_ASSOC)){
			$selectActual = ($fila[$campos[0]]==$regActual) ? 'selected' : '';
			$codigo.= '<option value= "'.$fila[$campos[0]].'" '. $selectActual.'>'.$fila[$campos[0]].'-'.$fila[$campos[1]].'</option>'."/n";
		}
		$codigo .= "</select>\n";
		return  $codigo;
	}

?>