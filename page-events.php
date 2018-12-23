<?php
/*
 * Template Name: eventspage
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
	
	add_filter('body_class', function($classes){
		return array( 'archive','post-type-archive','post-type-archive-events','logged-in','wp-custom-logo','hfeed','has-header-image','page-one-column','colors-light' );
	});
get_header(); ?>








<?php

$now = new DateTime();
                    $datenow = $now->format('Y.m.d H:i');
                    $event = new WP_Query( array( 'post_type' => 'events', 'meta_query' => array(array('key' => 'date','value' => $datenow, 'compare' => '>=')),'order'=>'DESC') );

print_r($event);

?>





    <main id="main"  class="dev grey" role="main">
        <div class="wrapper">

            <?php if (have_posts()) : ?>
                <?php
			    $num = '<i>3.1</i> ';
                post_type_archive_title('<h2 class="title">'.$num, '</h2>');
                ?>
            <?php endif; ?>

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