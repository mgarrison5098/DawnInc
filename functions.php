<?php

/**
 * Theme setup.
 */
function tailpress_setup() {
	add_theme_support( 'title-tag' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'tailpress' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

    add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'editor-styles' );
	add_editor_style( 'css/editor-style.css' );
}

add_action( 'after_setup_theme', 'tailpress_setup' );

/**
 * Enqueue theme assets.
 */
function tailpress_enqueue_scripts() {
	$theme = wp_get_theme();

	wp_enqueue_style( 'tailpress', tailpress_asset( 'css/app.css' ), array(), $theme->get( 'Version' ) );
	wp_enqueue_script( 'tailpress', tailpress_asset( 'js/app.js' ), array(), $theme->get( 'Version' ) );
}

add_action( 'wp_enqueue_scripts', 'tailpress_enqueue_scripts' );

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function tailpress_asset( $path ) {
	if ( wp_get_environment_type() === 'production' ) {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg( 'time', time(),  get_stylesheet_directory_uri() . '/' . $path );
}

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_li_class( $classes, $item, $args, $depth ) {
	if ( isset( $args->li_class ) ) {
		$classes[] = $args->li_class;
	}

	if ( isset( $args->{"li_class_$depth"} ) ) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'tailpress_nav_menu_add_li_class', 10, 4 );

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_submenu_class( $classes, $args, $depth ) {
	if ( isset( $args->submenu_class ) ) {
		$classes[] = $args->submenu_class;
	}

	if ( isset( $args->{"submenu_class_$depth"} ) ) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'tailpress_nav_menu_add_submenu_class', 10, 3 );


function mytheme_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'themeslug_logo_section' , array(
        'title'         => __( 'Logo', 'themeslug' ),
        'priority'      => 30,
        'description'   => 'Upload a logo to replace the default site name and description in the header',
    ));
    $wp_customize->add_setting( 'themeslug_logo' );
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'themeslug_logo', array(
            'label'     => __( 'Logo', 'themeslug' ),
            'section'   => 'themeslug_logo_section',
            'settings'  => 'themeslug_logo',
        )
    ));

	$wp_customize->add_panel( 'super_nav_panel', array(
		'priority'       => 30,
		 'capability'     => 'edit_theme_options',
		 'theme_supports' => '',
		 'title'          => __('Super Nav', 'themeslug'),
		 'description'    => __('Top navigation bar social media links', 'themeslug'),
	) );

	$wp_customize->add_section( 'themeslug_sn_fb_section' , array(
        'title'         => __( 'Facebook', 'themeslug' ),
        'priority'      => 30,
        'description'   => '',
		'panel'  => 'super_nav_panel',
    ));
	$wp_customize->add_setting( 'themeslug_facebook' );
	$wp_customize->add_control( 'show_facebook', array(
		'label'     => __( 'Show Facebook', 'themeslug' ),
		'type' => 'checkbox',
		'settings'  => 'themeslug_facebook',
		'section'   => 'themeslug_sn_fb_section',
	) );
	$wp_customize->add_control( 'facebbok_link', array(
		'label'     => __( 'Facebook Link', 'themeslug' ),
		'type' => 'input',
		'settings'  => 'themeslug_facebook',
		'section'   => 'themeslug_sn_fb_section',
	) );

	$wp_customize->add_section( 'themeslug_sn_insta_section' , array(
        'title'         => __( 'Instagram', 'themeslug' ),
        'priority'      => 30,
        'description'   => '',
		'panel'  => 'super_nav_panel',
    ));
	$wp_customize->add_setting( 'themeslug_instagram' );
	$wp_customize->add_control( 'show_instagram', array(
		'label'     => __( 'Show Instagram', 'themeslug' ),
		'type' => 'checkbox',
		'settings'  => 'themeslug_instagram',
		'section'   => 'themeslug_sn_insta_section',
	) );
	$wp_customize->add_control( 'instagram_link', array(
		'label'     => __( 'Instagram Link', 'themeslug' ),
		'type' => 'input',
		'settings'  => 'themeslug_instagram',
		'section'   => 'themeslug_sn_insta_section',
	) );

	$wp_customize->add_section( 'themeslug_sn_linked_section' , array(
        'title'         => __( 'LinkedIn', 'themeslug' ),
        'priority'      => 30,
        'description'   => '',
		'panel'  => 'super_nav_panel',
    ));
	$wp_customize->add_setting( 'themeslug_linkedin' );
	$wp_customize->add_control( 'show_linkedin', array(
		'label'     => __( 'Show LinkedIn', 'themeslug' ),
		'type' => 'checkbox',
		'settings'  => 'themeslug_linkedin',
		'section'   => 'themeslug_sn_linked_section',
	) );
	$wp_customize->add_control( 'linkedin_link', array(
		'label'     => __( 'LinkedIn Link', 'themeslug' ),
		'type' => 'input',
		'settings'  => 'themeslug_linkedin',
		'section'   => 'themeslug_sn_linked_section',
	) );

	$wp_customize->add_section( 'themeslug_sn_phone_section' , array(
        'title'         => __( 'Phone', 'themeslug' ),
        'priority'      => 30,
        'description'   => '',
		'panel'  => 'super_nav_panel',
    ));
	$wp_customize->add_setting( 'themeslug_phone' );
	$wp_customize->add_setting( 'themeslug_phone_display' );
	$wp_customize->add_control( 'show_phone', array(
		'label'     => __( 'Show Phone Number', 'themeslug' ),
		'type' => 'checkbox',
		'settings'  => 'themeslug_phone',
		'section'   => 'themeslug_sn_phone_section',
	) );
	$wp_customize->add_control( 'phone_link', array(
		'label'     => __( 'Phone Number', 'themeslug' ),
		'type' => 'input',
		'settings'  => 'themeslug_phone',
		'section'   => 'themeslug_sn_phone_section',
	) );
	$wp_customize->add_control( 'phone_display', array(
		'label'     => __( 'Display Text', 'themeslug' ),
		'type' => 'input',
		'settings'  => 'themeslug_phone_display',
		'section'   => 'themeslug_sn_phone_section',
	) );

	$wp_customize->add_section( 'themeslug_sn_sub_section' , array(
        'title'         => __( 'Subcontractor', 'themeslug' ),
        'priority'      => 30,
        'description'   => '',
		'panel'  => 'super_nav_panel',
    ));
	$wp_customize->add_setting( 'themeslug_sub' );
	$wp_customize->add_control( 'show_sub', array(
		'label'     => __( 'Show Subcontractor', 'themeslug' ),
		'type' => 'checkbox',
		'settings'  => 'themeslug_sub',
		'section'   => 'themeslug_sn_sub_section',
	) );
	$wp_customize->add_control( 'sub_link', array(
		'label'     => __( 'Subcontractor', 'themeslug' ),
		'type' => 'input',
		'settings'  => 'themeslug_sub',
		'section'   => 'themeslug_sn_sub_section',
	) );
    
	


	$wp_customize->add_section( 'themeslug_footerlogo_section' , array(
        'title'         => __( 'Footer Logo', 'themeslug' ),
        'priority'      => 30,
        'description'   => 'Upload a footer logo',
    ));
    $wp_customize->add_setting( 'themeslug_footerlogo' );
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'themeslug_footerlogo', array(
            'label'     => __( 'Footer Logo', 'themeslug' ),
            'section'   => 'themeslug_footerlogo_section',
            'settings'  => 'themeslug_footerlogo',
        )
    ));
	$wp_customize->add_setting( 'themeslug_footerslogan' );
    $wp_customize->add_control( 'themeslug_footerslogan', array(
		'label' => __( 'Footer Slogan' ),
		'type' => 'textarea',
		'section' => 'themeslug_footerlogo_section',
	  ) );
}
add_action( 'customize_register', 'mytheme_customize_register' );

function register_my_menus() {
    register_nav_menus(
      array(
        'header-menu' => __( 'Header Menu' ),
		'footer-menu' => __( 'Footer Menu' ),
        // 'extra-menu' => __( 'Extra Menu' )
       )
     );
   }
   add_action( 'init', 'register_my_menus' );

   function check_active_menu( $menu_item ) {
    $actual_link = ( isset( $_SERVER['HTTPS'] ) ? "https" : "http" ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if ( $actual_link == $menu_item->url ) {
        return 'uk-active';
    }
    return '';
}
