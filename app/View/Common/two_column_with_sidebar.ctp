<?php
/**
 * 
 * two_column_with_sidebar
 * 
 * Template for the content of a page.
 * Content is displayed in a middle_column with a sidebar in the right_column.
 * 
 * Example usage (for an extending View):
 * 
 *     <?php $this->extend('/Common/two_column_with_sidebar'); ?>
 * 
 *     Content goes here.
 */
?>

<div class="9u">
	<?php echo $this->fetch('content'); ?>
</div>

<div class="3u">
	<?php echo $this->element('sidebar'); ?>
</div>
