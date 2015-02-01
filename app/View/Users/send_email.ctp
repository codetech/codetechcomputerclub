<?php $this->extend('/Common/two_column_with_sidebar'); ?>

<?php echo $this->element('tinymce', array(
    'remove_script_host' => false
)); ?>

<section>
	<?php echo $this->Form->create('Email'); ?>
		<fieldset>
			<legend>Send Email</legend>
			<p>
				This email will be sent to all users who have not opted-out
				of the newsletter.
			</p>
			<p>
				The system will attempt to send an HTML email, but some receipts will only accept a text one, so you must prepare two versions just in case.
			</p>
			<p>
				<strong>WARNING!!!</strong> This will take a long time. Do not refresh the page after submitting.
			</p>
			<?php
				echo $this->Form->input('title', array(
					'type' => 'text'
				));
				echo $this->Form->input('text_message', array(
					'label' => 'Text Message',
					'type' => 'textarea'
				));
				echo $this->Form->input('html_message', array(
					'label' => 'HTML Message',
					'type' => 'textarea',
					'class' => 'tinymce'
				));
			?>
		</fieldset>
	<?php echo $this->Form->end('Submit'); ?>
</section>
