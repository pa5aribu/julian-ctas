		<!-- footer -->
		<footer class="my-10">
			<div class="container">

				<ul class="footer-nav flex justify-center space-x-6 text-gray-600 text-sm">
					<?php
						$footer_menu = wp_get_nav_menu_items('Footer', array());
						foreach( $footer_menu as $item ) :
							$url = esc_url( get_permalink( get_page_by_title( $item->title ) ) );
							echo '<li><a class="hover:underline" href="'. $url .'">'. $item->title .'</a></li>';
						endforeach;
					?>
					<li>
						<div>&copy; <?php echo get_the_date('Y') ?> CTAS</div>
					</li>
				</ul>

			</div>
		</footer>

		<?php wp_footer () ?>

	</body>
</html>
