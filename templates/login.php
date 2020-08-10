<?php

	// Template Name: Login

	get_header();

?>

<section id="join" class="footer-absolute">
	<div class="container">
		<div class="flex flex-wrap items-center justify-center min-h-screen -mt-20">
			<div class="order-first w-full lg:w-5/12 lg:order-none lg:offset-1">
				<h2 class="mb-6 text-xl font-display">Log in</h2>
				<form action="" class="space-y-3">
					<?php
						render_input('username', 'text');
						render_input('password', 'password');
					?>
					<div class="submit-wrapper">
						<input class="block w-7/12 px-4 py-3 ml-auto text-sm tracking-widest text-center text-white uppercase cursor-pointer hover:text-nucleus hover:bg-white bg-nucleus rounded-xl transition duration-300" 
						value="login" />
					</div>
				</form>
				<p class="mt-6 text-sm">Forgot your password? <a href="<?php bloginfo('template_url') ?>/login">Click</a> here</p>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
