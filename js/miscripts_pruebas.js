const valor1 = {
	nombre : 'Wilmer',
	apellido: 'Garcia',
	//mensaje: alert("hola")
}

//let esqVenta = document.getElementsById('esq_venta')

let esqVenta = document.getElementById('esq_venta');
console.log(esqVenta)

console.log(valor1['apellido'])

function mostrar_puntos(){

	let total_puntos = document.querySelector('#tot_puntos')

	console.log('en funcion');
	console.log(total_puntos.value);
/*	console.log('en funcion 2');
	console.log(total_puntos.innerText);
	console.log('en funcion 3');
	console.log(total_puntos);
	console.log('en funcion 4');
	console.log(total_puntos.classList);*/

	esqVenta.classList.add('bg-success');

}

function saliendo_foco_input(){

	let total_puntos = document.querySelector('#tot_puntos')

	esqVenta.classList.remove('bg-success');

}

function haciendoClic(e){
	console.log(e.target.innerText)
	alert(e.target.innerText)
}



