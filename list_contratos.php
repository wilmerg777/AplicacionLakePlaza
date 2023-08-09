<?php
	include("db.php");
?>

<div class="container py-3" name="lista_contratos" id="lista_contratos">
	<div class="row">
		<div class="d-flex justify-content-center bg-primary text-white " >
			<h2 >Contratos pendientes por procesar en el sistema STIL</h2>
		</div>
		<hr>
		<div class="row justify-content-end mx-0">
			<div class="col-auto justify-content-end">
				<a href="registro_datos_maestros.php?maestro=contrato" class="btn btn-dark mb-2"><i class="fa-solid fa-circle-plus"></i> Nuevo Contrato</a>
			</div>
		</div>

		<table class="table table-sm table-striped table-hover">
			<thead class="table-dark">
				<tr>
					<th >Contrato</th>
					<th >Emisión</th>
					<th >Sucursal</th>
					<th >Puntos</th>
					<th >Valor Pto.</th>
					<th >Estatus</th>
					<th >Observaciones</th>
					<th >En STIL</th>
					<th >Acción</th>
				</tr>
			</thead>
			<tbody class="table table-active">

					<?php 

						$sql="select contrato,emision,s.nombre_suc as sucursal,tot_ptos_cont,val_pto_cont,estatus,observaciones from contratos c inner join sucursales s on s.cod_suc=c.doc_suc_cont";

						$resultado = $conn->prepare($sql);
						$resultado->execute();
						
					while ( $fila = $resultado->fetch(PDO::FETCH_ASSOC)){ ?>
						<tr>
							<th ><?php echo $fila['contrato']  ?> </th>
							<th ><?php echo $fila['emision']  ?></th>
							<th ><?php echo $fila['sucursal']  ?></th>
							<th ><?php echo $fila['tot_ptos_cont']  ?></th>
							<th ><?php echo $fila['val_pto_cont']  ?></th>
							<th ><?php echo $fila['estatus']  ?></th>
							<th ><?php echo $fila['observaciones']  ?></th>
							<th ><input type="checkbox"></th>
							<th ><a href="#" type="button" class="btn btn-info"><i class="fas fa-edit"></i> Editar</a></th>
						</tr>
					<?php } ?>

			</tbody>
		</table>
	</div>
</div>
