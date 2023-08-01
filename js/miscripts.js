let now = new  Date().toLocaleDateString('es-ve', { weekday:"long", year:"numeric", month:"short", day:"numeric"});
console.log('entrando: '+ now);

inpuntsContrato = document.querySelectorAll('form[id="form_contratos"] input');

inpuntsContrato.forEach((e)=>{
	e.addEventListener('blur',validarInput);
});

function validarInput(e){
	// console.log(e.target);
	let campoValidar = e.target.id;
	let campoValor = e.target.value;
	switch (campoValidar) {
		case 'contrato':
				//console.log("Validando "+  e.target.id + " " + campoValor);
				retorna_contrato(e.target,campoValor, campoValidar);
			break;
		case 'fch_venta':
				console.log("Validando "+ e.target.id + " " + campoValor);
				validFechaEmi(e.target,campoValor,campoValidar);
				break;
		case 'tasa':
			//console.log("Validando "+ e.target.id + " " + campoValor);
			//getTasa(campoValor,campoValidar);
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
			/*
		case 'tasa':
			console.log("Validando "+ e.target.id + " " + campoValor);
			getTasa(campoValor,campoValidar);
			break;
			
			
			ced_titular1
			nom_titular1
			ape_titular1
			ced_titular2
			nom_titular2
			ape_titular2
			tot_puntos
			val_pto
			pto_comici
			descuento_%
			monto_desc
			val_contrato
			mtto_anio1
			gastos_admin
			miscelaneos
			val_total
			ini_mesa
			ini_diferida
			cap_especial
			cap_normal
			val_contrato_finan
			ini_mesa_%
			ini_diferida_%
			cap_especial_%
			cap_normal_%
			val_contrato_%
			*/
	}
};

function retorna_contrato(e, a, b){

	let nuevo_contrato = e.value ;
	if (nuevo_contrato.length!=7) {
			e.classList.add('bg-warning', 'text-black')
			e.classList.remove('bg-primary'  , 'text-white')
			e.value=""
			e.focus;
	}else {

	let formData = new FormData()
	formData.append('valor', a)
	formData.append('elemento', b)

		//buscar si existe el numero de contrato
		let cod_php = "verificar_campo.php"	
		fetch(cod_php, {
			method:'POST',
			body: formData,
			mode: "cors"
			})
			.then(response => response.json())
			.then(data=>  { //no existe el contrato
				if (!data){
					e.classList.remove('bg-warning','bg-danger','text-white')
					e.classList.add('bg-primary'  , 'text-white');					
				}else{
					e.classList.remove('bg-warning','bg-primary','text-white')
					e.classList.add('bg-danger','text-white')
					e.focus;
				}
			})	;

	}
}

function validFechaEmi(e,a,b){
	console.log(a,Date.parse());
}

function getCedula(valCedula, elemento){

	// let lista = document.getElementById('lista')

	let cod_php = "verificar_campo.php"

	let formData = new FormData()
	formData.append('valor', valCedula)
	formData.append('elemento', elemento)

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
