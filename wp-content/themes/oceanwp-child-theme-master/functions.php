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

/* fonction de base pour le chargement du theme enfant
add_action( 'wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style' );
function oceanwp_child_enqueue_parent_style() {

	// Dynamically get version number of the parent stylesheet (lets browsers re-cache your stylesheet when you update the theme).
	$theme   = wp_get_theme( 'OceanWP' );
	$version = $theme->get( 'Version' );

	// Load the stylesheet.
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'oceanwp-style' ), $version );
	
}*/
//priorité de chargement du theme
add_action('wp_enqueue_scripts', 'load_child_style', 20);
function load_child_style() {
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


/*page admin*/ 
add_filter( 'wp_nav_menu_items', 'add_admin', 10, 2);
function add_admin ( $items, $args) 
{
    if (is_user_logged_in() && $args->menu =='planty') 
	{
		$class = 'effetSurvol ordre menu-item menu-item-type-post_type menu-item-object-page parent hfe-creative-menu';
        $items.= '<li class="'.$class.'"><a href="http://planty1.local" class="hfe-menu-item">Admin</a></li>';
    }
    elseif (!is_user_logged_in() && $args->menu == 'planty') 
	{
	
    }
    return $items;
}