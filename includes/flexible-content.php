<?php

	/** FLEXIBLE CONTENT **/

	// check value exists.
	if( have_rows('content') ):

		$counter = 0;

		// loop through rows.
		while ( have_rows('content') ) : the_row();

			$counter++;


			// intro
			if( get_row_layout() == 'intro' ) : ?>
		
				<?php if( get_sub_field('type') == 'regular' ) : ?>

				<?php endif ?>

				<?php if( get_sub_field('type') == 'home' ) : ?>

					<section id="home">
						<div class="container">
							<div class="row align-items-center">
								<div class="col-lg-9 col-xl-7 col-md-11 content anim-item">
									<?php echo get_sub_field('content') ?>
								</div>
							</div>
						</div>


						<div class="wave-animation">
							<canvas id="wave"></canvas>
						</div>
					</section>

				<?php endif ?>

			<?php endif;
			// intro ends


			// content
			if( get_row_layout() == 'content' ) :
				$header = get_sub_field( 'header' );
			?>

			<section id="content-<?php echo get_row_index() ?>" class="section-content" <?php
				echo 'style="';
					if( get_sub_field('background') ) :
						echo 'background:'. get_sub_field('background') .';';
					endif;
					foreach( get_sub_field('padding') as $prop=>$val ) :
						echo 'padding-'. $prop .':'. $val .'px;';
					endforeach;
				echo '"';
			?>>
				<div class="container">
					<div class="section-header <?php if( get_sub_field('header_animation') ) echo 'anim-item' ?>" <?php
							echo 'style="';
								echo 'margin-bottom: '. get_sub_field('header_mb') .'px';
							echo '"';
						?>>
						<?php
							if( $header['title'] ) echo '<h3 class="section-title">'. $header['title'] .'</h3>';
							if( $header['description'] ) echo '<p>'. $header['description'] .'</p>';
						?>
					</div>
					<div class="row">
						<?php
							$content_width = get_sub_field( 'content_width' );
							$content_animation = '';

							if( get_sub_field('content_animation') ) $content_animation = 'anim-item ';

							echo '<article class="content '. $content_animation;
							foreach( $content_width as $prop=>$val ) :
								echo 'col-'. $prop .'-' .$val .' ';
							endforeach;
							echo '">';
								echo get_sub_field( 'content' );
							echo '</darticle>';
						?>
					</div>
				</div>
			</section>

			<?php
			endif;
			// content ends



			// dynamic
			if( get_row_layout() == 'dynamic' ) :
				$header = get_sub_field( 'header' );
			?>

			<section id="dynamic-<?php echo get_row_index() ?>" class="section-dynamic" <?php
				echo 'style="';
					if( get_sub_field('background') ) :
						echo 'background:'. get_sub_field('background') .';';
					endif;
					foreach( get_sub_field('padding') as $prop=>$val ) :
						echo 'padding-'. $prop .':'. $val .'px;';
					endforeach;
				echo '"';
			?>>
				<div class="container">
					<div class="section-header <?php if( get_sub_field('header_animation') ) echo 'anim-item' ?>" <?php
							echo 'style="';
								echo 'margin-bottom: '. get_sub_field('header_mb') .'px';
							echo '"';
						?>>
						<?php
							if( $header['title'] ) echo '<h3 class="section-title">'. $header['title'] .'</h3>';
							if( $header['description'] ) echo '<p>'. $header['description'] .'</p>';
						?>
					</div>

					<?php
						$content_type = get_sub_field( 'content_type' );

						/** BLOG **/
						if( $content_type == 'posts' ) :

							$posts = get_posts(array(
								'post_type' => 'post',
								'orderby' => 'menu_order',
								'order' => 'ASC',
								'posts_per_page' => -1
							));

							echo '<div class="card-list grid grid-col-2">';
								foreach( $posts as $item ) :
									$ID = $item->ID;
									$url = get_permalink( $item->ID );
									$thumbnail = get_the_post_thumbnail_url( $item );
									$tags = get_the_tags( $ID );
									?>

									<div class="card anim-item">
										<a class="card-thumbnail-wrapper project-trigger" href="<?php echo $url ?>">
											<img class="card-thumbnail" src="<?php echo $thumbnail ?>" alt="<?php echo $item->post_title ?>">
										</a>
										<a class="card-details project-trigger" href="<?php echo $url ?>">
											<div class="card-title"><?php echo $item->post_title ?></div>
											<p class="card-description"><?php echo get_the_excerpt( $ID ) ?></p>
										</a>
									</div>

									<?php
								endforeach;
							echo '</div>';

						endif;

						/** PROJECTS **/
						if( $content_type == 'projects' ) :
							$projects = get_posts(array(
								'post_type' => 'projects',
								'orderby' => 'menu_order',
								'order' => 'ASC',
								'posts_per_page' => -1
							));

							echo '<div class="card-list grid grid-col-2">';
								foreach( $projects as $item ) :
									$ID = $item->ID;
									$url = get_permalink( $item->ID );
									$thumbnail = get_the_post_thumbnail_url( $item );
									$tags = get_the_tags( $ID );
									?>

									<div class="card anim-item">
										<a class="card-thumbnail-wrapper project-trigger" href="<?php echo $url ?>">
											<img class="card-thumbnail" src="<?php echo $thumbnail ?>" alt="<?php echo $item->post_title ?>">
										</a>
										<a class="card-details project-trigger" href="<?php echo $url ?>">
											<div class="card-title"><?php echo $item->post_title ?></div>
											<p class="card-description"><?php echo get_the_excerpt( $ID ) ?></p>
										</a>
									</div>

									<?php
								endforeach;
							echo '</div>';
						endif;

						/** TESTIMONIALS **/
						if( $content_type == 'testimonials' ) :
							$testimonials = get_sub_field( 'testimonials' );

							if( $testimonials ) :
								echo '<div class="row testimonials">';
								foreach( $testimonials as $index=>$item ) :
									?>

									<div class="col-md-6 <?php if( $index > -1 ) echo 'offset-lg-0' ?>">
										<div class="testimonial anim-item" <?php
											if( $index == 1 ) echo 'data-offset="60"';
										?>>
											<div class="testimonial-content"><?php echo $item['quote'] ?></div>
											<div class="testimonial-detail row no-gutters align-items-center">
												<img class="photo" src="<?php echo $item['image'] ?>" alt="<?php echo $item['name'] ?>">
												<div class="author">
													<h5 class="name"><?php echo $item['name'] ?></h5>
													<p class="position"><?php echo $item['position'] ?></p>
												</div>
											</div>
										</div>
									</div>

									<?php
								endforeach;
								echo '</div>';
							endif;
						endif;
					?>
				</div>
			</section>

			<?php
			endif;
			// dynamic ends


		endwhile;
		// rows loop ends
	endif;
	// flexible content ends
?>
