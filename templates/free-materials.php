<?php

	// Template Name: Free Materials

	get_header();

?>

<!-- hero -->
<section id="hero" class="mt-12">
	<div class="container">
		<div class="flex">
			<div class="lg:w-11/12">
				<h3 class="mb-8 md:mb-16 section-label"><?php echo $post->post_title ?></h3>
				<h2 class="font-bold section-title"><?php the_field('hero_title') ?></h2>
			</div>
		</div>
	</div>
</section>
<!-- hero ends -->

<section id="posts" class="relative mt-12 md:mt-16">
	<div class="container">
		<?php
			render_posts(array(
				'post_type' => 'free_materials',
				'posts_length' => -1,
				'thumbnail' => true,
				'download' => true,
				'columns' => [2, 2, 1]
			));
		?>
	</div>
</section>

<?php include( __DIR__ . '/../includes/section-join.php' ) ?>

<?php get_footer(); ?>
