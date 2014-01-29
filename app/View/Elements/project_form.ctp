<?php echo $this->element('tinymce'); ?>

<?php echo $this->Form->create('Project'); ?>
	<fieldset>
		<?php if ($this->action === 'add'): ?>
			<legend>Create Project</legend>
		<?php elseif ($this->action === 'edit'): ?>
			<legend>Edit Project</legend>
		<?php endif; ?>
		<?php
			if ($this->action === 'edit') {
				echo $this->Form->hidden('id');
			}
			echo $this->Form->input('title', array(
				'type' => 'text'
			));
			echo $this->Form->input('excerpt', array(
				'type' => 'text'
			));
			echo $this->Form->input('content', array(
				'type' => 'textarea',
				'class' => 'tinymce',
				// tinymce doesn't actually fill out the form until you submit,
				// but on some browsers you can't submit until all required
				// values have content. Catch-22. So this has to be false.
				'required' => false
			));
			echo $this->Form->input('started', array(
				'type' => 'date'
			));
			echo $this->Form->input('status', array(
				'type' => 'text'
			));
			echo $this->Form->input('icon', array(
				'type' => 'text'
			));
			echo $this->Form->input('priority', array(
				'type' => 'number'
			));
			echo $this->Form->input('slug', array(
				'type' => 'text',
				'placeholder' => 'this-will-appear-in-the-url'
			));
			echo $this->Form->input('published', array(
				'type' => 'checkbox',
				'checked' => 'true'
			));
			echo $this->Form->input('commentable', array(
				'type' => 'checkbox',
				'checked' => 'true'
			));
			echo $this->Form->input('User');
		?>
	</fieldset>
<?php echo $this->Form->end('Submit Project'); ?>
