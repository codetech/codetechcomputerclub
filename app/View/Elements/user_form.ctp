<?php if ($this->action === 'edit'): ?>
	<?php echo $this->element('tinymce'); ?>
<?php endif; ?>

<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<?php if ($this->action === 'add'): ?>
			<legend>Join codeTech Now!</legend>
			<span>
				Fields marked with "*" are required.
			</span>
		<?php elseif ($this->action === 'edit'): ?>
			<legend>Edit User</legend>
		<?php endif; ?>
		<?php
			if ($this->action === 'edit') {
				echo $this->Form->hidden('id');
			}
			if ($isAdmin) {
				echo $this->Form->input('position');
				echo $this->Form->input('admin');
			}
			echo $this->Form->input('name', array(
				'label' => ($this->action === 'add' ? 'Full Name *' : 'Full Name')
			));
			echo $this->Form->input('email', array(
				'label' => ($this->action === 'add' ? 'Email *' : 'Email')
			));
			if ($this->action === 'add') {
				echo $this->Form->input('password', array(
					'label' => 'Password *'
				));
			}
			echo $this->Form->input('studentid', array(
				'label' => 'MCC Student ID'
			));
			echo $this->Form->input('phone', array(
				'label' => 'Phone Number'
			));
			echo $this->Form->input('Gateway', array(
				'label' => 'Carrier (select up to 5)',
				'empty' => array(null => 'None')
			));
			echo $this->Form->input('receiveemail', array(
				'label' => 'Receive Emails',
				'checked' => ($this->action === 'add' ? true : null)
			));
			echo $this->Form->input('receivesms', array(
				'label' => 'Receive SMS Texts',
				'checked' => ($this->action === 'add' ? true : null)
			));
			if ($this->action === 'edit') {
				echo $this->Form->input('profile', array(
					'label' => '"About Me" Profile Text',
					'type' => 'textarea',
					'class' => 'tinymce'
				));
			}
		?>
	</fieldset>
<?php echo $this->Form->end('Submit'); ?>
