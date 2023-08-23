<?php if (!isset($_SESSION)) {
  session_start();
}
$usuario = "";
if (isset($_SESSION['usuario'])) {
  $usuario = $_SESSION['usuario'];
}
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

function getTasaBCV(){
  $conn = new PDO("mysql:host=localhost; dbname=lakeplaza", "root", "wilmer");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Activando el atributo que se encarga de gestionar los errores de conexion y/o respuesta de la BD
  
  $query = "select * from tasas where fecha_tasa = '".date('Y-m-d') ."'" ;
  $resultado = $conn->prepare($query);
  $resultado->execute();
  $row = $resultado->fetchColumn(5); // fetchColum(numero de columna)
  if (is_numeric($row)) {
    return $row;
  } else {          
  return false;
  }
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Registro de Contratos</title>
	<link rel="stylesheet" href="">
	<!-- BOOTSTRAP 5 -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- BOOTSTRAP 4
  <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">  
	-->
  <!--   <link rel="stylesheet" href="css/bootstrap.min_lake.css">
  FONT AWESOME -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <!-- ICON AWESOME -->
  <link rel="stylesheet" href="css/all.min.css" >
  <!-- Estilos propios -->  
  <link rel="stylesheet" href="css/estilo_propio.css" >
  <!-- Icon page -->
	<link rel="icon"  href="images/logo_lake.ico">

</head>
<body>
	<nav class="navbar navbar-expand-lg bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="index.php">Consorcio Lake Plaza</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http:\\www.lakeplaza.com" target="_blanck">Sitio WEB</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Registro
          </a>
          <ul class="dropdown-menu">
          	<li><a class="dropdown-item" href="registro_datos_maestros.php?maestro=contrato">Contratos</a></li>
            <li><a class="dropdown-item" href="registro_datos_maestros.php?maestro=afilnat">Afiliado Natural</a></li>
            <li><a class="dropdown-item" href="registro_datos_maestros.php?maestro=afiljur">Afiliado Juridico</a></li>
            <li><a class="dropdown-item" href="registro_datos_maestros.php?maestro=producto">Productos</a></li>
            <li><a class="dropdown-item" href="registro_datos_maestros.php?maestro=operativo">Operativos</a></li>
            <li><a class="dropdown-item" href="registro_datos_maestros.php?maestro=prog_vtas">Programa Ventas</a></li>
            <li><a class="dropdown-item" href="registro_datos_maestros.php?maestro=condiciones_ventas">Condiciones de Ventas</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="registro_datos_maestros.php?maestro=usuarios " >Usuarios</a></li>
            <li><a class="dropdown-item" href="registro_datos_maestros.php?maestro=tasa " >Tasa BCV</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <?php
            if (isset($_SESSION['id_user'])) {
              $cerrar_sesion = "";
            }else{
              $cerrar_sesion = "disabled";
            }
           ?>
          <a class="nav-link <?php echo $cerrar_sesion ; ?>" href="cerrar_sesion.php">Cerrar sesion" <?php echo $usuario; ?>"</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Escriba lo que está buscando" aria-label="Search">
        <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-search"></i></button>
      </form>
    </div>
  </div>
	</nav>
  <div class="bg-primary text-white" align="center">Fecha: 
    <?php 
      echo date('d - m - Y') ;
      $tasaDelDia = getTasaBCV() ;
      if ($tasaDelDia) {
      echo " (Tasa BCV: **<b> ". $tasaDelDia." Bs.</b> **) </div>";
      }else{
      echo " (Tasa BCV: No asignada! <a class='actualiza_tasa' href='registro_datos_maestros.php?maestro=tasa'>ir</a> </div>";

      }

    ?>