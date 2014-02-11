<?php $this->extend('/Common/two_column_with_sidebar'); ?>

<section>
	<header>
		<h2>Join codeTech Computer Club!</h2>
		<h3>This is likely the smartest decision you will make all semester.</h3>
	</header>
	<p>
		Enter your info below to join our club!<br>
		Select a carrier if you want to receive SMS text messages.<br>
		If you are not an MCC student, leave the "MCC Student ID" field blank.<br>
	</p>
	<?php echo $this->element('user_form'); ?>
</section>
