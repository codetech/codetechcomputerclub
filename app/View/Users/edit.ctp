<?php $this->extend('/Common/two_column_with_sidebar'); ?>

<?php echo $this->element('tinymce'); ?>

<section>
	<?php echo $this->Form->create('User'); ?>
		<fieldset>
			<legend>Edit User</legend>
		<?php
			echo $this->Form->hidden('id');
			echo $this->Form->input('name', array(
				'type' => 'text'
			));
			echo $this->Form->input('email', array(
				'type' => 'email'
			));
			echo $this->Form->input('password', array(
				'type' => 'password'
			));
			echo $this->Form->input('studentid', array(
				'label' => 'MCC Student ID',
				'type' => 'text'
			));
			echo $this->Form->input('phone', array(
				'label' => 'Phone Number',
				'type' => 'text'
			));
			echo $this->Form->input('profile', array(
				'label' => '"About Me" Profile Text',
				'type' => 'textarea',
				'class' => 'tinymce'
			));
		?>
		</fieldset>
	<?php echo $this->Form->end('Submit'); ?>
</section>

<?php if ($isAdmin): ?>
	<section>
		<h3>Actions</h3>
		<ul>
			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
		</ul>
	</section>
<?php endif; ?>
