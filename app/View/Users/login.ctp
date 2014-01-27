<?php $this->extend('/Common/two_column_with_sidebar'); ?>

<section>
	<?php echo $this->Form->create('User'); ?>
		<fieldset>
			<legend><?php echo __('Please enter your email and password.'); ?></legend>
			<?php
				echo $this->Form->input('email');
				echo $this->Form->input('password');
			?>
		</fieldset>
	<?php echo $this->Form->end(__('Login')); ?>
</section>
