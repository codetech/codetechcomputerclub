<?php $this->extend('/Common/two_column_with_sidebar'); ?>

<section>
	<header>
		<h2><?php echo __('Projects'); ?></h2>
		<h3>Welcome to codeTech's Project Portfolio. Check out all the cool stuff we've been making!</h3>
	</header>
</section>

<?php for ($i = 0, $j = count($projects); $i < $j; $i++): ?>
	<?php $project = $projects[$i]; ?>
	<?php if ($i % 2 === 0): ?>
		<div class="row">
	<?php endif; ?>
			<div class="6u">
				<section>
					<b><?php echo h($project['Project']['title']); ?></b><br>
					<?php echo h($project['Project']['excerpt']); ?><br>
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $project['Project']['id'])); ?> 
					<?php if ($isAdmin): ?>
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $project['Project']['id'])); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $project['Project']['id']), null, __('Are you sure you want to delete # %s?', $project['Project']['id'])); ?>
					<?php endif; ?>
				</section>
			</div>
	<?php if ($i % 2 === 1 || ($j % 2 === 1 && $i === $j - 1)): ?>
		</div> <!-- End row -->
	<?php endif; ?>
<?php endfor; ?>

<div class="row">
	<div class="12u">
		<section>
			<div class="paging">
				<?php
					echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
					echo $this->Paginator->numbers(array('separator' => ''));
					echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
				?>
			</div>
			
			<?php if ($loggedIn): ?>
				<h3><?php echo __('Actions'); ?></h3>
				<ul>
					<li><?php echo $this->Html->link(__('New Project'), array('action' => 'add')); ?></li>
				</ul>
			<?php endif; ?>
		</section>
	</div>
</div>
