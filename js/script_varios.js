<script>
	function prueba1(id){
		$(document).ready(function() {
					//DeleteUser('lista_contratos');
		});

	}

	function prueba(id){
		$(document).ready(function() {
					DeleteUser('lista_contratos');
		});

	}

	function DeleteUser(id) {
	    var conf = confirm("¿Está seguro, realmente desea eliminar el registro?");
	    if (conf == true) {
	    	/*
	        $.post("list_contratos.php", {
	                id: id
	            },
	            function (data, status) {
	                // reload Users by using readRecords();
	                readRecords();
	            }
	        );
	        */
	    	$('#val_pto').val(4.55);
	    }
	}
</script>



function retorna_contrato(){
	if (document.getElementById('contrato').value.length>7 || document.getElementById('contrato').value.length<6) {
		
		document.getElementById('contrato').classList.add('bg-warning')
		document.getElementById('contrato').value="";
		document.getElementById('contrato').focus();
	}else {
		document.getElementById('contrato').classList.remove('bg-warning')
		document.getElementById('contrato').classList.add('bg-primary'  , 'text-white')
	}
}