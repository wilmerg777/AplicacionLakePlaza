
<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE );

	$ocultar = 'd-none';
	if (isset($_SESSION['autoridad'])) { 
		$nivel_autoridad = $_SESSION['autoridad'];
		if ($nivel_autoridad <>1) {
			$desactivar="disabled";
		} else {
			$desactivar="";
		}
	}
?>


<div class="d-grid gap-2 d-md-flex justify-content-md-end ">
	<div class="col-4 justify-content-end me-md-5 <?php if ($Tip_form_maestro=='contrato' ) { echo $ocultar ; } ?> " >
		<button type="button" class="btn btn-primary m-2 " data-bs-toggle="modal" data-bs-target="#productoModal">
		  Nuevo Registro: <?php echo $cTitulo_modal ;?>
		</button>
	</div>
</div>
<div class="modal fade" id="productoModal" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="productoModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="nuevoModalLabel">Registro de: <?php echo $cTitulo_modal ;?> </h1>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="guardardatos.php" method="post" enctype="multipart/form-data">
					<?php echo inputsModal($cTitulo_modal,$conn) ?>
					<input type="text" name="cod_user" class="form-control " Value='<?php echo $_SESSION['id_user'] ?>' hidden>
				  <button type="submit" class="btn btn-primary" name="guardar"><i class="fa-solid fa-save"></i> Guardar Datos</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>


