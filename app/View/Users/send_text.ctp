<?php $this->extend('/Common/two_column_with_sidebar'); ?>

<section>
	<?php echo $this->Form->create('Email'); ?>
		<fieldset>
			<legend>Send Text</legend>
			<p>
				The following message will be texted to all users who have specified a carrier.
			</p>
			<?php
				echo $this->Form->input('text_message', array(
					'label' => 'Text Message',
					'type' => 'textarea'
				));
			?>
		</fieldset>
	<?php echo $this->Form->end('Submit'); ?>
</section>
