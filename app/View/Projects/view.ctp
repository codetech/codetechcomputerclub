<?php $this->extend('/Common/two_column_with_sidebar'); ?>

<?php echo $this->element('highlightjs'); ?>

<section>
	<h2><?php echo h($project['Project']['title']); ?></h2>
	<h3><?php echo h($project['Project']['excerpt']); ?></h3>
	<table class="bordered-table wide">
		<tr>
			<th>Start Date</th>
			<th>Last Updated</th>
			<th>Creator</th>
			<th>Status</th>
		</tr>
		<tr>
			<td><?php echo $this->Time->format('M j, Y', $project['Project']['started']); ?></td>
			<td><?php echo $this->Time->format('M j, Y', $project['Project']['modified']); ?></td>
			<td><?php echo $this->Html->link($project['User']['name'], array('controller' => 'users', 'action' => 'view', $project['User']['id'])); ?></td>
			<td><?php echo h($project['Project']['status']); ?></td>
		</tr>
		<tr>
			<th colspan="3">Subscribed Members</th>
			<td rowspan="2">
			<?php if ($isSubscribed): ?>
				<?php echo $this->Form->create(null, array('url' => array('controller' => 'projects', 'action' => 'unsubscribe'))); ?> 
				<?php echo $this->Form->submit('Unsubscribe', array('class' => 'button-small gray')); ?> 
			<?php else: ?>
				<?php echo $this->Form->create(null, array('url' => array('controller' => 'projects', 'action' => 'subscribe'))); ?> 
				<?php echo $this->Form->submit('Subscribe', array('class'=>'button-small')); ?> 
			<?php endif;?>
			<?php echo $this->Form->hidden(null, array('value' => $project['Project']['id'])); ?>
			<?php echo $this->Form->end(); ?> 
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<?php if (!empty($subscribedUsers)): ?>
					<?php for ($i = 0, $j = count($subscribedUsers); $i < $j; $i++): ?>
						<?php $user = $subscribedUsers[$i]; ?>
						<?php echo $this->Html->link($user['name'], array('controller' => 'users', 'action' => 'view', $user['id'])); ?><?php if ($i !== $j - 1): ?>, <?php endif; ?>
					<?php endfor; ?>
				<?php else: ?>
					No subscribers yet!
				<?php endif; ?>
			</td>
		</tr>
	</table>
</section>

<section>
	<h2>Project Description</h2>
	<div class="echoed-html">
		<?php echo $project['Project']['content']; ?>
	</div>
</section>

<?php if (!empty($project['Post'])): ?>
	<section>
		<h2>Related Resources</h2>
		<ul>
			<?php foreach ($project['Post'] as $post): ?>
				<li><?php echo $this->Html->link($post['title'], array('controller' => 'posts', 'action' => 'view', $post['id'])); ?></li>
			<?php endforeach; ?>
		</ul>
	</section>
<?php endif; ?>

<section>
	<?php echo $this->element('comments', array(
		'comments' => $project['Comment'],
		'foreignKey' => 'project_id',
		'foreignKeyValue' => $project['Project']['id']
	)); ?>
</section>

<?php if ($isOwner || $isAdmin): ?>
	<section>
		<h2>Actions</h2>
		<ul>
			<li><?php echo $this->Html->link(__('Edit Project'), array('action' => 'edit', $project['Project']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete Project'), array('action' => 'delete', $project['Project']['id']), null, __('Are you sure you want to delete # %s?', $project['Project']['id'])); ?> </li>
		</ul>
	</section>
<?php endif; ?>
