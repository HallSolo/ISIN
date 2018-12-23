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

<div class="wrap">

    <?php if ( have_posts() ) : ?>
        <header class="header">
            <?php echo '<h1 class="page-title">'.post_type_archive_title( null, false ).'</h1>'; ?>
        </header><!-- .page-header -->
    <?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main container-fluid" role="main">
            <div class="row">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/page/content', get_post_type() );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

            </div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();