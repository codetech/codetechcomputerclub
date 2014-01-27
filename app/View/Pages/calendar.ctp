<?php $this->extend('/Common/two_column_with_sidebar'); ?>

<?php $this->append('css'); ?>
	<style>
		#calendar-container {
			margin-top: 25px;
			text-align: center;
		}
	</style>
<?php $this->end(); ?>

<?php
	$this->append('script');
	echo $this->Html->script('resize-calendar');
	$this->end();
?>

<!-- Main Content -->
<section>
	<header>
		<h2>Calendar</h2>
		<h3>Check here often for club meeting dates, special events, and more.</h3>
		<div id="calendar-container">
			<iframe src="https://www.google.com/calendar/embed?title=Club%20Schedule&amp;showPrint=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=codetechcomputerclub%40gmail.com&amp;color=%232952A3&amp;ctz=America%2FLos_Angeles" style=" border-width:0 " width="600" height="600" frameborder="0" scrolling="no" id="google-calendar"></iframe>
		</div>
	</header>
</section>
