<?php if (count($alert) > 0): ?>
		<?php foreach ($alert as $alerts): ?>
			<?php echo '<script>swal("","'.$alerts.'","success");</script>'; ?>
		<?php endforeach ?>
<?php endif ?>	