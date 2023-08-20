let now = new  Date().toLocaleDateString('es-ve', { weekday:"long", year:"numeric", month:"short", day:"numeric"});
console.log('entrando: '+ now);

inpuntsContrato = document.querySelectorAll('form[id="form_contratos"] input');


inpuntsContrato.forEach((e)=>{

	e.addEventListener('blur',validarInput);
});


if (document.getElementById('tot_puntos')) {
	totalPuntos = document.getElementById('tot_puntos');
	totalPuntos.addEventListener('focus',cargarCondiciones);
}

function validarInput(e){
	// console.log(e.target);
	let campoValor = e.target.value;
	let campoValidar = e.target.id;
	switch (campoValidar) {
		case 'contrato':
				//console.log("Validando "+  e.target.id + " " + campoValor);
				retorna_contrato(e.target,campoValor, campoValidar);
			break;
		case 'fch_venta':
				//console.log("Validando "+ e.target.id + " " + campoValor);
				validFechaEmi(e.target,campoValor,campoValidar);
				break;
		case 'tasa':
			const cMoneda = document.getElementById('moneda_condic_cont').value;
			const dFechaEmi = document.getElementById('fch_venta').value;

			if (cMoneda && dFechaEmi) {
				//getTasa(e.target,dFechaEmi,campoValidar,cMoneda);
			} else {
				alert("verifique fecha de emisión y moneda");
			}
			break;
		case 'ced_titular1':
			//console.log("Validando "+ e.target.id + " " + campoValor);
			getCedula(campoValor,campoValidar);
			break;
		case 'ced_titular2':
			//console.log("Validando "+ e.target.id + " " + campoValor);
			getCedula(campoValor,campoValidar);
			break;
		default:
			console.log("Otro campo no especificado");
			// statements_def
			break;
			/*
			Campos actualizables:

			descuento_%
			monto_desc
			val_contrato
			mtto_anio1
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

	let formData = new FormData()
	formData.append('valor', a)
	formData.append('elemento', b)

		//validar fecha igual o menor a la actual
		let cod_php = "verificar_campo.php"	
		fetch(cod_php, {
			method:'POST',
			body: formData,
			mode: "cors"
			})
			.then(response => response.json())
			.then(data=>  {  
					if(data=="validado"){ //fecha correcta
						e.classList.remove('bg-danger','text-black');						
						e.classList.add('bg-primary','text-white');
						getTasa(a);
					}else{
						e.classList.remove('bg-primary','text-white');
						e.classList.add('bg-danger','text-black');
						document.getElementById('tasa').value=0;
						document.getElementById('tasa').classList.remove('bg-primary','text-white');
					}
			})
			.catch(err=>console.log(err));
}

function getTasa(a){

	const e = document.getElementById('tasa')
	let formData = new FormData()
	formData.append('valor', a)
	formData.append('elemento', "tasa")
	formData.append('moneda', "US$")

		//validar tasa correspondiente a la fecha de emision
		let cod_php = "verificar_campo.php"	
		fetch(cod_php, {
			method:'POST',
			body: formData,
			mode: "cors"
			})
			.then(response => response.json())
			.then(data=>  { 
					if(data){
						e.classList.remove('bg-danger','text-black');						
						e.classList.add('bg-primary','text-white');
						e.value=(data.valor_m_alterna);
					}else{
						e.classList.remove('bg-primary','text-white');
						e.classList.add('bg-danger','text-black');
						e.value=0;
					}
			})
			.catch(err=>console.log(err));
}

function getCedula(valCedula, elemento){

	// let lista = document.getElementById('lista')

	let cod_php = "verificar_campo.php"

	let formData = new FormData();
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

function cargarCondiciones(){
	const productoCond  = document.getElementById('cod_prod_cont');
	const operativoCond = document.getElementById('cod_oper_cont');

	if (productoCond.value.length>1 && operativoCond.value.length>1) {

		let cod_php = "verificar_campo.php"
		let formData = new FormData();
		formData.append('valor', productoCond.value)
		formData.append('elemento', "condiciones_ventas")
		formData.append('operativo', operativoCond.value)
		formData.append('moneda', "US$")

		fetch(cod_php, {
			method: "POST",
			body: formData,
			mode: "cors"
		}).then(response => response.json())
		.then(data=> {
			document.getElementById('tot_puntos').value=(data.puntos_fin)
			document.getElementById('val_pto').value=(data.monto_pto)
			document.getElementById('pto_comici').value=(data.mto_pto_comici)
			document.getElementById('gastos_admin').value=(data.monto_gasto_admin)
			document.getElementById('val_contrato').value=((data.puntos_fin * data.monto_pto) + Number(data.monto_gasto_admin))
			document.querySelector('label[for="tot_puntos"]').innerHTML= "Total Puntos (Min: "+(data.puntos_ini)+")"
		})
		.catch(err => console.log("El error encontrado es: " + err))
	} else {
		alert("Debe seleccionar un producto y un operativo!")
	}
}

if (!!document.getElementById('form_contratos')) {
	const formContratos = document.getElementById('form_contratos');

	formContratos.addEventListener('submit', e => {
		e.preventDefault();
		console.log("Datos enviados!");
	});
}

function confirmar(mensaje){
	const respuesta =  confirm(mensaje) ;
	return respuesta;
}
