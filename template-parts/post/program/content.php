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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
                    <div class="page-main">
                        <?php
                        //$keys = array('type' => 'форма', 'due' => 'длительность', 'cost_per_year' => 'стоимость в год', 'exames' => 'экзамены', 'diplom' => 'диплом');
                        $fields = get_field_objects();
                        foreach ($fields as $key => $value) {
                            if ($value['type'] == 'text') : ?>
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
                    <a class="sign" href="#">Записаться на обучение</a>
                </div>
            </div>
            <!-- .info-program -->
            <div class="page-content">
                <?php if ('' !== get_the_post_thumbnail()) : ?>
                    <div class="page-thumb">
                        <?php echo get_the_post_thumbnail(get_queried_object_id(), 'isin-featured-image'); ?>
                    </div><!-- .post-thumbnail -->
                <?php endif; ?>
                <div class="page-decpr">
                    <?php if ($text = get_post_meta($post->ID, 'about_program', true)): ?>
                        <div class="page-col">
                            <h3 class="with-line">О программе</h3>
                            <?php
                            /* translators: %s: Name of current post */
                            echo $text;
                            ?>
                        </div>
                    <?php endif; ?>

                    <?php
                    // Find connected pages
                    $connected = new WP_Query(array(
                        'connected_type' => 'program_to_people',
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
                    // Find connected pages
                    $connected = new WP_Query(array(
                        'connected_type' => 'program_to_laboratory',
                        'connected_items' => $post,
                        'nopaging' => true
                    )); ?>

                    <?php if (!empty($connected)): ?>
                        <div class="page-col">
                            <h3>Лаборатории</h3>
                            <p>В лабораториях осуществляется научно-исследовательская и практическая работа по актуальным направлениям </p>
                            <div class="page-col-labs">
                                <?php while ($connected->have_posts()) : $connected->the_post(); ?>

                                    <?php get_template_part('template-parts/post/laboratory/preview'); ?>

                                    <?php
                                endwhile;
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div><!-- .entry-content -->
                    <?php endif; ?>

                    <?php if ($id = get_post_meta($post->ID, 'how_go', true)): ?>
                        <div class="page-col">
                            <h3>Как поступить</h3>
                            <?php
                            $post = get_post($id);
                            /* translators: %s: Name of current post */
                            echo apply_filters('the_content', $post->post_content);
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div><!-- .main-content -->
        </div>
    </div>


</article><!-- #post-## -->
