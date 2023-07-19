
let esqVenta = document.getElementById('esq_venta');

// console.log(esqVenta)


function mostrar_puntos(){

	let total_puntos = document.querySelector('#tot_puntos')

	// console.log('en funcion');
	// console.log(total_puntos.value);

	esqVenta.classList.add('bg-success');

}

function saliendo_foco_input(){

	let total_puntos = document.querySelector('#tot_puntos')

	esqVenta.classList.remove('bg-success');

}

