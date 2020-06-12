<?php

	// make tags
	function make_tags( $tags ) {
		if( $tags ) :
			$el = '<div class="card-tags">';
				foreach( $tags as $tag ) :
				$el .= '
					<a href="'.home_url().'/tag/'.$tag->slug.'"
						class="tag">'. $tag->name .'</a>';
				endforeach;
			$el .= '</div>';
			return $el;
		else :
			return '';
		endif;
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
		echo '<div class="card-list flex flex-wrap -mx-4">';
			foreach( $items as $index=>$item ) :
				$ID = $item->ID;
				$url = get_permalink( $item->ID );
				$thumbnail = get_the_post_thumbnail_url( $item );

				/** insights & news **/
				if( $args['post_type'] == 'post' ) :
					$post_type = $item->post_type;
				?>

				<div class="w-1/3 px-4 mb-8">
					<div class="card">
						<a href="<?php echo $url ?>">
							<img class="w-full" src="<?php echo $thumbnail ?>" alt="<?php echo $item->post_title ?>">
						</a>
						<a href="<?php echo $url ?>">
							<div class="card-title mt-4"><?php echo $item->post_title ?></div>
						</a>
					</div>
				</div>

				<?php endif;
				/** insights & news ends **/

			endforeach;
		echo '</div>';
		// list wrapper ends

	}
