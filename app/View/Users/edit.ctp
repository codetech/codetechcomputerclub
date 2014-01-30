<?php $this->extend('/Common/two_column_with_sidebar'); ?>

<?php echo $this->element('tinymce'); ?>

<section>
	<p>
		To change your picture, register at <a href="http://gravatar.com/emails/">Gravatar</a> with the same email you used here, upload an image, and select it.
	</p>
</section>

<section>
	<?php echo $this->element('user_form'); ?>
</section>

<section>
	<h2>Actions</h2>
	<ul>
		<li><?php echo $this->Html->link('Change Password', array('action' => 'change_password', $this->Form->value('User.id'))); ?></li>
		<?php if ($isAdmin): ?>
			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
		<?php endif; ?>
	</ul>
</section>
