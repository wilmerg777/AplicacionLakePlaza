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