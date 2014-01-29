<?php
/**
 * MVC "index" and "add" views for Comments, bundled into a single Element.
 * Can easily be included in other models' views.
 * 
 * @param array $comments An array of comments to display.
 * @param string $foreignKey Name of foreign key for a submitted comment to associate itself with.
 * @param mixed $foreignKeyValue Value of the foreign key; e.g., a Project's `id`.
 */
?>

<h2>Comments</h2>
<?php if (empty($comments)): ?>
	<p>No comments.</p>
<?php else: ?>
	<ul>
		<?php foreach ($comments as $comment): ?>
			<li>
				<span title="<?php echo $this->Time->format('F jS, Y h:i A', $comment['created']); ?>">
					<b>
						<?php if (!empty($comment['user_id'])): ?>
							<?php echo $this->Html->link(h($comment['author']), array('controller' => 'users', 'action' => 'view', $comment['user_id'])); ?>:
						<?php elseif (!empty($comment['author'])): ?>
							<i><?php echo h($comment['author']); ?>:</i>
						<?php else: ?>
							<i>Anonymous:</i>
						<?php endif; ?>
					</b>
					<?php echo h($comment['content']); ?>
				</span>
				<?php if ($isAdmin): ?>
					(<?php echo $this->Html->link(__('Edit'), array('controller' => 'comments', 'action' => 'edit', $comment['id'])); ?> | 
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'comments', 'action' => 'delete', $comment['id']), null, __('Are you sure you want to delete # %s?', $comment['id'])); ?>)
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>

<?php echo $this->Form->create('Comment', array('action' => 'add')); ?>
	<fieldset>
		<legend>Submit Comment</legend>
		<?php
			echo $this->Form->hidden($foreignKey, array(
				'value' => $foreignKeyValue
			));
		?>
		<?php if ($loggedIn): ?>
			<div class="input text">
				<label>Name</label>
				<?php echo $this->Session->read('Auth.User.name'); ?>
			</div>
		<?php else:
				echo $this->Form->input('author', array(
					'placeholder' => 'Anonymous',
					'label' => 'Name',
					'type' => 'text'
				));
			endif;
			echo $this->Form->input('content', array(
				'label' => 'Comment *',
				'type' => 'textarea'
			));
		?>
	</fieldset>
<?php echo $this->Form->end(array('label' => 'Submit Comment')); ?>
