<?php $this->extend('/Common/two_column_with_sidebar'); ?>

<?php echo $this->element('highlightjs'); ?>

<section>
	<h2><?php echo __('Member Profile'); ?>: <?php echo h($user['User']['name']); ?></h2>
	
	<?php echo $this->Html->image(h($gravatarUrl), array(
		'alt' => $user['User']['name'] . '\'s avatar'
	)); ?><br>
	
	<b><?php echo __('Name'); ?>:</b> <?php echo h($user['User']['name']); ?><br>
	<b><?php echo __('Position'); ?>:</b> <?php echo h($user['User']['position']); ?><br>
	<b><?php echo __('Member Since'); ?>:</b> <?php echo $this->Time->format('M j, Y', $user['User']['created']); ?><br>
	
	<h3><?php echo __('Contact Info'); ?></h3>
	<b><?php echo __('Email'); ?>:</b> 
	<?php echo $this->Html->image($emailImagePath, array(
		'alt' => $user['User']['name'] . '\'s email',
		'class' => 'middle'
	)); ?><br>
	<?php if (!empty($user['User']['phone'])): ?>
		<b><?php echo __('Phone'); ?>:</b> 
		<?php echo $this->Html->image($phoneImagePath, array(
			'alt' => $user['User']['phone'] . '\'s phone',
			'class' => 'middle'
		)); ?><br>
	<?php endif; ?>
	
	<?php if (!empty($user['User']['profile'])): ?>
		<b>About Me:</b><br>
		<div id="profile" class="echoed-html">
			<?php echo $user['User']['profile']; ?>
		</div><br>
	<?php endif; ?>
	
	<?php if (isset($projectsStarted)): ?>
		<h3><?php echo __('Projects I\'ve Started'); ?></h3>
		<ul>
			<?php foreach ($projectsStarted as $project): ?>
				<li><?php echo $this->Html->link(h($project['title']), array('controller' => 'projects', 'action' => 'view', $project['id'])); ?></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
	
	<?php if (isset($projects)): ?>
		<h3><?php echo __('Projects I\'m Involved In'); ?></h3>
		<ul>
			<?php foreach ($projects as $project): ?>
				<li><?php echo $this->Html->link(h($project['title']), array('controller' => 'projects', 'action' => 'view', $project['id'])); ?></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
</section>

<?php // Should be if he is looking at himself or if he's the admin. ?>
<?php if ($isAdmin): ?>
	<section>
		<h2>Actions</h2>
		<ul>
			<li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?></li>
			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?></li>
		</ul>
	</section>
<?php endif; ?>
