<?php

	// Template Name: Blank

	get_header();

	if( have_posts() ) :
		while( have_posts() ) : the_post(); ?>

		<section id="blank" class="min-h-screen md:-mt-20 footer-absolute bg-dark">
			<div class="container pt-20">
				<div class="ctas-form">
					<?php the_content(); ?>
				</div>
			</div>
		</section>

		<?php endwhile;
	endif;

	get_footer();

?>
