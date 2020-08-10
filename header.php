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

		<title><?php echo 'CTAS | ' . $post->post_title ?></title>

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

	<body class="font-light leading-normal font-body">

		<div class="md:flex main-flex">

			<!-- header -->
			<aside class="sticky top-0 z-20 font-normal bg-white md:z-auto md:relative">
				<div class="top-0 left-0 overflow-scroll md:h-full md:fixed md:p-16 nav-inner">

					<!-- top -->
					<div class="flex items-center h-20 aside-top md:block mobile-padding md:h-auto">
						<a class="inline-block md:mb-20 md:h-24 logo" href="<?php echo home_url() ?>">
							<img class="hidden block h-full md:block" 
								src="<?php echo $baseURL ?>/img/logo-alt.svg" alt="<?php bloginfo('name') ?>">
								<img class="block w-32 md:hidden" 
								src="<?php echo $baseURL ?>/img/logo.svg" alt="<?php bloginfo('name') ?>">
						</a>

						<div class="ml-auto login-wrapper content-line">
							<a class="inline-flex items-center text-xs font-bold tracking-widest uppercase" 
								href="/login">
								Log in
								<img class="ml-2" src="<?php bloginfo('template_url') ?>/img/icons/login.svg" />
							</a>
						</div>

						<div class="block ml-4 md:hidden burger-menu">
							<div class="bar bg-green-dark"></div>
							<div class="bar bg-green-dark"></div>
							<div class="bar bg-green-dark"></div>
						</div>
					</div>

					<!-- aside bottom -->
					<div class="hidden aside-bottom md:block">
						<?php
							wp_nav_menu( array(
								'menu' => 'Header',
								'container' => 'ul',
								'menu_class' => 'mobile-padding flex md:hidden justify-evenly text-sm bg-gray-200 pt-2 py-3'
							) );

							wp_nav_menu( array(
								'menu' => 'Sidebar Nav',
								'container' => 'ul',
								'menu_class' => 'my-6 md:mb-16 md:mt-12 mobile-padding md:-mx-4 text-gray-600 space-y-1 text-center md:text-left'
							) )
						?>

						<div class="block md:hidden separator mobile-padding">
							<hr />
						</div>

						<div class="py-5 text-center mobile-padding md:py-0 md:bg-transparent signup-wrapper md:text-left">
							<h3 class="mb-2 text-lg font-bold font-display">Sign up today</h3>
							<p class="mb-3 text-sm opacity-75">Get the clarity of insight from expert sources</p>
							<a href="/join" class="button hover:text-white hover:bg-nodal is-ghost border-nodal text-nodal">join</a>
						</div>
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
				<header class="hidden md:block sticky font-normal top-0 z-10 <?php echo $header_class ?>">
					<div class="container">

						<div class="flex items-center justify-end h-20">
							<?php 
								wp_nav_menu( array(
									'menu' => 'Header',
									'container' => 'ul',
									'menu_class' => 'flex space-x-5 lg:space-x-8 text-sm'
								) )
							?>

							<ul class="flex items-center ml-8 text-sm space-x-5 lg:space-x-8">
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
