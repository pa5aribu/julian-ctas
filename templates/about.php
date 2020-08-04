<?php

	// Template Name: About

	get_header();

?>

<!-- home -->
<section id="about" class="min-h-screen -mt-20 bg-fixed bg-blend" <?php set_thumbnail_as_bg($post) ?>>
	<div class="container py-16">
		<div class="w-9/12 inner">
			<h2 class="mt-40 mb-12 section-title"><?php the_field('hero_title') ?></h2>
			<div class="mb-24 space-y-6">
				<?php the_field('hero_description') ?>
				<?php the_field('hero_description') ?>
			</div>
		</div>
	</div>
</section>
<!-- home ends -->

<?php get_footer(); ?>
