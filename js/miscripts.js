let d = document;
let now = new  Date().toLocaleDateString('es-ve', { weekday:"long", year:"numeric", month:"short", day:"numeric"});
console.log('entrando: '+now);
// console.log(d);

d.addEventListener('focusout',(e)=>{
	//console.log(e.target.name)
	let elemento = e.target;
	if (elemento.id.substring(0,11)=='ced_titular')
		// console.log(elemento.id.substring(0,11))
		// let cedula_tit = 'ced_titular'+elemento.id.substring(11);
		// let nom_tit = 'nom_titular'+elemento.id.substring(11)
		// let ape_tit = 'ape_titular'+elemento.id.substring(11)
		// getCedula(elemento.value,cedula_tit,nom_tit,ape_tit)
		//console.log(elemento.value + " elemento disparador");


	if (elemento.id=='contrato')
		retorna_contrato(elemento.value)
},false);

/*d.addEventListener('click',(e)=>{
	let elemento = e.target;
	if (elemento.id==='avisos') {
		alert('Funcion en construcción');
	}

	if (elemento.id==='guardar_contrato') {
		alert('Verificar todos los campos del formulario');
		e.preventDefault();
	}

});*/


function retorna_contrato(valor){

	let nuevo_contrato = valor ;


	if (nuevo_contrato.length>7 || nuevo_contrato.length<6 || nuevo_contrato.length==0) {
		
		document.getElementById('contrato').classList.add('bg-warning')
		document.getElementById('contrato').value="";
		document.getElementById('contrato').focus;
	}else {
		document.getElementById('contrato').classList.remove('bg-warning')
		document.getElementById('contrato').classList.add('bg-primary'  , 'text-white')
	}
}


function getCedula(cedula,cedula_tit,nom_tit,ape_tit){

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
			
			document.getElementById(nom_tit).value=(data[0].nombre_afil_natu)
			document.getElementById('ape_titular1').value=(data[0].apellido_afil_natu)
			document.getElementById('ced_titular2').focus()
		
	})
	.catch(err => console.log(err))

}


if (!!document.getElementById('form_contratos')) {
	const formContratos = document.getElementById('form_contratos');

	formContratos.addEventListener('submit', e => {
		e.preventDefault();
		const data = Object.fromEntries(
				new FormData(e.target)
			)
		alert(JSON.stringify(data))
	});
}