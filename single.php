<?php

	$GLOBALS['ctas']['post_type'] = 'post';

	get_header();

	/** ARTICLES **/
	if( $post_type != 'projects' ) :

		if( have_posts() ) :
			while( have_posts() ) : the_post(); ?>

				<!-- post content-->
				<section id="post" class="pt-8 pb-20">

					<div class="container">

						<div class="mx-auto mb-8 post-thumbnail-wrapper">
							<?php
								echo get_the_post_thumbnail( $post, 'large', array(
									'class' => 'post-thumbnail w-full rounded-lg'
								));
							?>
						</div>

						<?php
							$author_ID = get_the_author_meta( 'id' );
						?>

						<div class="flex justify-center">
							<div class="lg:w-3/4">

								<div class="post-detail">
									<h3 class="mb-4 text-3xl font-bold font-display"><?php the_title() ?></h3>

									<div class="flex items-center post-info">
										<div class="w-12 h-12 mr-5 bg-gray-400 rounded-full img-fake"></div>
										<div>
											<a class="inline-block font-normal post-author">By <?php echo get_the_author() ?></a>
											<div class="text-sm opacity-75 post-date"><?php the_date() ?></div>
										</div>
									</div>

								</div>

								<article class="mt-16 leading-relaxed space-y-6">
									<?php the_content(); ?>
								</article>

							</div>
						</div>
					</div>
				</section>

			<?php endwhile;
		endif;
	endif;
	/** ARTICLES ENDS **/




	get_footer();

?>
