<?php

	// Template Name: Blog

	get_header();

?>

<!-- hero -->
<section id="blog-hero" class="pb-8 -mt-20 bg-fixed md:pb-16 footer-absolute bg-blend"
	<?php set_thumbnail_as_bg($post) ?>>
	<div class="container pt-20 pb-32">
		<div class="flex">
			<div class="lg:w-11/12">
				<h3 class="mt-12 mb-8 md:mb-16 section-label"><?php echo $post->post_title ?></h3>
				<h2 class="mb-16 font-bold section-title"><?php the_field('hero_title') ?></h2>
				<div class="posts">
					<?php
						render_posts(array(
							'post_type' => 'post',
							'posts_length' => -1,
							'thumbnail' => false
						));
					?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- hero ends -->

<?php get_footer(); ?>
