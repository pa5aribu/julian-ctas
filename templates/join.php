<?php

	// Template Name: Join

	get_header();

	$plans = [
		'Free subscription to the CTAS newsletter to learn about new blog postings and reports',
		'Individual State Report ($29.99) Purchase a standalone report for the state where you reside',
		'Students & Families Subscription Access ($49.99) Access to all Students & Families reports, including state and college reports',
		'Professional Subscription ($200) Access all materials on the site, including industry reports'
	]

?>

<section id="join" class="min-h-screen pt-16 pb-16 md:-mt-20 footer-absolute">
	<div class="container md:mt-20 lg:mt-16">
		<div id="register-form" class="rcp-wrapper ctas-form">
			<?php
				echo do_shortcode('[register_form]');
			?>
		</div>
	</div>

	<div class="h-12 md:h-16"></div>
</section>

<?php get_footer(); ?>
