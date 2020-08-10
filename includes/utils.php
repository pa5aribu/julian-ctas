<?php

	function get_menu( $id, $post = '', $classes = '' ) {
		wp_nav_menu( array(
			'menu' => $id,
			'menu_class' => 'flex'
			) );
	}

	function clog( $data ) {
		echo '<pre>';
		var_dump( $data );
		echo '</pre>';
	}

	function get_current_template() {
		global $template;
		return basename($template, '.php');
	}

	function render_img( $obj, $classes = '', $size = 'medium_large') {
		$url = $obj[ 'sizes' ][ $size ];
		echo '<img
			class="' . $classes . '"	
			src="' . $url . '"	
			alt="' . $obj['alt'] . '"	
		>';
	}

	function set_thumbnail_as_bg($post, $size = 'full') {
		$thumbnail_url = get_the_post_thumbnail_url($post, $size);
		echo 'style="background-image:url('. esc_url($thumbnail_url) .');"';
	}

	// render author
	function render_author() {
		$author = new stdClass();
		$author->name = get_the_author_meta( 'display_name' );
		$author->description = get_the_author_meta( 'user_description' );
		clog( $author );
	}

	// render posts
	function render_posts( $args ) {

		$items = get_posts(array(
			'post_type' => $args['post_type'],
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'posts_per_page' => $args['posts_length']
		));

		$thumbnail = $args['thumbnail'];

		$columns = $args['columns'];
		if($columns) {
			$cols = 'xl:grid-cols-' . $columns[0] . ' lg:grid-cols-' . $columns[1] . ' md:grid-cols-' . $columns[2];
		} else {
			$cols = 'xl:grid-cols-3 lg:grid-cols-2';
		}

		// list wrapper
		echo '<div class="grid '. $cols. ' grid-cols-1 gap-4">';
			foreach( $items as $item ) :

				$ID = $item->ID;
				$url = get_permalink( $item->ID );

				if($args['download']) {
					$url = get_field('report_file', $item->ID);
				}
 
				?>

				<a class="p-3 block text-gray-700 bg-white rounded-lg md:px-5 
					transition duration-300 md:py-5 card relative <?php
						($thumbnail) ? 
							print 'flex flex-row-reverse' : 
							print 'md:pb-16 hover:bg-nucleus hover:text-white';

						if($args['download']) echo ' group ';
					?>" href="<?php echo $url ?>">

					<?php if($thumbnail) : ?>
						<div class="w-1/2 pl-4">
							<?php
								$thumbnail_url = get_the_post_thumbnail( $item, 'post-thumbnail', array(
									'class' => 'w-full h-48 md:h-56 block object-cover rounded-lg'
								));

								if($thumbnail_url) {
									echo $thumbnail_url;
								} else {
									echo '<div class="block w-full h-48 rounded-lg bg-terminal md:h-56"></div>';
								}
							?>
						</div>
					<?php endif ?>

					<div class="block <?php
						if($thumbnail) echo ' w-1/2 ';
					?>">
						<div class="mb-2 text-xs tracking-wider uppercase opacity-75"><?php 
							$category = get_the_category($item->ID);
							($args['post_type'] == 'professionals') ? print $category[0]->name : print get_the_date();
						?></div>
						<div class="font-semibold md:text-xl font-display"><?php echo $item->post_title ?></div>
						<?php
							if(!$thumbnail) {
								echo '<p class="mt-4">'. get_the_excerpt($item) .'</p>';
								echo '<p class="absolute bottom-0 left-0 pb-5 pl-5 text-xs font-bold tracking-wider uppercase font-body">read more</p>';
							}

							if($args['download']) {
								echo '<div class="inline-flex items-center mt-4 text-sm group-hover:bg-terminal group-hover:text-white border-terminal text-terminal button is-ghost is-sm" 
									href="'. get_field('download_file') .'">download
									<img class="w-2 ml-2" src="'. get_bloginfo('template_url') .'/img/icons/download.svg" />
								</div>';
							}
						?>
					</div>
				</a>

				<?php

			endforeach;
		echo '</div>';
		// list wrapper ends

	}



	/** render input **/
	function render_input($label, $type) {
		$id = preg_replace('/[[:space:]]+/', '-', $label);
		echo '<div class="flex items-center input-group">
			<label class="mr-8 text-xs tracking-widest uppercase" for="'. $id .'">'. $label .'</label>
			<input class="w-7/12 px-4 py-3 ml-auto text-sm bg-white rounded-xl focus:outline-none bg-opacity-25 transition duration-300 focus:bg-opacity-50"
				id="'. $id .'" type="'. $type .'">
		</div>';
	}
