let now = new  Date().toLocaleDateString('es-ve', { weekday:"long", year:"numeric", month:"short", day:"numeric"});
console.log('entrando: '+ now);

const formContrato = document.querySelectorAll("#form_contratos input");

const validarInput = (e)=>{
	//console.log(e.target.id);
	let campoValidar = e.target.id;
	let campoValor = e.target.value;
	switch (campoValidar) {
		case 'contrato':
				console.log("Validando "+  e.target.id + " " + campoValor);
				retorna_contrato(e.target)
			break;
		case 'fch_venta':
				console.log("Validando " + e.target.id + " " + campoValor);
			break;
		case 'ced_titular1':
			console.log("Validando "+ e.target.id + " " + campoValor);
			getCedula(campoValor,campoValidar);
			break;
		case 'ced_titular2':
			console.log("Validando "+ e.target.id + " " + campoValor);
			getCedula(campoValor,campoValidar);
			break;
		default:
			console.log("Otro campo no especificado");
			// statements_def
			break;
	}
};

formContrato.forEach(e =>{
	e.addEventListener('focusout', validarInput);
	
});

document.getElementById('avisos').addEventListener('click',(e)=>{
	let elemento = e.target;
	if (elemento.id==='avisos') {
		alert('Funcion en construcción ');
	}

});

function retorna_contrato(e){
	console.log(e) ;
	let nuevo_contrato = e.value.trim() ;

	if (nuevo_contrato.length!=7 ) {
		
		e.classList.add('bg-warning')
			e.classList.remove('bg-primary'  , 'text-white')
			e.value=""
			e.focus;
	}else {
		e.classList.remove('bg-warning')
		e.classList.add('bg-primary'  , 'text-white');

	}
}


function getCedula(cedula, cualTitular){

	//let cedula1 = document.getElementById('ced_titular1').value
	let ced = cedula
	let lista = document.getElementById('lista')

	let cod_php = "verificar_campo.php"
	let formData = new FormData()

	formData.append('campo', cualTitular)
	formData.append('valor', ced)

	fetch(cod_php, {
		method: "POST",
		body: formData,
		mode: "cors"
	}).then(response => response.json())
	.then(data=> {
			if (cualTitular=="ced_titular1") {
				document.getElementById('nom_titular1').value=(data[0].nombre_afil_natu)
				document.getElementById('ape_titular1').value=(data[0].apellido_afil_natu)
				document.getElementById('ced_titular2').focus()
			} else {
				document.getElementById('nom_titular2').value=(data[0].nombre_afil_natu)
				document.getElementById('ape_titular2').value=(data[0].apellido_afil_natu)
				document.getElementById('tot_puntos').focus()
			}
		
	})
	.catch(err => console.log(err))

}
