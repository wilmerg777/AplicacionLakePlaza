

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


function verificar_cedula(){

	if (document.getElementById('ced_titular1')) {

		let cedula1 = document.getElementById('ced_titular1').value
		let cod_php = "verificar_cedula.php"
		let formData = new FormData();

		formData.append('campo', cedula1)


		fetch(cod_php, {
			method: "POST",
			body: formData,
			mode: "cors"
		}).then(response => response.json())
		.then(data => {
			lista.style.display = 'block'
			lista.innerHTML = data
		})
		.catch(err => console.log(err))

	}

}
