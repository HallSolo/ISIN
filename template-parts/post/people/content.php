<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

<article id="post-<?php the_ID(); ?> " <?php post_class(); ?>>

			<div class="masters-details">
				<div class="masters-details-sidebar">
					<div class="masters-details-photo">
						<img src="<?php echo get_the_post_thumbnail(); ?>" alt=""/>
					</div>
				</div>
				<div class="masters-details-info">
					<a href="#close-modal" class="close" rel="modal:close"></a>
					<div class="masters-details-name"><?php the_title('<h1>', '</h1>'); ?></div>
					<div class="masters-details-history">
					<?php the_content(); ?>
					</div>
					
					<?php
            // Find connected pages
            $now = new DateTime();
	        $datenow = $now->format('Y.m.d H:i');
            $connected = new WP_Query(array(
                'connected_type' => 'events_to_people',
                'connected_items' => $post,
                'nopaging' => true
            )); ?>

            <?php if ($connected->have_posts()): ?>
					<h3 class="title-page-small">События</h3>
					<div class="related">
						<?php while ($connected->have_posts()) : $connected->the_post(); ?>

                                    <?php
									if($datenow <= get_field('date')){
										get_template_part( 'template-parts/page/content-events' ); 
									}
									?>

                                <?php
                            endwhile;
                            wp_reset_postdata();
                            ?>
					</div>
			<?php endif; ?>
			<?php
            // Find connected pages
            $connected = new WP_Query(array(
                'connected_type' => 'deducation_to_people',
                'connected_items' => $post,
                'nopaging' => true
            )); ?>

            <?php if (!empty($connected)): ?>
					<h3 class="title-page-small">Курсы</h3>
					<div class="related">
						<?php while ($connected->have_posts()) : $connected->the_post(); ?>
								<?php get_template_part( 'template-parts/post/deducation/preview' ); ?>
                            <?php
                            endwhile;
                            wp_reset_postdata();
                            ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
</article>

