<?php if (count($alert) > 0): ?>
		<?php foreach ($error as $alerts): ?>
			<?php echo '<script>swal("","'.$alerts.'","error");</script>'; ?>
		<?php endforeach ?>
<?php endif ?>	