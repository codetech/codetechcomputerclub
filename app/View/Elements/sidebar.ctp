<section>
	<?php if ( $loggedIn ): ?>
		<?php echo __('Logged in as:'); ?><br>
		<?php echo $this->Html->link($this->Session->read('Auth.User.name'), array('controller' => 'users', 'action' => 'view', $this->Session->read('Auth.User.id'))); ?><br>
		<?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?>
	<?php else: ?>
		<?php echo __('Not logged in.'); ?><br>
		<?php echo $this->Html->link(__('Member Login'), array('controller' => 'users', 'action' => 'login')); ?>
	<?php endif; ?>
</section>

<section>
	<header>
		<h2><?php echo __('Hot Projects'); ?></h2>
	</header>
	<ul class="bullet-list">
		<?php $projects = $this->Sidebar->getProjects();
		for ($i = 0, $j = count($projects); $i < $j; $i++): ?>
			<li><?php echo $projects[$i]; ?></li>
		<?php endfor; ?>
	</ul>
</section>

<section>
	<header>
		<h2><?php echo __('Useful Resources'); ?></h2>
	</header>
	<ul class="bullet-list">
		<?php foreach ($posts as $post): ?>
		<li><?php echo $this->Html->link($post['Post']['title'],
	            array('controller'=>'posts', 'action' => 'view', $post['Post']['id']));?></li>
		<?php endforeach; ?>
	</ul>
</section>

<!-- TODO: Put something interesting here. -->
<!--section>
	<header>
		<h2>Ipsum Dolor</h2>
	</header>
	<p>
		Vehicula fermentum ligula at pretium. Suspendisse semper iaculis eros, eu aliquam 
		iaculis. Phasellus ultrices diam sit amet orci lacinia sed consequat. 							
	</p>
	<ul class="link-list">
		<li><a href="#">Sed dolore viverra</a></li>
		<li><a href="#">Ligula non varius</a></li>
		<li><a href="#">Dis parturient montes</a></li>
		<li><a href="#">Nascetur ridiculus</a></li>
	</ul>
</section>-->
