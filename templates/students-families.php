<?php

	// Template Name: Students & Families

	get_header();

?>

<!-- hero -->
<section id="snf-hero" class="mt-12 bg-overlap-header">
	<div class="container">
		<div class="flex">
			<div class="lg:w-11/12">
				<h3 class="mb-8 md:mb-16 section-label"><?php echo $post->post_title ?></h3>
				<h2 class="mb-10 font-bold section-title"><?php the_field('hero_title') ?></h2>
				<div class="font-light lg:text-xl space-y-4 md:space-y-5 lg:w-10/12">
					<?php the_field('hero_description') ?>
				</div>
				<div class="relative mt-16 hero-images">
					<?php
						$images = get_field('hero_images');
						render_img( $images['background'], 'w-full' );
						render_img( $images['foreground'], 'fg h-full absolute bottom-0 right-0' );
					?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- hero ends -->

<!-- reports -->
<?php
	function render_report( $dir ) {
		$title = get_field($dir . '_title');
		$subtitle = get_field($dir . '_subtitle');
		$description = get_field($dir . '_description');
		$link = get_field($dir . '_link');
		$button = get_field($dir . '_link');

		$title_color = 'text-nodal';
		if($dir == 'reports_right') $title_color = 'text-nucleus';

		echo '
			<div class="'. $title_color .' text-2xl font-bold font-display">'. $title .'</div>
			<div class="my-5 font-normal">'. $subtitle .'</div>
			<p class="mb-5">'. $description .'</p>
		';

		$button_url = get_permalink($button['url']);

		echo '<a class="font-bold border-terminal button is-ghost"
			href="'. $button_url .'">'. $button['label'] .'
			<img class="ml-2" src="'. get_bloginfo('template_url') .'/img/icons/arrow-right.svg" />
		</a>';
	}
?>
<section id="reports" class="pt-16 bg-gray-200 md:pt-20 text-terminal">
	<div class="container py-16 md:py-24">
		<h2 class="mb-12 md:mb-16 section-title"><?php the_field('reports_title') ?></h2>
		<div class="lg:w-11/12">
			<!-- list -->
			<div class="justify-between block lg:flex">
				<div class="lg:w-5/12">
					<?php render_report('reports_left') ?>
				</div>
				<div class="w-full h-px my-10 bg-gray-400 lg:my-0 lg:w-px lg:h-auto separator"></div>
				<div class="lg:w-5/12">
					<?php render_report('reports_right') ?>
					<p class="mt-4">
						<a class="mt-4 text-nucleus" href="<?php bloginfo('template_url') . '/join' ?>">Sign up today</a> 
						for more specific detail.
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- download ends -->

<!-- download -->
<section id="download" class="bg-nodal">
<div class="container py-16 md:py-12">
	<div class="items-center justify-around md:flex lg:justify-center">
		<div class="mb-8 md:w-4/12 md:mb-0">
			<?php
				render_img(get_field('download_image'), 'block w-3/4 mx-auto md:w-full');
			?>
		</div>
		<div class="w-full md:w-5/12 lg:w-4/12 lg:offset-1">
			<div class="mb-1 text-xl font-bold font-display"><?php the_field('download_title') ?></div>
			<div class="mb-8 space-y-4">
				<?php the_field('download_description') ?>
			</div>
			<a class="inline-flex items-center text-xl border-white hover:text-nucleus button is-ghost is-lg" 
				href="">
				download
				<img class="w-3 ml-2" src="<?php bloginfo('template_url') ?>/img/icons/download.svg" />
			</a>
		</div>
	</div>
</div>
</section>
<!-- download ends -->

<?php get_footer(); ?>
