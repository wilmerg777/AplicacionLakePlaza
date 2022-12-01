let d = document;
let now = new  Date().toLocaleDateString('es-ve', { weekday:"long", year:"numeric", month:"short", day:"numeric"});
console.log('entrando: '+now);
// console.log(d);

d.addEventListener('focusout',(e)=>{
	let elemento = e.target;
	if (elemento.id=='ced_titular1')
		getCedula(elemento.value)
		//console.log(elemento.value + " elemento disparador");

	if (elemento.id=='contrato')
		retorna_contrato(elemento.value)
},false);

d.addEventListener('click',(e)=>{
	let elemento = e.target;
	if (elemento.id==='avisos') {
		alert('Funcion en construcción');
	}

});

//document.getElementById('ced_titular1').addEventListener("blur", getCedula)

//document.getElementById('form_contratos')

function retorna_contrato(valor){

	let nuevo_contrato = valor ;
	console.log(nuevo_contrato.length) ;

	if (nuevo_contrato.length>7 || nuevo_contrato.length<6 || nuevo_contrato.length==0) {
		
		document.getElementById('contrato').classList.add('bg-warning')
		document.getElementById('contrato').value="";
		document.getElementById('contrato').focus;
	}else {
		document.getElementById('contrato').classList.remove('bg-warning')
		document.getElementById('contrato').classList.add('bg-primary'  , 'text-white')
	}
}


function getCedula(cedula){

	let prueba = fetch ('index.php')

	console.log(prueba);

	//let cedula1 = document.getElementById('ced_titular1').value
	let ced = cedula
	let lista = document.getElementById('lista')

	let cod_php = "verificar_cedula.php"
	let formData = new FormData()

	formData.append('campo', ced)

	fetch(cod_php, {
		method: "POST",
		body: formData,
		mode: "cors"
	}).then(response => response.json())
	.then(data=> {
		alert(data);
		document.getElementById('nom_titular1').value=(data[0].nombre_afil_natu)
		document.getElementById('ape_titular1').value=(data[0].apellido_afil_natu)

	})
	.catch(err => console.log(err))

}
