<!DOCTYPE>
<html lang="en">
	<!-- head-->
	<head>
		<?php
			$baseURL = get_bloginfo('template_url');
			include( __DIR__ . '/includes/utils.php' );
			wp_head();
		?>

		<title><?php echo $post->post_title ?></title>

		<link rel="icon" href="<?php $baseURL ?>/img/favicon.png" type="image/x-icon" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

		<!-- meta tags for sharing -->
		<meta property="og:url" content="<?php echo home_url() ?>" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="<?php echo $post->post_title ?>" />
		<meta property="og:description" content="Your description" />

		<?php
			if( has_post_thumbnail() ):
				$thumbnail = get_the_post_thumbnail_url(); 
				echo '<meta property="og:image" content="'. $thumbnail .'" />';
			endif;
		?>
	</head>

	<body class="text-gray-900 leading-normal">

		<!-- header -->
		<header class="bg-gray-100">
			<div class="container border-gray">
				<div class="flex justify-between items-center">
					<a class="logo block w-12" href="<?php echo home_url() ?>">
						<img class="w-full" src="<?php echo $baseURL ?>/img/logo.png" alt="<?php bloginfo('name') ?>">
					</a>
					<ul class="header-nav flex items-center space-x-6 text-gray-600">
						<?php
							$menu = wp_get_nav_menu_items('Primary', array());
							foreach( $menu as $item ) :
								$url = esc_url( get_permalink( get_page_by_title( $item->title ) ) );
								echo '<li><a href="'. $url .'">'. $item->title .'</a></li>';
							endforeach;
						?>
						<li>
							<a class="button" href="">Login</a>
						</li>
					</ul>
				</div>
			</div>
		</header>
