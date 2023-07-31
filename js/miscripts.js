let now = new  Date().toLocaleDateString('es-ve', { weekday:"long", year:"numeric", month:"short", day:"numeric"});
console.log('entrando: '+ now);

inpuntsContrato = document.querySelectorAll('form[id="form_contratos"] input');

inpuntsContrato.forEach( (e)=> {
	// console.log(e.id);

});

const validarInput = (e)=>{
	//console.log(e.target.id);
	let campoValidar = e.target.id;
	let campoValor = e.target.value;
	switch (campoValidar) {
		case 'contrato':
				console.log("Validando "+  e.target.id + " " + campoValor);
				retorna_contrato(e);
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

inpuntsContrato.forEach(e =>{
	e.addEventListener('focusout', validarInput);
	
});

function retorna_contrato(e){

	let nuevo_contrato = e.target.value ;
	if (nuevo_contrato.length>7 || nuevo_contrato.length<6 || nuevo_contrato.length==0) {
			e.target.classList.add('bg-warning')
			e.target.classList.remove('bg-primary'  , 'text-white')
			e.target.value=""
			e.target.focus;
	}else {

		e.target.classList.remove('bg-warning')
		e.target.classList.add('bg-primary'  , 'text-white');

		//buscar si existe el numero de contrato

	}
}


function getCedula(valCedula, elemento){


	let ced = valCedula

	let lista = document.getElementById('lista')

	let cod_php = "verificar_campo.php"
	let formData = new FormData()

	formData.append('elemento', elemento)
	formData.append('valor', ced)

	fetch(cod_php, {
		method: "POST",
		body: formData,
		mode: "cors"
	}).then(response => response.json())
	.then(data=> {
		if (elemento=="ced_titular1") {
			document.getElementById('nom_titular1').value=(data.nombre_afil_natu)
			document.getElementById('ape_titular1').value=(data.apellido_afil_natu)
			document.getElementById('ced_titular2').focus()
		} else {
			document.getElementById('nom_titular2').value=(data.nombre_afil_natu)
			document.getElementById('ape_titular2').value=(data.apellido_afil_natu)
			document.getElementById('tot_puntos').focus()
		}		
	})
	.catch(err => console.log("El error encontrado es: " + err))
}


if (!!document.getElementById('form_contratos')) {
	const formContratos = document.getElementById('form_contratos');

	formContratos.addEventListener('submit', e => {
		e.preventDefault();
		console.log("Datos enviados!");
	});
}