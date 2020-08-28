<?php

	// globals
	$GLOBALS['hyphenco'] = array();

	// disable editor on pages
	function disable_editor_pages() {
		$post_types = array(
			'page',
		);

		foreach( $post_types as $post_type ) :
			remove_post_type_support( $post_type, 'editor' );
		endforeach;
	}

	add_action( 'init', 'disable_editor_pages' );

	// add tags for post type
	/* add_action( 'init', 'gp_register_taxonomy_for_object_type' ); */

	/* function gp_register_taxonomy_for_object_type() { */
	/* 	register_taxonomy_for_object_type( 'post_tag', 'projects' ); */
	/* } */

	// disable admin bar
	// show_admin_bar(false);

	// add menu
	add_theme_support( 'menus' );

	// post thumbnail
	add_theme_support( 'post-thumbnails' );

	// get resources
	function get_scripts() {
		$dir = get_template_directory_uri();
		wp_enqueue_style( 'tailwind', $dir . '/css/tailwind.css' );
		wp_enqueue_style( 'style', $dir . '/style.css' );
		wp_enqueue_style( 'scrollbar', 'https://malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css' );

		wp_enqueue_script( 'scrollbar',  'https://malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js', '', false, true );
		wp_enqueue_script( 'vendors', $dir . '/js/vendors.js', '', false, true );
		/* wp_enqueue_script( 'js-utils', $dir . '/js/utils.js', '', false, true ); */
		wp_enqueue_script( 'main', $dir . '/js/main.js', '', false, true );
	}

	add_action( 'wp_enqueue_scripts', 'get_scripts' );

	// ACF
	if( function_exists('acf_add_options_page') ) {
	
		acf_add_options_page(array(
			'page_title' 	=> 'Theme General Settings',
			'menu_title'	=> 'Theme Settings',
			'menu_slug' 	=> 'theme-general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));
		
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Theme Header Settings',
			'menu_title'	=> 'Header',
			'parent_slug'	=> 'theme-general-settings',
		));
		
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Theme Footer Settings',
			'menu_title'	=> 'Footer',
			'parent_slug'	=> 'theme-general-settings',
		));
		
	}
	// add classes to nav anchors
	/* add_filter( 'nav_menu_link_attributes', function($atts) { */
    /* $atts['class'] = "scroll-to"; */
	/* 	return $atts; */
	/* }, 100, 1 ); */

	// update admin style
	add_action('admin_head', 'my_custom_css');

	function my_custom_css() {
		/* #menu-posts, */
		echo '<style>
			#menu-comments {
				display: none
			}
		</style>';
	}

	// limit excerpt length
	function custom_excerpt_length( $length ) {
		return 10;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
	function wpdocs_excerpt_more( $more ) {
		return '...';
	}
	add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );





	// ACF custom filters and functions
	function bidirectional_acf_update_value( $value, $post_id, $field  ) {
		// vars
		$field_name = $field['name'];
		$field_key = $field['key'];
		$global_name = 'is_updating_' . $field_name;
		
		if( !empty($GLOBALS[ $global_name ]) ) return $value;
		$GLOBALS[ $global_name ] = 1;

		if( is_array($value) ) {
			foreach( $value as $post_id2 ) {
				$value2 = get_field($field_name, $post_id2, false);
				if( empty($value2) ) {
					$value2 = array();
				}
				if( in_array($post_id, $value2) ) continue;
				$value2[] = $post_id;
				update_field($field_key, $value2, $post_id2);
			}
		}
		
		$old_value = get_field($field_name, $post_id, false);
		
		if( is_array($old_value) ) {
			foreach( $old_value as $post_id2 ) {
				if( is_array($value) && in_array($post_id2, $value) ) continue;
				$value2 = get_field($field_name, $post_id2, false);
				if( empty($value2) ) continue;
				$pos = array_search($post_id, $value2);
				unset( $value2[ $pos] );
				update_field($field_key, $value2, $post_id2);
			}
		}
		
		$GLOBALS[ $global_name ] = 0;

		return $value;
	}

	add_filter('acf/update_value/name=related_posts', 'bidirectional_acf_update_value', 10, 3);
	add_filter('acf/update_value/name=team_related_posts', 'bidirectional_acf_update_value', 10, 3);




	// flexible content layout name
	add_filter('acf/fields/flexible_content/layout_title', 'my_acf_fields_flexible_content_layout_title', 10, 4);
	function my_acf_fields_flexible_content_layout_title( $title, $field, $layout, $i ) {

		// remove layout name from title.
		$title = '';
		$layout_name = get_row()['acf_fc_layout'];
		$layout_name = str_replace( '_', ' ', $layout_name );

		if( $layout_name == 'intro' ) {
			$type = get_sub_field('type');
			$layout_name = ucwords($layout_name) . ' - ' . ucfirst($type);
		} else {
			$name = get_sub_field('name');
			$layout_name = ucwords($layout_name) . ' - ' . $name;
		}

		$title .= '<b>'. $layout_name .'</b>';
		return $title;
	}



		// add custom shortcode
	function make_button( $atts ) {
		$a = shortcode_atts( array(
			'text' => 'Default text',
			'href' => 'Default URL',
			'style' => 'primary',
			'align' => 'left'
		 ), $atts );

		return '
		<div class="button-wrapper" style="text-align: '. $a['align'] .'">
			<a class="button '. $a['style'] .'" href="'. $a['href'] .'">
				<span class="text">'. $a['text'] .'</span>
			</a>
		</div>';
	}

	add_shortcode( 'sbutton', 'make_button' );




	// columned content shortcode
	function hyphen_column( $id ) {
		$all_content = '';

		while ( have_rows('columned_content_maker') ) : the_row();
			if( get_sub_field( 'id' ) == $id['id'] ) :

				$columns = get_sub_field ( 'columns' );
				$column_width = get_sub_field( 'column_width' );
				$column_anim = '';
				$columns_length = sizeof( $columns );
				$gap = get_sub_field('column_gap');

				if( get_sub_field('column_animation') ) :
					$column_anim = 'anim-item';
				endif;

				$column_width = 'calc('. ($column_width * 10) .'vw + '. ($gap/$columns_length) .'px)';
				$row_gap = 'style="margin-left:'. ($gap/-2) .'px; margin-right:'. ($gap/-2) .'px"';
				$column_gap = 'style="
					width: '. $column_width .'; max-width: '. $column_width .';
					padding-left:'. ($gap/2) .'px; padding-right:'. ($gap/2) .'px"';

				$columns_el = '<div class="row column-list" '. $row_gap .'>';
				foreach( $columns as $col ) :
					$columns_el .= '
						<div class="col" '. $column_gap .'>
							<div class="col-inner '. $column_anim .'">'. $col['content'] .'</div>
						</div>';
				endforeach;
				$columns_el .= '</div>';

				$all_content .= $columns_el;

			endif;
		endwhile;

		return $all_content;
	}

	add_shortcode( 'hpcolumn', 'hyphen_column' );





	// post prefix BLOG
	function add_rewrite_rules( $wp_rewrite ) {
		$new_rules = array('blog/(.+?)/?$' => 'index.php?post_type=post&name='. $wp_rewrite->preg_index(1));
		$wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
	}

	add_action('generate_rewrite_rules', 'add_rewrite_rules');
	
	function change_blog_links($post_link, $id=0){
		$post = get_post($id);
		if( is_object($post) && $post->post_type == 'post'){
			return home_url('/blog/'. $post->post_name.'/');
		}
		return $post_link;
	}

	add_filter('post_link', 'change_blog_links', 1, 3);







	/*
	if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);

	function my_jquery_enqueue() {
		$dir = get_template_directory_uri();
		wp_deregister_script('jquery');
		wp_register_script('jquery', $dir . '/js/jquery.min.js', false, null);
		wp_enqueue_script('jquery');
	}
	*/
