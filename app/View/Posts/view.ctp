<?php $this->extend('/Common/two_column_with_sidebar'); ?>

<?php echo $this->element('highlightjs'); ?>

<section>
	<h2><?php echo h($post['Post']['title']); ?></h2>
	Created: <?php echo $this->Time->format('M j, Y', $post['Post']['created']); ?> | Modified: <?php echo $this->Time->format('M j, Y', $post['Post']['modified']); ?> | Posted By: <?php echo $this->Html->link($post['User']['name'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?><br>
	<div class="echoed-html">
		<?php echo $post['Post']['content']; ?>
	</div>
</section>

<?php if (!empty($post['Project']) && $post['Project']['id'] !== null): ?>
	<section>
		<h2>Related Project</h2>
		<?php echo $this->Html->link($post['Project']['title'], array('controller' => 'projects', 'action' => 'view', $post['Project']['id'])); ?>
	</section>
<?php endif; ?>

<section>
	<?php echo $this->element('comments', array(
		'comments' => $post['Comment'],
		'foreignKey' => 'post_id',
		'foreignKeyValue' => $post['Post']['id']
	)); ?>
</section>

<?php if ($isOwner || $isAdmin): ?>
	<section>
		<h2>Actions</h2>
		<ul>
			<li><?php echo $this->Html->link(__('Edit Post'), array('action' => 'edit', $post['Post']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete Post'), array('action' => 'delete', $post['Post']['id']), null, __('Are you sure you want to delete # %s?', $post['Post']['id'])); ?> </li>
		</ul>
	</section>
<?php endif; ?>
