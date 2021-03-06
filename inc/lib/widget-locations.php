<?php

/**
 * Codexin Widget class definitions. Defines locations for sidebar and footer widgets.
 *
 * @package 	Codexin
 * @subpackage 	Core
 * @since 		1.0
 */

// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__(  'This script cannot be accessed directly.', 'TEXT_DOMAIN' ) );

if( ! class_exists( 'Codexin_Sidebar_Widget' ) ) {
	/**
	 * Class to register various widget locations for the theme.
	 * 
	 * @since v1.0.0
	 */
	class Codexin_Sidebar_Widget {

		// Registering Main Sidebar Widget Locations
		public static function codexin_sidebar_widgets_init() {
		
			register_sidebar( array(
				'name'				=> esc_html__( 'Sidebar (General)', 'TEXT_DOMAIN' ),
				'id'				=> 'codexin-sidebar-general',
				'description'		=> esc_html__( 'This sidebar will show everywhere the sidebar is enabled, both Posts and Pages.', 'TEXT_DOMAIN' ),
				'before_widget' 	=> '<div id="%1$s" class="%2$s sidebar-widget">',
				'after_widget'  	=> '</div>',			
			) );

			register_sidebar( array(
				'name'				=> esc_html__( 'Sidebar (Pages)', 'TEXT_DOMAIN' ),
				'id'				=> 'codexin-sidebar-page',
				'description'		=> esc_html__( 'This sidebar will show on all Pages.', 'TEXT_DOMAIN' ),
				'before_widget' 	=> '<div id="%1$s" class="%2$s sidebar-widget">',
				'after_widget'  	=> '</div>',		
			) );
			
			register_sidebar( array(
				'name' 				=> esc_html__( 'Sidebar (Blog)', 'TEXT_DOMAIN' ),
				'id'				=> 'codexin-sidebar-blog',
				'description'		=> esc_html__( 'This sidebar will show on all blog Posts.', 'TEXT_DOMAIN' ), 
				'before_widget' 	=> '<div id="%1$s" class="%2$s sidebar-widget">',
				'after_widget'  	=> '</div>',		
			) );
		} 

		// Registering Footer Widget Locations
		public static function codexin_footer_widgets() {

			$widget_count = 4;
			for( $i = 1; $i <= $widget_count ; $i++ ) { 
				register_sidebar( array(
					'name'				=> sprintf( esc_html__( 'Footer (Column-%s)', 'TEXT_DOMAIN' ), $i ),
					'id'				=> 'codexin-footer-col-'. $i .'',
					'description'	 	=> sprintf( esc_html__( 'The widget area for the footer column %s', 'TEXT_DOMAIN'), $i ),
				    'before_title'		=> '<h4 class="widgettitle">',
				    'after_title'		=> '</h4>',
					'before_widget' 	=> '<aside id="%1$s" class="%2$s footer-widget">',
					'after_widget'  	=> '</aside>',			
				) );
			}
		}
	}
}

// Hooking and instantiate the class into widgets_init
add_action( 'widgets_init', function() {
    $codexin_widget = new Codexin_Sidebar_Widget();
    $codexin_widget -> codexin_sidebar_widgets_init();
    $codexin_widget -> codexin_footer_widgets();
});
?>