<?php

	function inputsModal($cuerpoModal,$conn){

		switch ($cuerpoModal) {
			case 'Producto':
				return $inputsModal = '
					<input type="text" name="guardar_form" value="4" hidden>
					<div class="mb-3">
						<span for="cod_prod" class="input-group-text">Código del producto:</span>
						<input type="text" class="form-control" id="cod_prod" name="cod_prod" placeholder="Ejm: TP001" required>
					</div>
					<div class="mb-3">
						<span for="nom_prod" class="input-group-text">Producto:</span>
						<input type="text" class="form-control" id="nom_prod" name="nom_prod" required>			
					</div>
					<div class="mb-3">
						<label for="estado_producto" class="form-label">Estado:</label>
				    <select class="form-select" id="estado_producto" name="estado_producto" >
				      <option selected value="1">Activo</option>
				      <option value="0">Inactivo</option>
				    </select>
				  </div>
				';

				break;

			case 'Programa de Venta':
				return $inputsModal = '
					<input type="text" name="guardar_form" value="5" hidden>
					<label class="form-label " for="cod_prog_vta">Código del Programa:</label>
					<div class="form-outline mb-4 col-md-4">
						<input type="text" name="cod_prog_vta" id="cod_prog_vta" class="form-control " placeholder="Ejm: IH001" >
					</div>
					<div class="form-outline mb-4 col-md-10 ">
						<label class="form-label " for="nom_prog_vta">Nomdre del programa:</label>
						<input type="text" name="nom_prog_vta" id="nom_prog_vta" class="form-control" placeholder="Ejm: IN HOUSE">
					</div>
					<div class="form-outline mb-4 col-md-4 ">
				    <label for="estado_programa" class="form-label">Estado</label>
				    <select class="form-select" id="estado_programa" name="estado_programa" >
				      <option selected value="1">Activo</option>
				      <option value="0">Inactivo</option>
				    </select>
					</div>';

				break;
			case 'Operativo':
				return $inputsModal = '
					<input type="text" name="guardar_form" value="8" hidden>
					<label class="form-label " for="cod_operativo">Código del Operativo:</label>
					<div class="form-outline mb-4 col-md-4">
						<input type="text" name="cod_operativo" id="cod_operativo" class="form-control " placeholder="Ejm: G0701" >
					</div>
					<div class="form-outline mb-4 col-md-10 ">
						<label class="form-label " for="nom_operativo">Nomdre del operativo:</label>
						<input type="text" name="nom_operativo" id="nom_operativo" class="form-control" placeholder="Ejm: GLOBAL 7 AÑOS">
					</div>
					<div class="form-outline mb-4 col-md-4 ">
				    <label for="estado_operativo" class="form-label">Estado</label>
				    <select class="form-select" id="estado_operativo" name="estado_operativo" >
				      <option selected value="1">Activo</option>
				      <option value="0">Inactivo</option>
				    </select>
					</div>
				';

				break;
			case 'Afiliado-Natural':
				return $inputsModal = '
					<input type="text" name="guardar_form" value="2" hidden>
					<label class="form-label " for="cod_afil_natu">Código del Afiliado (cédula):</label>
					<div class="form-outline mb-4 col-md-4">
						<input type="text" name="cod_afil_natu" class="form-control " placeholder="Ejm: 19.999.999" >
					</div>
					<div class="form-outline mb-4 col-md-10 ">
						<label class="form-label " for="nom_afil_natu">Nomdres:</label>
						<input type="text" name="nom_afil_natu" class="form-control " >
					</div>
					<div class="form-outline mb-4 col-md-10 ">
						<label class="form-label " for="ape_afil_natu">Apellidos:</label>
						<input type="text" name="ape_afil_natu" class="form-control " >
					</div>
					<div class="form-outline mb-4 col-md-10 ">
						<label class="form-label " for="fch_nat">Fecha de Nacimiento:</label>
						<input type="date" name="fch_nat" class="form-control " >
					</div>
					<div class="form-control mb-4">
						<label class="form-label" >Sexo:</label>
						<div>
						  <label class="form-check-label" for="F">
						    Femenino
						  <input class="form-check-input" type="radio" name="sexo_afil_natu" id="sexo_afil_natu_F" value="F">
						  </label><br>
							<label class="form-check-label" for="M">
								Masculino
						  <input class="form-check-input" type="radio" name="sexo_afil_natu" id="sexo_afil_natu_M" value="M">
						  </label>
						</div>
					</div>
					<div class="form-outline mb-4 col-md-10 ">
						<label class="form-label " for="pais_orig_afil_natu">Pais Origen:</label>
						<input type="text" name="pais_orig_afil_natu" class="form-control " >
					</div>
					<div class="form-outline mb-4 col-md-10 ">
						<label class="form-label " for="direccion_afil_natu">Direccion Hab.:</label>
						<input type="text" name="direccion_afil_natu" class="form-control " >
					</div>
					<div class="form-outline mb-4 col-md-10 ">
						<label class="form-label " for="cod_ciudad">Ciudad:</label>
						<input type="text" name="cod_ciudad" class="form-control " >
					</div>
					<div class="form-outline mb-4 col-md-10 ">
						<label class="form-label " for="telefonos">Telefonos:</label>
						<input type="text" name="telefonos" class="form-control " >
					</div>
					<div class="form-outline mb-4 col-md-4 ">
				    <label for="email_afil_natu" class="form-label">Email:</label>
						<input type="text" name="email_afil_natu" class="form-control " >
					</div>
				';

				break;
			case 'Afiliado-Jurídico':
				return $inputsModal = '
					<input type="text" name="guardar_form" value="3" hidden>
					<label class="form-label " for="cod_afil_jurid">Código de la Empresa (RIF):</label>
					<div class="form-outline mb-4 col-md-6">
						<input type="text" name="cod_afil_jurid" class="form-control " placeholder="Ejm: J-09999999-1" >
					</div>
					<div class="form-outline mb-4 col-md-10 ">
						<label class="form-label " for="nom_afil_jurid">Nombre:</label>
						<input type="text" name="nom_afil_jurid" class="form-control " >
					</div>
					<div class="form-outline mb-4 col-md-10 ">
						<label class="form-label " for="fch_reg">Fecha de Registro:</label>
						<input type="date" name="fch_reg" class="form-control " >
					</div>
					<div class="form-outline mb-4 col-md-10 ">
						<label class="form-label " for="registro_jurid">Registro:</label>
						<input type="text" name="registro_jurid" class="form-control " >
					</div>
					<div class="form-outline mb-4 col-md-10 ">
						<label class="form-label " for="tomo_reg">Tomo Registro:</label>
						<input type="text" name="tomo_reg" class="form-control " >
					</div>
					<div class="form-outline mb-4 col-md-10 ">
						<label class="form-label " for="direccion_afil_jurid">Dirección:</label>
						<input type="text" name="direccion_afil_jurid" class="form-control " >
					</div>
					<div class="form-outline mb-4 col-md-10 ">
						<label class="form-label " for="telefonos">Telefonos:</label>
						<input type="text" name="telefonos" class="form-control " >
					</div>
					<div class="form-outline mb-4 col-md-10 ">
				    <label for="email_afil_jurid" class="form-label">Email:</label>
						<input type="text" name="email_afil_jurid" class="form-control " >
					</div>
					<div class="form-outline mb-4 col-md-10 ">
						<label class="form-label " for="nom_representante">Nombre Representante:</label>
						<input type="text" name="nom_representante" class="form-control " >
					</div>
					<label class="form-label " for="ced_representante">Cédula Representante:</label>
					<div class="form-outline mb-4 col-md-6">
						<input type="text" name="ced_representante" class="form-control " placeholder="Ejm: 99.999.999" >
					</div>
				';

				break;

			case 'Condicion de Venta':

				$inputsx = '
								<input type="text" name="guardar_form" value="6" hidden>
						<label class="form-label " for="cod_cond_vta">Identificador de la condición:</label>
						<div class="form-outline mb-4 col-md-4 ">
							<input type="text" name="cod_cond_vta" class="form-control " placeholder="Ejm: TP001"  >
						</div>
						<div class="input-group  col-md-3 mb-sm-3">';
								$label = '<span class="input-group-text" >Producto:</span>';
								$name = 'cod_prod_vta';
								$campos=array('cod_prod','nombre');
						$inputsx .=		cargar_selects('productos', $campos, $label, $name , $conn); 
						$inputsx .='</div>
						<div class="input-group  col-md-3 mb-3 ">';

								$label1 = '<span class="input-group-text" >Operativo:</span>';
								$name1 = 'cod_oper_vta';
								$campos1=array('cod_oper','nombre_oper');
						$inputsx .= cargar_selects('operativos', $campos1, $label1, $name1 , $conn); 

						$inputsx .='</div>
						<div class="input-group  col-md-3 mb-3 ">
						  <span class="input-group-text">Ptos. Desde</span>
						  <div class="form-outline  col-md-4 ">
							  <input name="ptos_ini_vta" type="text" class="form-control " placeholder="000" >
							</div>
						</div>
						<div class="input-group  col-md-3 mb-sm-3 ">
							<span class="input-group-text">Ptos. hasta:</span>
							<div class="form-outline  col-md-4 ">
								<input type="text" name="ptos_fin_vta" class="form-control " placeholder="000">
							</div>
						</div>
						<div class="input-group  col-md-3 mb-sm-3 ">
							<span class="input-group-text">Precio Pto.</span>
							<div class="form-outline  col-md-4 ">
								<input type="text" name="precio_pto_vta" class="form-control" placeholder="0,00" >
							</div>
						</div>
						<div class="input-group  col-md-3 mb-sm-3 ">
							<span class="input-group-text">Precio Pto. Comisión:</span>
							<div class="form-outline  col-md-4 ">
								<input type="money" name="precio_pto_com" class="form-control " >
							</div>
						</div>
						<div class="form-outline mb-3 col-md-10 ">
							<label class="form-label " for="moneda_condic">Moneda:</label>
							<select name="moneda_condic" id="moneda_condic">
								<option value="US$" selected>US$</option>
								<option value="BS.">Bs.</option>
							</select>
						</div>
						<div class="input-group  col-md-3 mb-sm-3 ">
							<span class="input-group-text">Maximo de Cuotas:</span>
							<div class="form-outline  col-md-4 ">
								<input type="text" name="cuot_max_vta" class="form-control " >
							</div>
						</div>
						<div class="input-group mb-sm-3">
						  <span class="input-group-text">Gastos Adm.</span>
						  <span class="input-group-text">US$</span>
							<div class="form-outline  col-md-4 ">
								<input type="text" class="form-control" name="gastos_admin" placeholder="0.00" >
							</div>					  
						</div>
						<div class="input-group mb-sm-3">
						  <span class="input-group-text">Tipo Interes:</span>
						  <div class="form-outline  col-md-4 ">
								<input type="text" name="tip_interes" class="form-control " >
							</div>
						</div>
						<div class="input-group mb-sm-3">
						  <span class="input-group-text">Descuento:</span>
						  <div class="form-outline  col-md-4 ">
								<input type="text" name="%_desc_vta" class="form-control " placeholder="%" >
							</div>
						</div>'; 

				echo $inputsx;

				break;
			case 'Programa de Venta':
				'xxx
				';

				break;
			default:
				// code...
				break;
		}

	};
?>