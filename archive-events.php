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

            <?php if (have_posts()) : ?>
                <?php echo '<h2 class="title">'.post_type_archive_title('<i>3.1</i> ', false).'</h2>'; ?>
            <?php endif; ?>
			
			<div class="dev-nav">
			<?php echo str_replace('<a','<a class="dev-link" ',strip_tags(wp_nav_menu( array( 'menu' => 16, 'container' => false, 'items_wrap' => '%3$s', 'depth' => 0, 'echo' => false ) ), '<a>' )); ?>
			</div>

					<div class="related">

                        <?php
                        while (have_posts()) :
                            the_post();

						    //get_template_part( 'template-parts/post/events/slider' );
                            get_template_part('template-parts/page/content-events');

                            // If comments are open or we have at least one comment, load up the comment template.
                            if (comments_open() || get_comments_number()) :
                                comments_template();
                            endif;

                        endwhile; // End of the loop.
                        ?>

                </div><!-- .masters -->
        </div><!-- .wrapper -->
    </main>

<?php
get_footer();