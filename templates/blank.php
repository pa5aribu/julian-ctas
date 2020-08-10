<?php

	// Template Name: Blank

	get_header();

	if( have_posts() ) :
		while( have_posts() ) : the_post(); ?>

		<section>
			<div class="container">
				<?php the_content(); ?>
			</div>
		</section>

		<?php endwhile;
	endif;

	get_footer();

?>
