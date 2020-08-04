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

		// list wrapper
		echo '<div class="flex flex-wrap -mx-2 card-list">';
			foreach( $items as $index=>$item ) :

				$ID = $item->ID;
				$url = get_permalink( $item->ID );

				/** insights & news **/
				if( $args['post_type'] == 'post' ) :
					$post_type = $item->post_type;
				?>

				<div class="px-2">
					<div class="flex flex-row-reverse h-full p-5 text-gray-700 bg-white rounded-lg card">
						<a class="w-40" href="<?php echo $url ?>">
							<?php
								echo get_the_post_thumbnail( $item, 'post-thumbnail', array(
									'class' => 'w-full h-56 block object-cover rounded-lg'
								));
							?>
						</a>
						<a href="<?php echo $url ?>" class="block w-48 mr-6">
							<div class="mb-3 text-sm uppercase"><?php echo get_the_date() ?></div>
							<div class="text-xl"><?php echo $item->post_title ?></div>
						</a>
					</div>
				</div>

				<?php endif;
				/** insights & news ends **/

			endforeach;
		echo '</div>';
		// list wrapper ends

	}
