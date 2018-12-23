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

<article id="post-<?php the_ID(); ?>" <?php post_class('laborat-item'); ?>>
        <a  class="laborat-title" href="<?php echo the_permalink() ?>">
		<?php the_title(); ?>
        </a>
    <?php
    // Find connected pages
    $connected = new WP_Query(array(
        'connected_type' => 'laboratory_to_people',
        'connected_items' => $post,
        'nopaging' => true,
        'connected_meta' => array( 'role' => 'куратор' )
    )); ?>

    <?php if (!empty($connected)): ?>
        <div class="laborat-small">
            Кураторы:
            <?php while ($connected->have_posts()) : $connected->the_post(); ?>

                <span class="item"><?php echo get_the_title(); ?></span>

                <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    <?php endif; ?>
    <?php
    // Find connected pages
    $connected = new WP_Query(array(
        'connected_type' => 'laboratory_to_people',
        'connected_items' => $post,
        'nopaging' => true,
        'connected_meta' => array( 'role' => 'преподаватель' )
    )); ?>

    <?php if (!empty($connected)): ?>
        <div class="laborat-small">
            Преподаватели:
            <?php while ($connected->have_posts()) : $connected->the_post(); ?>

                <span class="item"><?php echo get_the_title(); ?></span>

                <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    <?php endif; ?>
	<div>
		<?php
			the_content();
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->