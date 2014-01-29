<?php $this->extend('/Common/two_column_with_sidebar'); ?>

<section>
	<header>
		<h2>Resources</h2>
		<h3>This is our collection of software, tutorials, and other goodies. Everyone should contribute cool things that he finds!</h3>
	</header>
	
	<ul>
		<?php foreach ($posts as $post): ?>
			<li class="link-list">
				<?php echo $this->Time->format('M j, Y', $post['Post']['created']); ?>: <!---->
				<?php echo $this->Html->link(h($post['Post']['title']), array('action' => 'view', $post['Post']['id'])); ?> <!---->
				<?php if ($isAdmin): ?>
					(<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $post['Post']['id'])); ?> | <!---->
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $post['Post']['id']), null, __('Are you sure you want to delete # %s?', $post['Post']['id'])); ?>)
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
	</ul>
</section>

<section>
	<div class="paging">
		<?php
			echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
			echo $this->Paginator->numbers(array('separator' => ''));
			echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		?>
	</div>
</section>

<?php if ($loggedIn): ?>
	<section>
		<h2>Actions</h2>
		<ul>
			<li><?php echo $this->Html->link('Add Resource', array('action' => 'add')); ?></li>
		</ul>
	</section>
<?php endif; ?>
