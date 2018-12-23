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

<?php
        list($date, $time) = explode(' ', get_field('date'));
        $info_2 = implode(', ',array($time, get_field('place')));
        $category = array_map(function ($item){ return $item->cat_name; }, get_the_category());
		$month = date("F", strtotime($date));
        $str_date = date("j F Y", strtotime($date));
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
    <div class="wrapper">

			<div class="title-page">
		<?php
		$num = '<b class="full-height">3.1 </b>';
        the_title('<h1>', '</h1>');
        ?>
			</div>
			<div class="page">
				<div class="page-sidebar">
					<div class="page-menu">
						<div class="page-sidebar-main">
							<div class="page-sidebar-row">
								<div class="name">Информация:</div>
								<div class="type"><?php echo implode(', ', $category); ?></div>
								<div class="type"><?php echo str_replace($month,__($month),$str_date); ?></div>
								<div class="type">в <?php echo $time; ?></div>
								<div class="type"><?php echo get_field('cost'); ?></div>
							</div>
							<div class="page-sidebar-row">
				<?php
            // Find connected pages
            $connected = new WP_Query(array(
                'connected_type' => 'events_to_people',
                'connected_items' => $post,
                'nopaging' => true
            )); ?>

            <?php if (!empty($connected)): ?>
                <div class="name">спикеры:</div>
            <?php while ($connected->have_posts()) : $connected->the_post();  ?>

                <div class="type"><?php the_title(); ?></div>

                <?php
            endwhile;
            wp_reset_postdata();
            ?>
            <?php endif; ?>				
							</div>
						</div>
						<a class="sign" href="#">Записаться</a>
					</div>
				</div>
				<div class="page-content kurs">
					<div class="page-thumb">
						<img src="<?= the_post_thumbnail_url() ?>" alt="" height="523" width="100%" alt="<?php the_title(); ?>"/>
					</div>
					<div class="page-decpr">
						<div class="page-col">
						     <?php the_content(); ?>
						</div>
				</div>
			</div>
		</div>
	</div>
</article><!-- #post-## -->

