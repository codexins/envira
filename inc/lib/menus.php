<?php

/**
 * Main navigation function
 *
 * @package 	Codexin
 * @subpackage 	Core
 * @since 		1.0
 */

// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'TEXT_DOMAIN' ) );

/**
 * Registering Nav menu Locations
 *
 */
register_nav_menus( array(
	'main_menu' 			=> 'Primary Menu',
	'mobile_menu' 			=> 'Mobile Menu'
) );

/**
 * Function to get Menus in the assigned Menu locations
 * 
 * @uses 	wp_nav_menu()
 * @param  	string    		$menu_type    The registered name of the menu. Possible values: main_menu/mobile_menu
 * @since 	v1.0
 */
function codexin_menu( $menu_type ) {	
	wp_nav_menu( init_codexin_menu( $menu_type ) );
}

/**
 * Arguments for Menu Initialization
 * 
 * @param  	string    $menu_type    The registered name of the menu
 * @return  array 	  $args 		Arguments to pass in wp_nav_menu()
 * @since   v1.0
 */
function init_codexin_menu( $menu_type ) {
	$args = array(
		'theme_location'  => $menu_type,
		'menu'            => $menu_type,
		'container'       => ( $menu_type == 'mobile_menu' ) ? 'div' : 'ul',
		'container_class' => ( $menu_type == 'mobile_menu' ) ? 'nav-wrapper' : 'main-menu',
		'container_id'    => '',
		'menu_class'      => ( $menu_type == 'mobile_menu' ) ? 'c-menu__items' : 'sf-menu',
		'menu_id'         => ( $menu_type == 'mobile_menu' ) ? 'mobile-menu' : $menu_type,
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
	);

	return $args;
}
?>