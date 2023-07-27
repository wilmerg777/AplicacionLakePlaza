
function haciendoClic(e){
	//console.log(e.target.innerText)
	alert(e.target.innerText)
	let cedulawil = document.getElementById('ced_titular1').value;

	const datos = new FormData();

	datos.append("valor", cedulawil);
	datos.append("elemento", "ced_titular1");

	fetch('pruebas_consultas_bd.php',{
		method: 'POST', // *GET, POST, PUT, DELETE, etc.
    mode: 'cors', // no-cors, *cors, same-origin
    cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
    credentials: 'same-origin', // include, *same-origin, omit
    // headers: {
    //   'Content-Type': 'application/json'
    //   // 'Content-Type': 'application/x-www-form-urlencoded',
    // },
    redirect: 'follow', // manual, *follow, error
    referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
    body: datos // body data type must match "Content-Type" header
  
	})
	.then((respuesta) => respuesta);
	//.then((valores) => {console.log(valores)});

}

