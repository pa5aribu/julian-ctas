<?php

	// Template Name: Login

	get_header();

?>

<section id="join" class="footer-absolute">
	<div class="container">
		<div class="flex flex-wrap items-center justify-center min-h-screen -mt-20">
			<div class="order-first w-full lg:w-5/12 lg:order-none lg:offset-1 ctas-form">
				<?php echo do_shortcode('[login_form title="Login"]') ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
