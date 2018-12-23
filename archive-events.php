<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
get_header(); ?>

    <main id="main"  class="dev grey" role="main">
        <div class="wrapper">

			<div class="title-page dev-title">
			<?php if (have_posts()) : ?>
                <?php echo '<h2 class="title">'.post_type_archive_title('<i>3.1</i> ', false).'</h2>'; ?>
            <?php endif; ?>
			</div>
			
			<div class="dev-nav">
<?php 
$walker = new mainMenuWalker ();
echo wp_nav_menu ( array ( 'walker' => $walker,'menu' => 16, 'container' => false, 'items_wrap' => '%3$s', 'depth' => 0, 'echo' => false ) );	
?>
			</div>

			<div class="related">

				<?php
				
				$event_type = $_GET['event_type'] ? $_GET['event_type'] : 'all';
				$compare = $event_type == 'archive' ? '<' : '>=';
				
				$now = new DateTime();
	    		$datenow = $now->format('Y.m.d H:i');
				$args = array(
					'post_type'			=> 'events',
					'meta_query' 		=> array(
						array(
	        				'key'			=> 'date',
	        				'compare'		=> $compare,
	        				'value'			=> $datenow,
	        				'type'			=> 'DATETIME'
	    				)
    				),
					'order'             => 'DESC'
					);
				if( $event_type != "all" AND $event_type != "archive" ){
					$args['category_name'] = $event_type;
				}
				$posts = new WP_Query($args);
				?>

				<?php
				if ($posts->have_posts()) :
				while ($posts->have_posts()) :
				
					$posts->the_post();
				
						get_template_part('template-parts/page/content-events');
				

				// If comments are open or we have at least one comment, load up the comment template.
				if (comments_open() || get_comments_number()) :
				comments_template();
				endif;

				endwhile; // End of the loop.
				endif;
				?>

			</div><!-- .masters -->
        </div><!-- .wrapper -->
    </main>

<?php
get_footer();