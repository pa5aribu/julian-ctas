<?php

	// Template Name: Join

	get_header();

	$plans = [
		'Free subscription to the CTAS newsletter to learn about new blog postings and reports',
		'Individual State Report ($29.99) Purchase a standalone report for the state where you reside',
		'Students & Families Subscription Access ($49.99) Access to all Students & Families reports, including state and college reports',
		'Professional Subscription ($200) Access all materials on the site, including industry reports'
	]

?>

<section id="join" class="min-h-screen pt-16 pb-16 md:-mt-20 lg:pb-32 footer-absolute">
	<div class="container md:mt-20 lg:mt-16">
		<div class="flex flex-wrap">
			<div class="w-full mt-16 lg:w-6/12 lg:mt-0">
				<h2 class="mb-6 font-bold section-title">Subscription options</h2>
				<div class="plans space-y-6">
					<?php foreach($plans as $index=>$plan) { ?>
						<div class="plan rounded cursor-pointer leading-5 text-opacity-50 border-opacity-50 
						<?php ($index==0) ? print 'is-active' : print '' ?>"><?php echo $plan ?></div>
					<?php } ?>
				</div>
				<p class="mt-8 text-sm lg:mt-16">By subscribing to CTAS services, you agree to the linked Terms and Conditions.
					<a href="">Please click to read the Terms and Conditions.</a>
				</p>
			</div>

			<div class="order-first w-full lg:w-5/12 lg:order-none lg:offset-1 form-wrapper">
				<h2 class="mb-6 text-xl font-display">Sign up</h2>
				<form action="" class="space-y-3">
					<?php
						render_input('first name', 'text');
						render_input('last name', 'text');
						render_input('email', 'email');
						render_input('username', 'text');
						render_input('password', 'password');
					?>
					<div class="submit-wrapper">
						<input class="block w-7/12 px-4 py-3 ml-auto text-sm tracking-widest text-center text-white uppercase cursor-pointer hover:text-nucleus hover:bg-white bg-nucleus rounded-xl transition duration-300" 
						value="submit" />
					</div>
				</form>
				<p class="mt-6 text-sm">Already have an account? <a href="<?php bloginfo('template_url') ?>/login">Log in</a> here</p>
			</div>
		</div>
	</div>

	<div class="h-12 md:h-16"></div>
</section>

<?php get_footer(); ?>
