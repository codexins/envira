<?php

/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package 	Codexin
 * @subpackage 	Templates
 */

// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'envira' ) );

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11"/>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!--[if lt IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please upgrade your browser to improve your experience.</p>
    <![endif]-->

	<?php if( codexin_get_option( 'cx_enable_pageloader' ) ) { ?>
    <!-- Site Loader started-->
    <div class="cx-pageloader">
        <div class="cx-pageloader-inner">
            <label> &#8226;</label>
            <label> &#8226;</label>
            <label> &#8226;</label>
            <label> &#8226;</label>
            <label> &#8226;</label>
            <label> &#8226;</label>
        </div>
    </div>
    <!-- Site Loader Finished-->

    <?php } ?>

	<!-- Start of Mobile Navigation -->
	<div class="mobile-menu">
		<nav id="c-menu--slide-left" class="c-menu c-menu--slide-left d-block d-sm-block d-md-none">
		    <button class="c-menu__close"><?php echo esc_html__( '&larr; Back', 'envira' ); ?></button>
		    <?php codexin_menu( 'mobile_menu' ); ?>
		</nav>
	</div> <!-- end of mobile-menu -->

	<!-- Start of Whole Site Wrapper with mobile menu support -->
	<div id="o-wrapper" class="o-wrapper">

		<?php $header_bg_image = ( ! empty( get_header_image() ) ) ? 'background:url(' . esc_url( get_header_image() ) . ')' : '' ?>

		<!-- Start of Header -->
		<header class="header<?php echo is_front_page() ? esc_attr(' front-header') : esc_attr(' inner-header'); ?>" style="<?php echo esc_attr( $header_bg_image ); ?>">
			<div class="intelligent-header header--fixed">
				<div class="header-top">
					<div class="container">
						<div class="row">
							<div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="social-icon ">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                </div>
                            </div> <!-- end of col -->

                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="top-content text-right">
                                    <a href="tel:+1123456789"><i class="fa fa-volume-control-phone"></i> (123) 456-7890</a>
                                    <span class="bar">|</span>
                                    <a href="mailto:test@example.com"><i class="fa fa-envelope"></i> test@example.com</a>
                                </div>
                            </div> <!-- end of col -->
                        </div> <!-- end of row -->
                    </div>
                </div> <!-- end of header-top -->

                <div class="header-wrapper">
                	<div class="header-inline">
                		<div class="container">
                			<div class="row">
                				<div class="col-8 col-sm-8 col-md-3 col-mg-3">
									<!-- Logo -->
									<div class="logo">
										<?php 
											the_custom_logo();
											// Header Text
											$header_text = display_header_text();
											if( $header_text == true ) { ?>
			                                    <h1 class="site-title">
			                                    	<a id="header_text" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
			                                    		<?php echo esc_html( get_bloginfo('name') ); ?>
			                                    	</a>
			                                    	<p class="site-description"><?php echo esc_html( get_bloginfo('description') ); ?></p>
												</h1>
											<?php }
										 ?>
									</div> <!-- end of logo -->
                				</div> <!-- end of col -->

                				<div class="col-4 col-sm-4 col-md-9 col-lg-9">
									<nav class="d-none d-sm-none d-md-block">
										<?php codexin_menu( 'main_menu' ); ?>
									</nav> <!-- end of nav -->
									
									<div class="mobile-menu-button">
										<button id="c-button--slide-left" type="button" class="c-button d-block d-sm-block d-md-none navbar-toggle">
											<span class="sr-only"><?php echo esc_html__( 'Toggle navigation', 'envira' ); ?></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
										</button>
									</div> <!-- end of mobile-menu-button -->
                				</div> <!-- end of col -->
                			</div>
                		</div> <!-- end of container -->
                	</div> <!-- end of header-inline -->
                </div> <!-- end of header-wrapper -->
            </div> <!-- end of intelligent-header -->
        </header> <!-- end of header -->
        
        <div class="intelligent-header-space"></div> <!-- empty div with a height of header height-->

		<?php 
		if( is_page_template( 'page-templates/page-home.php' ) ) {
			// Get the Slider
			get_header( 'home' ); 
		} else {
			if( codexin_meta( 'codexin_disable_page_title' ) == 0 ) {
				// Get the Page Title
				get_template_part( 'template-parts/header/page', 'title' );
			}
		}
		?>
