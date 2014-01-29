<?php $this->extend('/Common/two_column_with_sidebar'); ?>

<section>
	<?php echo $this->element('post_form'); ?>
</section>

<?php if ($isAdmin): ?>
	<section>
		<h3>Actions</h3>
		<ul>
			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Post.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Post.id'))); ?></li>
		</ul>
	</section>
<?php endif; ?>
