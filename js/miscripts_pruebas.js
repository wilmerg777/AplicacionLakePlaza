
function haciendoClic(e){
	console.log(e.target.innerText)
	//alert(e.target.innerText)

	let cedulawil = '9349312'

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
	.then((respuesta) => respuesta.json())
	.then((valores) => {console.log(valores)});

}


fetch("flores.jpg")
  .then(function (response) {
    if (response.ok) {
      response.blob().then(function (miBlob) {
        var objectURL = URL.createObjectURL(miBlob);
        miImagen.src = objectURL;
      });
    } else {
      console.log("Respuesta de red OK pero respuesta HTTP no OK");
    }
  })
  .catch(function (error) {
    console.log("Hubo un problema con la petición Fetch:" + error.message);
  });

