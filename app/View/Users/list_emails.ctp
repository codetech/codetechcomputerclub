<?php $this->extend('/Common/two_column_with_sidebar'); ?>

<section>
	<h2>Emails</h2>
	<?php foreach ($emails as $email): ?>
		<?php echo $email; ?>,
	<?php endforeach; ?>
</section>
