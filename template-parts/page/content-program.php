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

<div class="stydy-item">
    <a class="stydy-photo" href="<?php the_permalink(); ?>">
        <img src="<?php the_post_thumbnail_url() ?>" alt=""/>

    </a>
    <a class="stady-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    <span class="stady-small"><?php echo get_field('type'); ?>, <?php echo get_field('due'); ?></span>
    <a href="<?php the_permalink(); ?> class="stady-arrow"></a>
</div>