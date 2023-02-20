<?php
/**
 * OceanWP Child Theme Functions
 *
 * When running a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions will be used.
 *
 * Text Domain: oceanwp
 * @link http://codex.wordpress.org/Plugin_API
 *
 */

/**
 * Load the parent style.css file
 *
 * @link http://codex.wordpress.org/Child_Themes
 */
function oceanwp_child_enqueue_parent_style() {

	// Dynamically get version number of the parent stylesheet (lets browsers re-cache your stylesheet when you update the theme).
	$theme   = wp_get_theme( 'OceanWP' );
	$version = $theme->get( 'Version' );

	// Load the stylesheet.
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'oceanwp-style' ), $version );
	
}
/*police du theme enfant*/
function ocean_add_custom_fonts()
	{
		return array ('Syne-Extra', 'Syne-Regular');
	}

add_action( 'wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style' );

/*page admin*/ 
add_filter( 'wp_nav_menu_items', 'add_admin', 10, 2);
function add_admin ( $items, $args) 
{
    if (is_user_logged_in() && $args->menu =='planty') 
	{
        $items.= '<li class="menu-item menu-item-type-post_type menu-item-object-page parent hfe-creative-menu"><a class="hfe-menu-item">Admin</a></li>';
    }
    elseif (!is_user_logged_in() && $args->menu == 'planty') 
	{
		$items.= '<li class="menu-item menu-item-type-post_type menu-item-object-page parent hfe-creative-menu"><a class="hfe-menu-item">Vous n\'êtes pas connecté</a></li>';
    }
    return $items;
}

/*add_filter( 'wp_nav_menu_items', 'add_extra_item_to_nav_menu', 10, 2 );
function add_extra_item_to_nav_menu( $items, $args ) 
{
    if (is_user_logged_in() && $args->menu == 303) 
	{
        $items .= '<li><a href="'. get_permalink( get_option('woocommerce_myaccount_page_id') ) .'">My Account</a></li>';
    }
    elseif (!is_user_logged_in() && $args->menu == 303) 
	{
        $items .= '<li><a href="' . get_permalink( wc_get_page_id( 'myaccount' ) ) . '">Sign in  /  Register</a></li>';
    }
    return $items;
}*/