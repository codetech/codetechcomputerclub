<?php echo $this->element('tinymce'); ?>

<?php echo $this->Form->create('Post'); ?>
	<fieldset>
		<?php if ($this->action === 'add'): ?>
			<legend>Add Resource</legend>
		<?php elseif ($this->action === 'edit'): ?>
			<legend>Edit Resource</legend>
		<?php endif; ?>
		<?php
			if ($this->action === 'edit') {
				echo $this->Form->hidden('id');
			}
			echo $this->Form->input('title', array(
				'type' => 'text'
			));
			echo $this->Form->input('content', array(
				'type' => 'textarea',
				'class' => 'tinymce',
				// See project_form for details on this argument.
				'required' => false
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
			echo $this->Form->input('project_id', array(
				'class' => 'select',
				'empty' => array(null => 'No Project')
			));
		?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
