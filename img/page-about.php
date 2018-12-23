<?php
/*
 * Template Name: about
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

add_filter('body_class', function($classes){
	// return array_merget($classes, array('blue'));
	return array('blue');
});




get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php

	$navlist = do_shortcode("[ez-toc]");
	$preg = '|<ul class="ez-toc-list">(.*)</ul>|Uis';
	preg_match($preg, $navlist, $matches);
	$navlist = $matches[1];

wp_deregister_script( 'js-cookie' );
wp_deregister_script( 'jquery-smooth-scroll' );
wp_deregister_script( 'jquery-sticky-kit' );
wp_deregister_script( 'jquery-waypoints' );
wp_deregister_script( 'ez-toc-js' );

define( 'EZ_TOC_URL', "https://make.mi.university/wp-content/plugins/easy-table-of-contents/" );
wp_register_script( 'js-cookie', EZ_TOC_URL . "vendor/js-cookie/js.cookie.js", array(), '2.0.3', TRUE );
wp_register_script( 'jquery-smooth-scroll', EZ_TOC_URL . "vendor/smooth-scroll/jquery.smooth-scroll$min.js", array( 'jquery' ), '1.5.5', TRUE );
wp_register_script( 'jquery-sticky-kit', EZ_TOC_URL . "vendor/sticky-kit/jquery.sticky-kit$min.js", array( 'jquery' ), '1.9.2', TRUE );
wp_register_script( 'jquery-waypoints', EZ_TOC_URL . "vendor/waypoints/jquery.waypoints$min.js", array( 'jquery' ), '1.9.2', TRUE );
wp_register_script( 'ez-toc-js', EZ_TOC_URL . "assets/js/front.js", array( 'jquery-smooth-scroll', 'js-cookie', 'jquery-sticky-kit', 'jquery-waypoints' ), '1.7', TRUE );

wp_register_script( 'ez-toc-js', get_template_directory_uri() . "/assets/js/front.js", array( 'jquery-smooth-scroll', 'js-cookie', 'jquery-sticky-kit', 'jquery-waypoints' ), '1.7', TRUE );

$js_vars = array();
$js_vars['smooth_scroll'] = TRUE;
$js_vars['scroll_offset'] = 115;
wp_localize_script( 'ez-toc-js', 'ezTOC', $js_vars );




wp_enqueue_script( 'local-slick', get_template_directory_uri() . "/assets/js/my-slick.js", array('jquery'), null, true );
wp_enqueue_style( 'slider', get_template_directory_uri() . '/css/slick.css', false, null, 'all');
wp_enqueue_style( 'slider-theme', 'https://kenwheeler.github.io/slick/slick/slick-theme.css', false, null, 'all');

?>
	<section class="fix-title <?php echo $post->post_name; ?> page-<?php the_ID(); ?>">
		<div class="wrapper">
			<div class="title-page">
				<?php the_title( '<h1>', '</h1>' ); ?>
				<?php // <h1><b>1.1</b> Об институте</h1> ?>
			</div>
			<div class="page menu-reserve">
				<div class="page-sidebar">
					<div class="page-menu nav-list in-title">
						<ul>
							<?php echo $navlist; ?>
						</ul>
					</div>
				</div>
				<div class="page-content">
<?php					
	$content = get_the_content(false);
	$content = preg_replace($preg, NULL, $content);
	echo $content;
?>					
	
					<?php // the_content(); ?>
					
				</div>
			</div>
		</div>
	</section>
<?php endwhile; endif; ?>


<?php
get_footer();
