document.getElementById('ced_titular1').addEventListener("blur", getCedula)

document.getElementById('form_contratos')


function getCedula(){

	let cedula1 = document.getElementById('ced_titular1').value
	let lista = document.getElementById('lista')

console.log(lista)

	let cod_php = "verificar_cedula.php"
	let formData = new FormData()

	formData.append('campo', cedula1)

	fetch(cod_php, {
		method: "POST",
		body: formData,
		mode: "cors"
	}).then(response => response.json())
	.then(data => {
		console.log(data)
		lista.style.display = 'block'
		lista.innerHTML = data
	})
	.catch(err => console.log(err))

}


