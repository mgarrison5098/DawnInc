<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'bg-white text-gray-900 antialiased' ); ?>>

<?php do_action( 'tailpress_site_before' ); ?>

<div id="page" class="min-h-screen flex flex-col">

	<?php do_action( 'tailpress_header' ); ?>

	<header>
		<nav class="uk-navbar-container px-5 " uk-navbar style="background-color: black">
			<div class="uk-navbar-right text-white">
				<a href="" class="rounded-full p-1 m-2 hidden md:flex items-center justify-center bg-dawn text-white no-underline hover:bg-dawn-600"><span uk-icon="icon: facebook" ></span></a>
				<a href="" class="rounded-full p-1 m-2 hidden md:flex items-center justify-center bg-dawn text-white no-underline hover:bg-dawn-600"><span uk-icon="icon: linkedin" ></span></a>
				<a href="" class="rounded-full p-1 m-2 hidden md:flex items-center justify-center bg-dawn text-white no-underline hover:bg-dawn-600"><span uk-icon="icon: instagram" ></span></a>
				<a href="" class="rounded-full p-1 px-3 m-2 hidden md:flex items-center justify-center bg-dawn text-white no-underline hover:bg-dawn-600"><span uk-icon="icon: receiver"></span>(555) 555-5555</a>
				<div class="bg-dawn text-white font-bold uppercase flex items-center justify-center h-full p-3 ml-4 hover:bg-dawn-600 cursor-pointer"><span>Subcontractors</span></div>
			</div>
		</nav>
		<div uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; top: 200">
		<nav class="uk-navbar-container px-5 shadow-lg" uk-navbar style="background-color: white">
            <div class="flex flex-1 items-center">
				<?php if( get_theme_mod( 'themeslug_logo') ) : ?>
				<div class="uk-navbar-item uk-logo">
					<a href='<?php echo esc_url( home_url( '/' ) ); ?>'
						title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> ' rel='home'
						class="navbar-brand">
						<img src='<?php echo esc_url( get_theme_mod( 'themeslug_logo' ) ); ?>'
							alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
					</a>
				</div>
				<?php else: ?>
				<div class="uk-navbar-item uk-logo">
					<a href='<?php echo esc_url( home_url( '/' ) ); ?>'
						title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> ' rel='home'
						class="navbar-brand">
					</a>
				</div>
				<?php endif; ?>
				<ul class="uk-navbar-nav_override hidden md:flex flex-1 m-0 pl-6">
					<?php
					$menu_name = 'header-menu';
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
					<li class="pr-6 <?php echo check_active_menu($item)?>">
						<a href="<?php echo $link; ?>" class="font-bold text-sm lg:text-base uppercase">
							<?php echo $title; ?>
						</a>
					<?php endif; ?>
						<?php if ( $parent_id == $item->menu_item_parent ): ?>
							<?php if ( !$submenu ): $submenu = true; ?>
								<div class="uk-navbar-dropdown">
									<ul class="uk-nav uk-navbar-dropdown-nav">
									<?php endif; ?>
										<li class="p-0 m-0 <?php echo check_active_menu($item)?>">
											<a href="<?php echo $link; ?>" class="font-body text-base uppercase"><?php echo $title; ?></a>
										</li>
									<?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ): ?>
									</ul>
								</div>
							<?php $submenu = false; endif; ?>
						<?php endif; ?>
					<?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id ): ?>
					</li>                           
					<?php $submenu = false; endif; ?>
					<?php $count++; endforeach; ?>
				</ul>
				<div class="flex flex-1 justify-end md:hidden">
					<a href="#offcanvas-slide" uk-toggle  class="rounded-full p-3 m-2 flex items-center justify-center bg-dawn text-white"><span uk-icon="icon: menu" ></span></a>
				</div>

            </div>
        </nav>
		</div>
		<div id="offcanvas-slide" uk-offcanvas="flip: true; overlay: true">
			<div class="uk-offcanvas-bar" style="background: white; padding:0">
				<a href="#offcanvas-slide" uk-toggle  class="bg-dawn text-white font-bold uppercase flex items-center justify-center w-full p-3"><span uk-icon="icon: close"></span><span class="ml-2">Close</span></a>
				<ul class="uk-navbar-nav_override flex flex-col my-8 mx-0 p-0">
				<?php
					$menu_name = 'header-menu';
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
					<li class="p-2 mb-2 bg-gray-100 <?php echo check_active_menu($item)?>">
						<a href="<?php echo $link; ?>" class="font-bold text-sm lg:text-base uppercase p-2">
							<?php echo $title; ?>
						</a>
					</li> 
					<?php endif; ?>
						<?php if ( $parent_id == $item->menu_item_parent ): ?>
							<?php if ( !$submenu ): $submenu = true; ?>
								<div class="">
									<ul class="uk-navbar-nav_override flex flex-col mb-2 mx-0 p-0">
									<?php endif; ?>
										<li class="p-2 px-4 bg-gray-100 m-0 <?php echo check_active_menu($item)?>">
											<a href="<?php echo $link; ?>" class="font-body text-base uppercase"><?php echo $title; ?></a>
										</li>
									<?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ): ?>
									</ul>
								</div>
							<?php $submenu = false; endif; ?>
						<?php endif; ?>
					<?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id ): ?>
					                          
					<?php $submenu = false; endif; ?>
					<?php $count++; endforeach; ?>
				</ul>
			</div>
		</div>


	</header>

	<div id="content" class="site-content flex-grow">

		<?php do_action( 'tailpress_content_start' ); ?>

