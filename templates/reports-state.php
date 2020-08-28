<?php

	// Template Name: State Reports

	get_header();

?>

<!-- states -->
<section id="reports" data-type="state" class="min-h-screen pt-12 md:pb-16 bg-nodal">
	<div class="container">
			<div class="flex flex-wrap">

				<h3 class="w-full mb-8 md:mb-16 section-label md:w-7/12 xl:w-8/12">
					<a class="inline-block" href="<?php echo home_url() . '/students-families' ?>">student and families</a>
					<span> > </span>
					<span><?php echo $post->post_title ?></span>
				</h3>
				<h2 class="w-full mb-10 font-bold md:mb-10 section-title md:w-7/12 xl:w-8/12"><?php the_field('hero_title') ?></h2>

				<div class="w-full mb-8 md:sticky md:mb-0 md:w-5/12 xl:w-4/12 md:pl-8 lg:pl-12 md:h-0 states-wrapper-col">
					<?php include( __DIR__ . '/../includes/states.php' ) ?>
				</div>

				<div class="w-full md:w-7/12 xl:w-8/12">
					<div class="filter-tags"></div>

					<?php
						render_posts(array(
							'post_type' => 'state_reports',
							'posts_length' => -1,
							'thumbnail' => false,
							'columns' => [2,1,1],
							'download' => true
						));
					?>
				</div>

			</div>

	</div>
</section>
<!-- states ends -->

<?php get_footer(); ?>
