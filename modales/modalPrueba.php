<?php echo "modal prueba"; ?>


		<button type="button" class="btn btn-primary m-2 " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
		  Nuevo Registro: <?php echo $cTitulo_modal ;?>
		</button>

		<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Título del modal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<?php 
        $label = '<span class="input-group-text" >Producto:</span>';
				$name = 'cod_prod_vta';
				$campos=array('cod_prod','nombre');
				$salida = cargar_selects('productos', $campos, $label, $name , $conn); 
				return $salida;
				 ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Comprendido</button>
      </div>
    </div>
  </div>
</div>