<?php
	include('db.php');

		$valor =	$_POST['valor'];
		$campo =	$_POST['elemento'];

		if ($campo=="tasa") {
			$cMoneda =	$_POST['moneda'];
		}
		if ($campo=="condiciones_ventas") {
			$operativo =	$_POST['operativo'];
			$cMoneda =	$_POST['moneda'];
		}

		switch ($campo){
			case 'contrato':
				$sql = "select contrato from contratos where contrato = ? order by 1";
				$resultado = $conn->prepare($sql);
				$resultado->execute([$valor]);
				$row = $resultado->fetch(PDO::FETCH_ASSOC);
				printf(json_encode($row));
				break;

			case 'ced_titular1':
				$sql = "select cod_afil_natu,nombre_afil_natu,apellido_afil_natu from
				 afiliados_natu where cod_afil_natu = ? order by 1";
				$resultado = $conn->prepare($sql);
				$resultado->execute([$valor]);
				$row = $resultado->fetch(PDO::FETCH_ASSOC);
				printf(json_encode($row));

				break;
				
			case 'ced_titular2':
				$sql = "select cod_afil_natu,nombre_afil_natu,apellido_afil_natu from
				 afiliados_natu where cod_afil_natu = ? order by 1";
				$resultado = $conn->prepare($sql);
				$resultado->execute([$valor]);
				$row = $resultado->fetch(PDO::FETCH_ASSOC);
				printf(json_encode($row));
				break;

			case 'fch_venta':
				$fechaActual = date("Y-m-d",time());
				if ($valor<=$fechaActual) {
					printf(json_encode("validado"));
				}else{
					printf(json_encode("Invalido"));
				};
				break;

			case 'tasa':
				$sql = "select valor_m_alterna from tasas where fecha_tasa = ? and moneda_base = ? order by fecha_tasa";
				$resultado = $conn->prepare($sql);
				$resultado->execute([$valor,$cMoneda]);
				$row = $resultado->fetch(PDO::FETCH_ASSOC);
				printf(json_encode($row));
				break;

			case 'condiciones_ventas':
				$sql = "select puntos_ini, puntos_fin, monto_pto, mto_pto_comici, moneda, cuotas, tasa, descto_maximo, monto_gasto_admin
				from condiciones_ventas where producto = ? and operativo = ? and moneda = ? ";
				$resultado = $conn->prepare($sql);
				$resultado->execute([$valor,$operativo,$cMoneda]);
				$row = $resultado->fetch(PDO::FETCH_ASSOC);
				printf(json_encode($row));
				break;

		}

 ?>
