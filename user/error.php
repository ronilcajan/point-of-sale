<?php if (count($error) > 0): ?>
		<?php foreach ($error as $errors): ?>
			<?php echo '<script>swal("","'.$errors.'","error");</script>'; ?>
		<?php endforeach ?>
<?php endif ?>	
