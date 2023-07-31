
function haciendoClic(e){

	const elementoClicado = e.target;
	console.log(elementoClicado);



	const datos = new FormData();


	datos.append("valor", elementoClicado.value);
	datos.append("elemento", elementoClicado);

	// fetch('pruebas_consultas_bd.php',{
	// 	method: 'POST', // *GET, POST, PUT, DELETE, etc.
  //   mode: 'cors', // no-cors, *cors, same-origin
  //   cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
  //   credentials: 'same-origin', // include, *same-origin, omit
  //   // headers: {
  //   //   'Content-Type': 'application/json'
  //   //   // 'Content-Type': 'application/x-www-form-urlencoded',
  //   // },
  //   redirect: 'follow', // manual, *follow, error
  //   referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
  //   body: datos // body data type must match "Content-Type" header
  
	// })
	// .then((respuesta) => respuesta);
	//.then((valores) => {console.log(valores)});

}

