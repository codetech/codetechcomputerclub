<?php $this->extend('/Common/two_column_with_sidebar'); ?>

<?php echo $this->element('tinymce'); ?>

<section>
	<?php echo $this->element('user_form'); ?>
</section>

<?php if ($isAdmin): ?>
	<section>
		<h3>Actions</h3>
		<ul>
			<li><?php echo $this->Html->link(__('Change Password'), array('action' => 'change_password', $this->Form->value('User.id'))); ?></li>
			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
		</ul>
	</section>
<?php endif; ?>
