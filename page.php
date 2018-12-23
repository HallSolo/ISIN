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

get_header();
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<section class="fix-title <?php echo $post->post_name; ?>">
		<div class="wrapper">
			<div class="title-page">
				<?php $num = '<b>'.get_field('number').'</b> ';?>
				<?php the_title( '<h1>'.$num, '</h1>' ); ?>
				<?php // <h1><b>1.1</b> Об институте</h1> ?>
			</div>
			<div class="page menu-reserve">
				<div class="page-sidebar">
				</div>
				<div class="page-content page-main-text">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</section>
<?php endwhile; endif; ?>


<?php
get_footer();
