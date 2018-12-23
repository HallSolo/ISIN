<?php
/*
 * Template Name: lyceum
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header();

?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php

	$navlist = do_shortcode("[ez-toc]");
	$preg = '|<ul class="ez-toc-list">(.*)</ul>|Uis';
	preg_match($preg, $navlist, $matches);
	$navlist = $matches[1];

/*

wp_deregister_script( 'js-cookie' );
wp_deregister_script( 'jquery-smooth-scroll' );
wp_deregister_script( 'jquery-sticky-kit' );
wp_deregister_script( 'jquery-waypoints' );
wp_deregister_script( 'ez-toc-js' );

define( 'EZ_TOC_URL', "https://make.mi.university/wp-content/plugins/easy-table-of-contents/" );
wp_register_script( 'js-cookie', EZ_TOC_URL . "vendor/js-cookie/js.cookie.js", array(), '2.0.3', TRUE );
wp_register_script( 'jquery-smooth-scroll', EZ_TOC_URL . "vendor/smooth-scroll/jquery.smooth-scroll.min.js", array( 'jquery' ), '1.5.5', TRUE );
wp_register_script( 'jquery-sticky-kit', EZ_TOC_URL . "vendor/sticky-kit/jquery.sticky-kit.min.js", array( 'jquery' ), '1.9.2', TRUE );
wp_register_script( 'jquery-waypoints', EZ_TOC_URL . "vendor/waypoints/jquery.waypoints.min.js", array( 'jquery' ), '1.9.2', TRUE );

wp_register_script( 'ez-toc-js', get_template_directory_uri() . "/assets/js/front.js", array( 'jquery-smooth-scroll', 'js-cookie', 'jquery-sticky-kit', 'jquery-waypoints' ), '1.7', TRUE );

*/

$js_vars = array();
$js_vars['smooth_scroll'] = TRUE;
$js_vars['scroll_offset'] = 115;
wp_localize_script( 'ez-toc-js', 'ezTOC', $js_vars );


wp_enqueue_script( 'local-slick', get_template_directory_uri() . "/assets/js/my-slick.js", array('jquery'), null, true );
wp_enqueue_style( 'slider', get_template_directory_uri() . '/css/slick.css', false, null, 'all');
wp_enqueue_style( 'slider-theme', 'https://kenwheeler.github.io/slick/slick/slick-theme.css', false, null, 'all');

?>
	<section class="fix-title <?php echo $post->post_name; ?>">
		<div class="wrapper">
			<div class="title-page">
				<?php $num = '<b>'.get_field('number').'</b> ';?>
				<?php the_title( '<h1>'.$num, '</h1>' ); ?>
				<?php // <h1><b>1.1</b> Об институте</h1> ?>
			</div>
			
			
			
			<div class="page menu-reserve">
				<div class="page-sidebar">
					<div class="page-menu nav-list in-title">
						<div class="page-sidebar-social">
							<div class="page-social">
								<?php echo str_replace("<a","<a target=_blnak",strip_tags(wp_nav_menu( array( 'menu' => 17, 'menu_class' => 'footer-social', 'container' => false, 'items_wrap' => '%3$s', 'depth' => 0, 'echo' => false) ), '<a>' )); ?>
								
							</div>
						</div>						
						<ul>
							<?php echo $navlist; ?>
							<li><a href="#l-idea" title="События">События</a></li>
						</ul>
					</div>
				</div>
				<div class="page-content">
<?php					
	$content = get_the_content(false);
	$content = apply_filters( 'the_content', $content );
	$content = preg_replace($preg, NULL, $content);
					
					
					
					
			$other = get_field('lyceum_posts');
			$lyceum_posts = array();
			foreach ( $other as $post ) {
        		setup_postdata( $post );
				
				$lyceum_posts[] = '<div class="page-col">';
				$lyceum_posts[] = '<h3><a class="page-col-lab" href="'.get_permalink().'">'.get_the_title().'</a></h3>';
				if(has_excerpt())
					$lyceum_posts[] = '<p>'.get_the_excerpt().'</p>';
				$lyceum_posts[] = '</div>';
				
				

				//get_template_part('template-parts/post/lyceum/preview');
				
    		}
    		wp_reset_postdata();
			
			$content = str_replace('[LYCEUM_POSTS]','<div class="lyceum-col" id="purpure-none">'. implode("\n",$lyceum_posts).'</div>',$content);
					
					
					
	echo $content;
?>					
	
					<?php // the_content(); ?>
					
					
					
				</div>
			</div>
<?php endwhile; endif; ?>
			
			

			
<h3 class="title-page-small" id="idea"><span class="ez-toc-section" id="l-idea">События</span></h3>		
<div class="related">
	
<?php	
				$now = new DateTime();
	    		$datenow = $now->format('Y.m.d H:i');
				$args = array(
					'post_type'			=> 'events',
					'meta_query' 		=> array(
						array(
	        				'key'			=> 'date',
	        				'compare'		=> '>=',
	        				'value'			=> $datenow,
	        				'type'			=> 'DATETIME'
	    				)
    				),
					'order'             => 'DESC',
					'category_name'     => 'lyceum'
					);

				$posts = new WP_Query($args);

					if ($posts->have_posts()) :
				while ($posts->have_posts()) :
				
					$posts->the_post();
				
						get_template_part('template-parts/page/content-events');
				

				endwhile; // End of the loop.
				endif;
				?>	
</div>			
<a href="#" class="related-arrow"></a>			
			
			
			
			
			
			
			
			
		</div>
	</section>


<?php
get_footer();