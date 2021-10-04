
<?php do_action( 'tailpress_content_end' ); ?>

</div>

<?php do_action( 'tailpress_content_after' ); ?>

<footer id="colophon" class="site-footer bg-black py-12" role="contentinfo">
	<?php do_action( 'tailpress_footer' ); ?>
	<div class="px-4 md:px-8 max-w-7xl m-auto">
		<nav class="hidden lg:block">
			<ul class="footer-nav text-white flex justify-start p-0 max-w-xl">
				<?php
				$menu_name = 'footer-menu';
				$locations = get_nav_menu_locations();
				$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
				$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
				$count = 0;
				$submenu = false;

				foreach( $menuitems as $item ):

					$link = $item->url;
					$title = $item->title;
					// item does not have a parent so menu_item_parent equals 0 (false)
					if ( !$item->menu_item_parent ):

					// save this id for later comparison with sub-menu items
					$parent_id = $item->ID;
				?>

				<li class="flex-1 pr-6">
					<a href="<?php echo $link; ?>" class="text-white font-bold text-base uppercase">
						<?php echo $title; ?>
					</a>
				<?php endif; ?>

					<?php if ( $parent_id == $item->menu_item_parent ): ?>

						<?php if ( !$submenu ): $submenu = true; ?>
						<ul class="p-0 m-0">
						<?php endif; ?>

							<li class="p-0 m-0">
								<a href="<?php echo $link; ?>" class="text-white font-body text-sm uppercase"><?php echo $title; ?></a>
							</li>

						<?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ): ?>
						</ul>
						<?php $submenu = false; endif; ?>

					<?php endif; ?>

				<?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id ): ?>
				</li>                           
				<?php $submenu = false; endif; ?>

				<?php $count++; endforeach; ?>

			</ul>
		</nav>
		<nav class="block lg:hidden uk-navbar-container" uk-navbar style="background-color: black">
			<div class="uk-navbar-center text-white justify-center">
				<a href="" class="rounded-full p-2 m-2 flex items-center justify-center bg-dawn text-white"><span uk-icon="icon: facebook" ></span></a>
				<a href="" class="rounded-full p-2 m-2 flex items-center justify-center bg-dawn text-white"><span uk-icon="icon: linkedin" ></span></a>
				<a href="" class="rounded-full p-2 m-2 flex items-center justify-center bg-dawn text-white"><span uk-icon="icon: instagram" ></span></a>
				<a href="" class="rounded-full p-2 pr-4 m-2 flex items-center justify-center bg-dawn text-white"><span class="pl-2 pr-3"><span uk-icon="icon: receiver" class="align-text-top"></span></span>(555) 555-5555</a>
			</div>
		</nav>
	</div>
	<div class="p-4 md:p-8 max-w-7xl m-auto"><hr class="m-0"/></div>
	<div class="px-4 md:px-8 max-w-7xl m-auto">
		<div class="flex justify-between items-center flex-col lg:flex-row">
			<?php if( get_theme_mod( 'themeslug_logo') ) : ?>
					<a href='<?php echo esc_url( home_url( '/' ) ); ?>'
						title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> ' rel='home'
					>
						<img src='<?php echo esc_url( get_theme_mod( 'themeslug_footerlogo' ) ); ?>'
							alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'
							class="m-auto"
						>
					</a>
			<?php endif; ?>
			<h2 class="font-body text-lg text-white uppercase flex-1 text-center lg:text-right m-0">PLANNING, BUILDING, MOVING <u>TOGETHER</u></h2>
		</div>
		<div class="text-center font-body lg:text-right text-white flex-1 justify-self-end">
				&copy; <?php echo date_i18n( 'Y' );?> - <?php echo get_bloginfo( 'name' );?>
		</div>
	</div>
</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
