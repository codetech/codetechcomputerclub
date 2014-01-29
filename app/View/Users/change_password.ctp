<?php $this->extend('/Common/two_column_with_sidebar'); ?>

<section>
	<?php echo $this->Form->create('User'); ?>
		<fieldset>
			<legend>Change Password</legend>
		<?php
			echo $this->Form->hidden('id');
			echo $this->Form->input('current_password', array(
				'type' => 'password',
				'label' => 'Current Password'
			));
			echo $this->Form->input('password', array(
				'type' => 'password',
				'label' => 'New Password'
			));
		?>
		</fieldset>
	<?php echo $this->Form->end('Submit'); ?>
</section>
