<?php $this->extend('/Common/two_column_with_sidebar'); ?>

<section>
	<h2><?php echo __('Members'); ?></h2>
	<table class="bordered-table">
		<tr>
			<th>Avatar</th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('position'); ?></th>
			<?php if ($isAdmin): ?>
				<th><?php echo $this->Paginator->sort('email'); ?></th>
				<th><?php echo $this->Paginator->sort('phone'); ?></th>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('studentid'); ?></th>
			<?php endif; ?>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($users as $user): ?>
			<tr>
				<td><?php echo $this->Html->image(h($this->Gravatar->getUrl($user['User']['email'])) . '&s=48', array(
					'alt' => $user['User']['name'] . '\'s avatar'
				)); ?><br></td>
				<td><?php echo h($user['User']['name']); ?></td>
				<td><?php echo h($user['User']['position']); ?></td>
				<?php if ($isAdmin): ?>
					<td><?php echo h($user['User']['email']); ?></td>
					<td><?php echo h($user['User']['phone']); ?></td>
					<td><?php echo h($user['User']['id']); ?></td>
					<td><?php echo h($user['User']['studentid']); ?></td>
				<?php endif; ?>
				<td>
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
					<?php if ($isAdmin): ?>
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
					<?php endif; ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	
	<div class="paging">
		<?php
			echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
			echo $this->Paginator->numbers(array('separator' => ''));
			echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		?>
	</div>
</section>
