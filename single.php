<?php

	$GLOBALS['ctas']['post_type'] = 'post';

	get_header();

	/** ARTICLES **/
		if( have_posts() ) :
			while( have_posts() ) : the_post(); ?>

				<!-- post content-->
				<section id="post" class="pb-12 md:pb-20">

					<div class="container">

						<?php if($post->post_type == 'post') : ?>
						<div class="mx-auto mt-10 mb-6 md:my-8 post-thumbnail-wrapper">
							<?php
								echo get_the_post_thumbnail( $post, 'large', array(
									'class' => 'post-thumbnail w-full rounded-lg'
								));
							?>
						</div>
						<?php endif ?>

						<?php
							$author_ID = get_the_author_meta( 'id' );
						?>

						<div class="mx-auto <?php
								if($post->post_type == 'post') print 'lg:w-3/4';
								if($post->post_type == 'state_reports') print 'report-wrapper pt-4';
							?>">

							<?php if($post->post_type == 'post') : ?>
							<div class="post-detail">
									<h3 class="text-2xl font-bold md:text-3xl font-display"><?php the_title() ?></h3>
									<div class="flex items-center mt-4 post-info">
										<div class="w-12 h-12 mr-5 bg-gray-400 rounded-full img-fake"></div>
										<div>
											<a class="inline-block font-normal post-author">By <?php echo get_the_author() ?></a>
											<div class="text-sm opacity-75 post-date"><?php the_date() ?></div>
										</div>
									</div>
							</div>
							<?php endif ?>

							<article class="mt-16 leading-relaxed space-y-6">
								<?php the_content(); ?>
							</article>

						</div>
					</div>
				</section>

			<?php endwhile;
		endif;
	/** ARTICLES ENDS **/




	get_footer();

?>
