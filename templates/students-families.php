<?php

	// Template Name: Students & Families

	get_header();

?>

<!-- home -->
<section id="home" class="pb-16 mt-12 bg-overlap-header">
	<div class="container">
		<div class="flex">
			<div class="lg:w-10/12">
				<h3 class="mb-16 section-label"><?php echo $post->post_title ?></h3>
				<h2 class="mb-10 section-title"><?php the_field('hero_title') ?></h2>
				<div class="text-xl font-light space-y-5 lg:w-10/12">
					<?php the_field('hero_description') ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- home ends -->

<!-- reports -->
<section id="reports" class="h-64 bg-gray-300">
	<div class="container"></div>
</section>
<!-- download ends -->

<!-- download -->
<section id="download" class="h-64 bg-nodal">
	<div class="container"></div>
</section>
<!-- download ends -->

<?php get_footer(); ?>
