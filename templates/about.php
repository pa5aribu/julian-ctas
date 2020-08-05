<?php

	// Template Name: About

	get_header();

?>

<!-- home -->
<section id="about" class="py-16 bg-fixed md:pb-40 md:min-h-screen md:pt-56 footer-absolute md:-mt-20 bg-blend" <?php set_thumbnail_as_bg($post) ?>>
<div class="container pb-12 md:pb-0">
		<div class="lg:w-9/12 inner">
			<h2 class="mb-8 md:mb-12 section-title"><?php the_field('hero_title') ?></h2>
			<div class="space-y-6">
				<?php the_field('hero_description') ?>
			</div>
		</div>
	</div>
</section>
<!-- home ends -->

<?php get_footer(); ?>
