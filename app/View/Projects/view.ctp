<?php $this->extend('/Common/two_column_with_sidebar'); ?>

<?php echo $this->element('highlightjs'); ?>

<section>
	<h2><?php echo h($project['Project']['title']); ?></h2>
	<h3><?php echo h($project['Project']['excerpt']); ?></h3>
	<table class="bordered-table">
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
			<th colspan="4">Involved Members</th>
		</tr>
		<tr>
			<td colspan="4">
				<?php if (isset($users)): ?>
					<?php for ($i = 0, $j = count($users); $i < $j; $i++): ?>
						<?php $user = $users[$i]; ?>
						<?php echo $this->Html->link($user['name'], array('controller' => 'users', 'action' => 'view', $user['id'])); ?><?php if ($i !== $j - 1): ?>, <?php endif; ?>
					<?php endfor; ?>
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
