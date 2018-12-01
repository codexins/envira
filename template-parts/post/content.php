<?php

/**
 * Template part for displaying posts
 *
 * @package 	Codexin
 * @subpackage 	Core
 * @since 		1.0
 */

// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'envira' ) );

$length_switch   = codexin_get_option( 'cx_enable_blog_title_excerpt' );
$title_length    = codexin_get_option( 'cx_post_title_length' );
$excerpt_length  = codexin_get_option( 'cx_post_excerpt_length' );
$read_more       = codexin_get_option( 'cx_enable_readmore' );
$social_share 	 = codexin_get_option( 'cx_enable_share_link' );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-item' ); ?>>
	<?php
	if ( ! post_password_required() ) {
		if( has_post_thumbnail() ) { ?>
			<div class="post-media">
				<?php 
				echo ( ! is_single() ) ? '<a href="' . esc_url( get_the_permalink() ) . '">' : '';
					the_post_thumbnail( 'codexin-fr-rect-two' );
				echo ( ! is_single() ) ? '</a>' : '';
				?>
			</div> <!-- end of post-media -->
		<?php 
		}
	} ?>

	<div class="post-content-wrapper">
		<div class="post-meta-wrapper">	
			<span class="post-date"><i class="fa fa-calendar"></i> <a href="<?php echo get_day_link( get_post_time( 'Y' ), get_post_time( 'm' ), get_post_time( 'j' ) );  ?>"><?php the_time( get_option( 'date_format' ) ); ?></a></span>
			<span class="post-author"><i class="fa fa-user"></i> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a></span>
			<span class="post-categories"><i class="fa fa-tag"></i> <?php the_category( ', ' ); ?></span>
		</div>

		
		<h2 class="post-title">
			<?php if( ! is_single() ) { ?>
				<a href="<?php the_permalink(); ?>">
                    <?php
                    if( $length_switch ) {                            
                        // Limit the title characters
                        echo apply_filters( 'the_title', codexin_char_limit( $title_length, 'title' ) );
                    } else {
                        the_title();
                    }
                    ?>
				</a>
			<?php } else {
				the_title();
			}
			?>
		</h2>
		
		<?php if( ! is_single() ) { ?>
			<div class="post-excerpt">
				<?php 
                if( $length_switch ) {
                    echo '<p>';
                        echo apply_filters( 'the_content', codexin_char_limit( $excerpt_length, 'excerpt' ) );
                    echo '</p>';
                } else {
                    the_excerpt();
                }
				?>
			</div>
		<?php } else {
			echo '<div class="post-details">';
				the_content();

				// This section is for pagination purpose for a long large page that is seperated using nextpage tags
	            $args = array(
	                'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'envira' ) . '</span>',
	                'after'       => '</div>',
	                'link_before' => '<span>',
	                'link_after'  => '</span>',
	                'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'envira' ) . ' </span>%',
	                'separator'   => '<span class="screen-reader-text">, </span>',
	            );                 
	            wp_link_pages( $args );
			echo '</div>';
		}
		?>
	</div> <!-- end of post-content-wrapper -->
	
	<div class="post-footer">
		<?php 
		if( ! is_single() ) { 
			if( $read_more ) {  ?>				
				<div class="read-more">
					<a href="<?php the_permalink(); ?>" class="default-btn"><?php echo esc_html__( 'Read More', 'envira' ); ?></a>
				</div>
			<?php 
			}
		} else {
	        if( has_tag() ) { ?>
	    		<div class="post-tag">
		 			<?php the_tags(esc_html__('TAGS: &nbsp;', 'envira'),',&nbsp;&nbsp; ',''); ?>
	    		</div>
	        <?php 
	    	}

			if( $social_share ) { ?>
			    <div class="social-icons">            
			        <div class="caption"><span class="fa fa-share"></span> <?php esc_html_e('Share: ', 'envira'); ?></div>
					<ul>
                        <li><a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( get_the_permalink() ); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="twitter" href="https://twitter.com/home?status=<?php echo esc_url( get_the_permalink() ); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="google-plus" href="https://plus.google.com/share?url=<?php echo esc_url( get_the_permalink() ); ?>" target="_blanl"><i class="fa fa-google-plus"></i></a></li>
                        <li><a class="linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url( get_the_permalink() ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    </ul>      
			    </div>
			<?php }
		}
		?>
	</div> <!-- end of post-footer -->
</article> <!-- end of #post-## -->