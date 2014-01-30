<?php $this->extend('/Common/two_column_with_sidebar'); ?>

<section>
	<header>
		<h2>Join codeTech Computer Club!</h2>
		<h3>This is likely the smartest decision you will make all semester.</h3>
	</header>
	<p>
		Enter your info below to join our club. Your email will be used to login.<br>
		If you are not an MCC student, leave the "MCC Student ID" field blank.<br>
		Select a carrier if you want to receive SMS text messages. Some carriers are listed more than once; hold CTRL to select all that seem relevant.
	</p>
	<?php echo $this->element('user_form'); ?>
</section>
