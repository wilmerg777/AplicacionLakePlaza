<?php

	include("sesion.php");
	include("includes/header.php");
	include("db.php");
?>

<div class="container p-4 ">
		<?php include('list_contratos.php') ?>
	<br>
	<br>
	<br>
<hr>
</div>
<main class="container">
	<div class="d-flex justify-content-center ">
	    <!-- https://www.chartgo.com/get.do?id=6ea839110e  -->
	    <a href="#"> <img src="https://www.chartgo.com/embed.do?id=6ea83911aa" title="CM 2023" alt="Cobranza CM" border="0" /></a><br/>
	</div>
	<div class="d-flex justify-content-center">
		<p><img src="images/Bcv.png" width="200" height="200" alt="Tasa BCV"></p>
	</div>
	<div class="input-group md-3">
  <label class="input-group-text" for="inputGroupSelect01">Opciones...</label>
  <select class="form-select" id="inputGroupSelect01">
    <option selected>Elija una...</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
  </select>
</div>

</main>

<?php  include("includes/footer.php"); ?>

