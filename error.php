<?php if (count($error) > 0): ?>
		<?php foreach ($error as $error): ?>
			<?php echo '<script>swal("","'.$error.'","error");</script>'; ?>
		<?php endforeach ?>
<?php endif ?>	