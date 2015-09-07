<?php $this->extend('/Common/two_column_with_sidebar'); ?>

<section>
	<h2>Emails</h2>
	<p>The following should make for a suitable CSV to import into MailChimp.</p>
	<p>
		<?php foreach ($data as $email => $name): ?>
		    <?php echo h($this->Csv->escapeField($name)); ?>,<?php echo h($this->Csv->escapeField($email)); ?><br/>
		<?php endforeach; ?>
	</p>
</section>
