<?php

	// Template Name: Homepage

	get_header();

?>

<!-- home -->
<section id="home" class="py-20 bg-gray-100 leading-loose">
	<div class="container">
		<div class="flex">
			<div class="w-2/3">
				<h1 class="mb-4 text-3xl font-bold">College Tuition Advisory Services</h1>
				<p>Clear, objective information to help you navigate the complex world of modern college costs.
				Helping students and parents know the true cost of obtaining the college degree and make sound financial choices.
				Financial analytics for colleges, industry professionals and researches.</p>
				<div class="button-wrapper mt-10">
					<a class="button" href="">Read Free Reports</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- home ends -->

<!-- blog posts -->
<section id="posts" class="py-20">
	<div class="container">
		<h2 class="text-2xl font-bold mb-8">Blog Posts</h2>
		<?php
			render_posts( array(
				'post_type' => 'post',
				'posts_length' => 6
			));
		?>
	</div>
</section>
<!-- blog posts ends -->

<?php get_footer(); ?>
