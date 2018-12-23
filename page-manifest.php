<?php
/*
 * Template Name: manifest
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */


// parse_url($url, PHP_URL_PATH);


$page_color = check_page_style( basename(get_permalink()) );
if( $page_color[0] !== '' ){
	add_filter('body_class', function($classes){
		global $page_color;
		return array( $page_color[0] );
	});
}
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
wp_register_script( 'jquery-smooth-scroll', EZ_TOC_URL . "vendor/smooth-scroll/jquery.smooth-scroll$min.js", array( 'jquery' ), '1.5.5', TRUE );
wp_register_script( 'jquery-sticky-kit', EZ_TOC_URL . "vendor/sticky-kit/jquery.sticky-kit$min.js", array( 'jquery' ), '1.9.2', TRUE );
wp_register_script( 'jquery-waypoints', EZ_TOC_URL . "vendor/waypoints/jquery.waypoints$min.js", array( 'jquery' ), '1.9.2', TRUE );

wp_register_script( 'ez-toc-js', get_template_directory_uri() . "/assets/js/front.js", array( 'jquery-smooth-scroll', 'js-cookie', 'jquery-sticky-kit', 'jquery-waypoints' ), '1.7', TRUE );

*/

$js_vars = array();
$js_vars['smooth_scroll'] = TRUE;
$js_vars['scroll_offset'] = 115;
wp_localize_script( 'ez-toc-js', 'ezTOC', $js_vars );

?>
	<section class="fix-title <?php echo $post->post_name; ?> page-<?php the_ID(); ?>">
		<div class="wrapper">
			<div class="title-page">
				<?php $num = '<b>'.get_field('number').'</b> ';?>
				<?php the_title( '<h1>'.$num, '</h1>' ); ?>
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
	$content = apply_filters( 'the_content', $content );
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
