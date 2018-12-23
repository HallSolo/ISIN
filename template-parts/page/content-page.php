<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('container-fluid'); ?>>
	<header class="entry-header row">
		<?php the_title( '<h1 class="entry-title col-md-12">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<div class="main-content row">
    	<div class="col-md-3 sticky-top info-program float-left">
            <div class="sidebar__inner" id="sidebar">
				<?php echo do_shortcode("[ez-toc]"); ?>
			</div>
		</div>
		<div class="offset-md-3 col-md-9 content">
		<div class="entry-content">
		<?php
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'isin' ),
					'after'  => '</div>',
				)
			);
		?>
		</div><!-- .entry-content -->
		</div>
	</div>
</article><!-- #post-## -->
