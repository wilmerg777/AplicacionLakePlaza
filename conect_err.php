
<?php include("includes/header.php") ;

echo 'Error conectando la base de datos!!';
	?>
				<?php if (isset($_SESSION['message'])) { ?>
<div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
	<?= $_SESSION['message']?>
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
	</button>
</div>
<?php  } ?>