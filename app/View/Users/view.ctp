<?php $this->extend('/Common/two_column_with_sidebar'); ?>

<?php echo $this->element('highlightjs'); ?>

<section>
	<h2>Member Profile: <?php echo h($user['User']['name']); ?></h2>
	
	<?php echo $this->Html->image(h($this->Gravatar->getUrl($user['User']['email'])) . '&s=200', array(
		'alt' => $user['User']['name'] . '\'s avatar'
	)); ?><br>
	
	<b>Name:</b> <?php echo h($user['User']['name']); ?><br>
	<b>Position:</b> <?php echo h($user['User']['position']); ?><br>
	<b>Member Since:</b> <?php echo $this->Time->format('M j, Y', $user['User']['created']); ?><br>
	
	<?php if (!empty($user['User']['displayemail']) || !empty($user['User']['displayphone'])): ?>
		<h3>Contact Info</h3>
		
		<?php if (isset($emailImagePath)): ?>
		
			<b>Email:</b> 
			<?php echo $this->Html->image($emailImagePath, array(
				'alt' => $user['User']['name'] . '\'s email',
				'class' => 'middle'
			)); ?><br>
			
		<?php endif; ?>
		<?php if (isset($phoneImagePath)): ?>
		
			<b>Phone:</b> 
			<?php echo $this->Html->image($phoneImagePath, array(
				'alt' => $user['User']['phone'] . '\'s phone',
				'class' => 'middle'
			)); ?><br>
			
		<?php endif; ?>
	<?php endif; ?>
	
	<?php if (!empty($user['User']['profile'])): ?>
		<h3>About Me</h3>
		<div id="profile" class="echoed-html">
			<?php echo $user['User']['profile']; ?>
		</div><br>
	<?php endif; ?>
	
	<?php if (isset($projectsStarted)): ?>
		<h3>Projects I've Started</h3>
		<ul>
			<?php foreach ($projectsStarted as $project): ?>
				<li><?php echo $this->Html->link(h($project['title']), array('controller' => 'projects', 'action' => 'view', $project['id'])); ?></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
	
	<?php if (isset($projects)): ?>
		<h3>Projects I'm Involved In</h3>
		<ul>
			<?php foreach ($projects as $project): ?>
				<li><?php echo $this->Html->link(h($project['title']), array('controller' => 'projects', 'action' => 'view', $project['id'])); ?></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
</section>

<?php if ($isSameUser || $isAdmin): ?>
	<section>
		<h2>Actions</h2>
		<ul>
			<li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?></li>
			<li><?php echo $this->Html->link(__('Change Password'), array('action' => 'change_password', $user['User']['id'])); ?></li>
			<?php if ($isAdmin): ?>
				<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?></li>
			<?php endif; ?>
		</ul>
	</section>
<?php endif; ?>

<?php if ($isAdmin): ?>
	<section>
		<h2>Administrative Actions</h2>
		<ul>
			<li><?php echo $this->Html->link('Send Email', array('action' => 'send_email')); ?></li>
			<li><?php echo $this->Html->link('Send Text', array('action' => 'send_text')); ?></li>
		</ul>
	</section>
<?php endif; ?>
