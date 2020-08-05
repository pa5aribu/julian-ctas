<?php

	// Template Name: Homepage

	get_header();

?>

<!-- home -->
<section id="home" class="pt-16 md:mt-20 bg-overlap-header">
	<div class="container">
		<div class="lg:w-10/12">
			<h2 class="mb-10 section-title"><?php the_field('hero_title') ?></h2>
			<div class="space-y-3 lg:w-10/12">
				<?php the_field('hero_description') ?>
			</div>
		</div>
	</div>
</section>
<!-- home ends -->

<!-- blog posts -->
<section id="posts" class="py-16 overflow-hidden md:py-20">
	<div class="container">
		<?php
			$items = get_posts(array(
				'post_type' => 'post',
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'posts_per_page' => 6
			));		

			echo '<div class="carousel homepage-carousel focus:outline-none">';
				foreach( $items as $index=>$item ) :

					$ID = $item->ID;
					$url = get_permalink( $item->ID );

				?>

					<div class="carousel-cell">
						<div class="flex flex-row-reverse h-full p-3 text-gray-700 bg-white rounded-lg md:p-5 card">
							<a class="w-1/2" href="<?php echo $url ?>">
								<?php
									echo get_the_post_thumbnail( $item, 'post-thumbnail', array(
										'class' => 'w-full h-48 md:h-56 block object-cover rounded-lg'
									));
								?>
							</a>
							<a href="<?php echo $url ?>" class="block w-1/2 pr-4">
								<div class="mb-2 text-xs tracking-wider uppercase opacity-75"><?php echo get_the_date() ?></div>
								<div class="font-semibold md:text-xl font-display"><?php echo $item->post_title ?></div>
							</a>
						</div>
					</div>

					<?php
				endforeach;
			echo '</div>';
		?>
	</div>
</section>
<!-- blog posts ends -->

<?php get_footer(); ?>
