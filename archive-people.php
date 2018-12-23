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

    <main id="main"  class="lektor-page" role="main">
        <div class="wrapper">

            <?php if (have_posts()) : ?>
                <?php
			    $num = '<i>1.3</i> ';
                post_type_archive_title('<h2 class="title">'.$num, '</h2>');
                ?>
            <?php endif; ?>

					<div class="masters">

                        <?php
                        while (have_posts()) :
                            the_post();

                            get_template_part('template-parts/page/content', get_post_type());

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