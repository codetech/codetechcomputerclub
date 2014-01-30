<!DOCTYPE html>
<!--
	Halcyonic 3.0 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
	
	The template has been modified to suit the needs of codeTech Computer Club.
-->
<html lang="en">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>MiraCosta College, Oceanside CA | codeTech Computer Club | <?php echo $title_for_layout; ?></title>
	
	<?php
		// Favicon
		echo $this->Html->meta('icon');
		// <meta> tags, such as page descriptions, canonical urls, etc
		echo $this->fetch('meta');
	?>
	
	<!-- CSS Reset -->
	<?php echo $this->Html->css('normalize'); ?>
	
	<!-- jQuery -->
	<?php echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'); ?>
	<script>window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')</script>
	
	<!-- skel -->
	<?php
		echo $this->Html->script('config');
		echo $this->Html->script('skel.min');
		echo $this->Html->script('skel-panels.min');
	?>
	
	<!-- Fallback stylesheets -->
	<noscript>
		<?php
			echo $this->Html->css('skel-noscript');
			echo $this->Html->css('style');
			echo $this->Html->css('style-desktop');
		?>
	</noscript>
	
	<!-- Legacy Internet Explorer compatibility -->
	<!--[if lte IE 9]><?php echo $this->Html->css('ie9'); ?><![endif]-->
	<!--[if lte IE 8]><?php echo $this->Html->script('html5shiv'); ?><![endif]-->
	
	<!-- Other stylesheets and scripts -->
	<?php
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	
	<!-- Header -->
	<div id="header-wrapper">
		<header id="header" class="container">
			<div class="row">
				<div class="12u">
				
					<!-- Logo -->
					<h1 id="logo"><a href="/" id="logo-link">
						<span id="logo-top">
							<span id="logo-code">code</span><span id="logo-tech">Tech</span>
						</span><br>
						<span id="logo-computer-club">Computer Club</span>
					</a></h1>
					
					<!-- Nav -->
					<nav id="nav">
						<a href="/about">About</a>
						<a href="/join">Join</a>
						<a href="/calendar">Calendar</a>
						<a href="/members">Members</a>
						<a href="/projects">Projects</a>
						<a href="/resources">Resources</a>
					</nav>

				</div>
			</div>
		</header>
		<?php echo $this->fetch('home_banner'); ?>
	</div>
	
	<!-- Content -->
	<div id="content-wrapper">
		<div id="content" class="<?php echo $this->fetch('content_class'); ?>">
			<div class="container">
				<?php
					$flash = $this->Session->flash();
					$authFlash = $this->Session->flash('auth');
				?>
				<?php if ( $flash ): ?>
					<div class="row">
						<div class="12u">
							<section>
								<?php echo $flash; ?>
							</section>
						</div>
					</div>
				<?php endif; ?>
				<?php if ( $authFlash ): ?>
					<div class="row">
						<div class="12u">
							<section>
								<?php echo $authFlash; ?>
							</section>
						</div>
					</div>
				<?php endif; ?>
				<div class="row">
					<?php echo $this->fetch('content'); ?>
				</div>
			</div>
		</div>
	</div>

	<!-- Copyright -->
	<div id="copyright">
		&copy; <?php echo date('Y'); ?> codeTech. All rights reserved. | Design: <a href="http://html5up.net">HTML5 UP</a> | Images: <a href="http://fotogrph.com">fotogrph</a> | <a href="/licensing">Licensing</a>
	</div>
	
	<!-- Google Analytics Widget -->
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-44625230-1', 'codetechcomputerclub.com');
		ga('send', 'pageview');
	</script>
</body>
</html>
