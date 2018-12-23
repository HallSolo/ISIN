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

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
    <div class="wrapper">
    <div class="title-page">
        <?php
        the_title('<h1>', '</h1>');
        ?>

        <div>
            <?php the_content(); ?>
        </div>
    </div><!-- .title-page -->


    <div class="page">
        <div class="page-sidebar">
            <div class="page-menu">
            <div class="page-sidebar-main">
                <?php
                $fields = get_field('social_link');
                ?>
                <div class="page-sidebar-logo">
                    <img src="<?php echo $fields['logo']['url']; ?>" alt="<?php echo $fields['logo']['alt']; ?>"/>
                </div>
                <div class="page-sidebar-social">
                    <div class="page-social">
                        <a href="<?php echo $fields['facebook']; ?>" class="s-logo">facebook</a>
                        <a href="<?php echo $fields['vk']; ?>" class="s-logo">vkontakte</a>
                    </div>
                    <div class="page-social">
                        <a href="<?php echo $fields['instagram']; ?>" class="s-logo">instagram</a>
                        <a href="<?php echo $fields['youtube']; ?>" class="s-logo">youtube</a>
                    </div>
                </div>
                <?php
                //$keys = array('type' => 'форма', 'due' => 'длительность', 'cost_per_year' => 'стоимость в год', 'exames' => 'экзамены', 'diplom' => 'диплом');
                $fields = get_field_objects();
                foreach ($fields as $key => $value) {
                    if( $value['type'] == 'text' ) : ?>
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
                <?php
                // Find connected pages
                $connected = new WP_Query(array(
                    'connected_type' => 'laboratory_to_people',
                    'connected_items' => $post,
                    'nopaging' => true,
                    'connected_meta' => array( 'role' => 'куратор' )
                )); ?>

                <?php if (!empty($connected)): ?>
                    <div class="page-sidebar-row">
                        <div class="name">Кураторы:</div>
                        <div class="type">
                                <?php while ($connected->have_posts()) : $connected->the_post(); ?>

                                    <?php echo get_the_title(); ?><br/>

                                    <?php
                                endwhile;
                                wp_reset_postdata();
                                ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <a class="sign" href="#">Заявка на обучение</a>
        </div>
        </div><!-- .page-sidebar -->
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
                'connected_type' => 'laboratory_to_people',
                'connected_items' => $post,
                'nopaging' => true,
                'connected_meta' => array( 'role' => 'куратор' )
            )); ?>

            <?php if (!empty($connected)): ?>
            <div class="page-col">
                <h3>Кураторы</h3>
                <div class="teachers">
                            <?php while ($connected->have_posts()) : $connected->the_post(); ?>

                                    <?php get_template_part( 'template-parts/post/people/preview' ); ?>

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
                'connected_type' => 'laboratory_to_people',
                'connected_items' => $post,
                'nopaging' => true,
                'connected_meta' => array( 'role' => 'преподаватель' )
            )); ?>

            <?php if (!empty($connected)): ?>
                <div class="page-col">
                        <h3>Преподаватели</h3>
                        <div class="teachers">
                            <?php while ($connected->have_posts()) : $connected->the_post(); ?>

                                <?php get_template_part( 'template-parts/post/people/preview' ); ?>

                                <?php
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div><!-- .entry-content -->
            <?php endif; ?>
            </div>
        </div>
    </div><!-- .main-content -->
    </div><!-- .wrapper -->

</article><!-- #post-## -->
