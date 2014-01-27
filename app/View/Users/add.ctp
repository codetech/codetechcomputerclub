<?php $this->extend('/Common/two_column_with_sidebar'); ?>

<section>
	<header>
		<h2>Join codeTech Computer Club!</h2>
		<h3>This is likely the smartest decision you will make all semester.</h3>
	</header>
	<p>
		Enter your info below to join our club. Your email will be used to login.<br>
		If you are not an MCC student, leave the "MCC Student ID" field blank.
	</p>
	<?php echo $this->Form->create('User'); ?>
		<fieldset>
			<legend><?php echo __('Join codeTech Now!'); ?></legend>
			<span>
				Fields marked with "*" are required.
			</span>
		<?php
			echo $this->Form->input('name', array(
				'label' => __('Full Name *')
			));
			echo $this->Form->input('email', array(
				'label' => __('Email *')
			));
			echo $this->Form->input('password', array(
				'label' => __('Password *')
			));
			echo $this->Form->input('studentid', array(
				'label' => __('MCC Student ID')
			));
			echo $this->Form->input('phone', array(
				'label' => __('Phone Number')
			));
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</section>
