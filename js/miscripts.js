document.getElementById('ced_titular1').addEventListener("blur", getCedula)

//document.getElementById('form_contratos')


function getCedula(){

	let cedula1 = document.getElementById('ced_titular1').value
	let lista = document.getElementById('lista')

	let cod_php = "verificar_cedula.php"
	let formData = new FormData()

	formData.append('campo', cedula1)

	fetch(cod_php, {
		method: "POST",
		body: formData,
		mode: "cors"
	}).then(response => response.json())
	.then(data=> {
		document.getElementById('nom_titular1').value=(data[0].nombre_afil_natu)
		document.getElementById('ape_titular1').value=(data[0].apellido_afil_natu)

	})
	.catch(err => console.log(err))

}


