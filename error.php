<?php if (count($error) > 0): ?>
	<div class="alert alert-danger w-50 mb-4" role="alert">
		<?php foreach ($error as $error): ?>
			<center><p><?php echo $error; ?></p></center>
		<?php endforeach ?>
	</div>
<?php endif ?>	