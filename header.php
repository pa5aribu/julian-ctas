<!DOCTYPE>
<html lang="en">
	<!-- head-->
	<head>
		<?php
			$ctas_var = $GLOBALS['ctas'];

			$baseURL = get_bloginfo('template_url');
			include( __DIR__ . '/includes/utils.php' );
			wp_head();
		?>

		<title><?php echo $post->post_title ?></title>

		<link rel="icon" href="<?php echo $baseURL ?>/img/favicon.png" type="image/x-icon" />
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

	<body class="leading-normal">

		<div class="flex main-flex">

			<!-- header -->
			<aside class="bg-white">
				<div class="fixed top-0 left-0 h-full px-16 py-16 overflow-scroll nav-inner">
					<a class="block h-24 mb-20 logo" href="<?php echo home_url() ?>">
						<img class="block h-full" 
							src="<?php echo $baseURL ?>/img/logo-alt.svg" alt="<?php bloginfo('name') ?>">
					</a>

					<div class="relative transform translate-y-px login-wrapper content-line">
						<a class="inline-flex items-center text-xs font-bold tracking-widest uppercase" 
							href="/login">
							Log in
							<img class="ml-2" src="<?php bloginfo('template_url') ?>/img/icons/login.svg" />
						</a>
					</div>

						<?php
							wp_nav_menu( array(
								'menu' => 'Sidebar Nav',
								'container' => 'ul',
								'menu_class' => 'mt-8 mb-16 -mx-4 text-gray-600 space-y-1'
							) )
						?>

					<div class="signup-wrapper">
						<h3 class="mb-2 text-lg font-bold">Sign up today</h3>
						<p class="mb-3 text-sm opacity-75 lg:w-3/4">Get the clarity of insight from expert sources</p>
						<a href="/join" class="button hover:text-white hover:bg-nodal is-ghost border-nodal text-nodal">join</a>
					</div>
				</div>
			</aside>

			<div id="content" class="relative w-full min-h-screen text-white">
				<?php
					$thumbnail = get_the_post_thumbnail_url($post);
					if($post->post_type == 'page' && $thumbnail) {
						$header_class = 'has-bg';
					} else {
						$header_class = '';
					}
				?>
				<header class="sticky top-0 z-10 <?php echo $header_class ?>">
					<div class="container">

						<div class="flex items-center justify-end h-20">
							<?php 
								wp_nav_menu( array(
									'menu' => 'Header',
									'container' => 'ul',
									'menu_class' => 'flex space-x-8 text-sm'
								) )
							?>

							<ul class="flex items-center ml-8 text-sm space-x-8">
								<li class="w-px h-8 bg-white opacity-25 separator"></li>
								<li>
								<a class="block" href="/join">Join</a>
								</li>
								<li>
									<a href="/login" class="text-white border-white button hover:text-nucleus is-ghost">
										log in
										<img class="ml-2" src="<?php bloginfo('template_url') ?>/img/icons/login.svg" />
									</a>
								</li>
							</ul>
						</div>

					</div>
				</header>
