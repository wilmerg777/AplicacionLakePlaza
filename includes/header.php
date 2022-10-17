<?php session_start(); 
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);?>
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
          <a class="nav-link active" aria-current="page" href="#">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http:\\www.lakeplaza.com" target="_blanck">Sitio WEB</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Registro
          </a>
          <ul class="dropdown-menu">
          	<li><a class="dropdown-item" href="registro_datos_maestros.php?maestro=<?php echo 'contrato' ?>">Contratos</a></li>
            <li><a class="dropdown-item" href="registro_datos_maestros.php?maestro=<?php echo 'afilnat' ?>">Afiliado Natural</a></li>
            <li><a class="dropdown-item" href="registro_datos_maestros.php?maestro=<?php echo 'afiljur' ?>">Afiliado Juridico</a></li>
            <li><a class="dropdown-item" href="registro_datos_maestros.php?maestro=<?php echo 'producto' ?>">Productos</a></li>
            <li><a class="dropdown-item" href="registro_datos_maestros.php?maestro=<?php echo 'cond_ventas' ?>">Condiciones de Ventas</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="login.php">Usuarios</a></li>
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
          <a class="nav-link <?php echo $cerrar_sesion ; ?>" href="cerrar_sesion.php">Cerrar sesion" <?php echo $_SESSION['usuario']; ?>"</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Escriba lo que está buscando" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
    </div>
  </div>
	</nav>