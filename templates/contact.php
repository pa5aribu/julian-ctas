<?php

	// Template Name: Contact

	get_header();

?>

<!-- home -->
<section id="contact" class="h-screen -mt-20 bg-blend" <?php set_thumbnail_as_bg($post) ?>>
	<div class="container pt-16">
		<h2 class="mt-40 mb-8 section-title"><?php the_field('hero_title') ?></h2>
		<div class="mb-8 text-lg space-y-3 lg:w-10/12">
			<?php the_field('hero_description') ?>
		</div>
		<a class="inline-flex items-center text-xl border-white hover:text-nucleus button is-ghost is-lg" 
			href="mailto:<?php echo get_field('email', 'option') ?>">
			send email
			<img class="w-4 ml-2" src="<?php bloginfo('template_url') ?>/img/icons/login.svg" />
		</a>
	</div>
</section>
<!-- home ends -->

<?php get_footer(); ?>
