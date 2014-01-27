<?php $this->assign('content_class', 'no-mobile-margin'); ?>

<?php $this->append('css'); ?>
	<style>
		#banner {
			background-image: url('/css/images/bg02.jpg');
		}
	</style>
<?php $this->end(); ?>

<?php $this->start('home_banner'); ?>
<div id="banner">
	<div class="container">
		<div class="row">
			<div class="6u">
			
				<!-- Banner Copy -->
					<p id="banner-copy">
						Join codeTech Computer Club and become a better programmer today!
					</p>
					<div class="center">
						<a href="/join" class="button-big">Join Now!</a>
					</div>

			</div>
			<div class="6u">
				
				<!-- Banner Image -->
					<a href="#" class="bordered-feature-image">
						<img src="/img/binary-code-banner.jpg" alt="Blue binary code on a black background." />
					</a>
			
			</div>
		</div>
	</div>
</div>
<?php $this->end(); ?>

<div class="4u">
	<!-- Box #1 -->
		<section>
			<header>
				<h2>Who We Are</h2>
				<h3>We are students, graduates, teachers and industrymen who love computers.</h3>
			</header>
			<ul class="quote-list">
				<li>
					<img src="/img/fred-thub.jpg" alt="Fred Young Thumbnail" />
					<p>Fred Young</p>
					<span><em>Founder</em> -30-year industry professional</span>
				</li>
				<li>
					<img src="/img/kyle-thub.jpg" alt="Kyle San Clemente Thumbnail" />
					<p>Kyle San Clemente</p>
					<span><em>President</em> - Ambitious software designer and enthusiast</span>
				</li>
				<li>
					<img src="/img/jackson-thub.jpg" alt="Jackson Ray Hamilton Thumbnail" />
					<p>Jackson Hamilton</p>
					<span><em>Vice President</em> - Web application and game developer</span>
				</li>
				
			</ul>
		</section>

</div>
<div class="4u">

	<!-- Box #2 -->
		<section>
			<header>
				<h2>What We Will Be Doing</h2>
				<h3>We will be learning, innovating, hacking and maybe even cracking.</h3>
			</header>
			<ul class="check-list">
				<li>Writing beautiful code</li>
				<li>Crafting commercial-grade software</li>
				<li>Presenting projects</li>
				<li>Meeting industry professionals</li>
			</ul>
		</section>

</div>
<div class="4u">
	
	<!-- Box #3 -->
		<section>
			<header>
				<h2>Why You Should Join</h2>
				<h3>You'd have to be crazy or simply extremely anti-social not to.</h3>
			</header>
			<ul class="check-list">
				<li>Become a better programmer</li>
				<li>Meet new people with similar interests</li>
				<li>Get a taste of real software development</li>
			</ul>
			</header>
		</section>

</div>
