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

<article id="post-<?php the_ID(); ?>" <?php post_class('container-fluid'); ?>>
    <div class="wrapper">
        <div class="title-page">
            <?php
            the_title('<h1>', '</h1>');
            ?>
            <div>
                <?php the_content(); ?>
            </div>
        </div><!-- .entry-header -->

        <div class="page">
            <div class="page-sidebar">
                <div class="page-menu">
                    <div class="page-sidebar-main">
                        <?php
                        //$keys = array('type' => 'форма', 'due' => 'длительность', 'cost_per_year' => 'стоимость в год', 'exames' => 'экзамены', 'diplom' => 'диплом');
                        $fields = get_field_objects();
                        //var_dump($fields);
                        foreach ($fields as $key => $value) {
                        if ($value['type'] == 'text' OR $value['type'] == 'date_picker') : ?>
                        <div class="page-sidebar-row">
                            <div class="name"><?php echo $value['label']; ?></div>
                            <div class="type">
                                <?php
                                //$text = get_post_meta($post->ID, $key, true);
                                echo str_replace(';', '<br/>', $value['value']);
                                ?>
                            </div>
                        </div>
                            <?php
                        endif;
                        } ?>
                    </div>
                    <a class="sign" href="#">Записаться</a>
                </div><!-- .info-program -->
            </div>
            <div class="page-content kurs">
                <?php if ('' !== get_the_post_thumbnail()) : ?>
                    <div class="page-thumb">
                        <?php echo get_the_post_thumbnail(get_queried_object_id(), 'isin-featured-image'); ?>
                    </div><!-- .post-thumbnail -->
                <?php endif; ?>
                <div class="page-decpr">
                    <?php if ($field = get_field_object('about')): ?>
                        <div class="page-col">
                            <h3><?= $field['label'] ?></h3>
                            <?php
                            /* translators: %s: Name of current post */
                            echo $field['value'];
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
                        <div class="page-col">
                            <h3>Преподаватели</h3>
                            <div class="teachers">
                                <?php while ($connected->have_posts()) : $connected->the_post(); ?>

                                    <?php get_template_part('template-parts/post/people/preview'); ?>

                                    <?php
                                endwhile;
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div><!-- .entry-content -->
                    <?php endif; ?>

                    <?php
                    if ($post_object = get_field('how_go')):
                        $post = $post_object;
                        setup_postdata($post);
                        ?>
                        <div class="page-col">
                            <h3><?php the_title() ?></h3>

                            <?php
                            /* translators: %s: Name of current post */
                            the_content();
                            ?>
                        </div>
                        <?php
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>

        </div><!-- .main-content -->

	<h3 class="title-page-small">Другие курсы</h3>
		<div class="related">
			<?php $other = get_field('other_course');
			foreach ( $other as $post ) {
        		setup_postdata( $post );
				get_template_part('template-parts/post/deducation/preview');
    		}
    		wp_reset_postdata();
			?>
		</div>
		<a href="#" class="related-arrow"></a>
    </div>
</article><!-- #post-## -->
