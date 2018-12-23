

<div class="col-md-6 col-sm-12">
    <img class="card-img-top" src="<?= the_post_thumbnail_url() ?>" alt="">
    <div class="card-body">
        <?php
        list($date, $time) = explode(' ', get_field('date'));
        $info_2 = implode(', ',array($time, get_field('place')));
        $category = array_map(function ($item){ return $item->cat_name; }, get_the_category());
        ?>
        <div class="card-text info"><?php echo $date ?> / <?php echo implode(', ', $category); ?></div>
        <h5 class="card-title"><?php the_title(); ?></h5>
        <p class="card-text info"><?php echo $info_2 ?></p>
            <?php
            // Find connected pages
            $connected = new WP_Query(array(
                'connected_type' => 'events_to_people',
                'connected_items' => $post,
                'nopaging' => true
            )); ?>

            <?php if (!empty($connected)): ?>
                <p class="card-text info">спикеры:
            <?php while ($connected->have_posts()) : $connected->the_post();  ?>

                <span class="item"><?php the_title(); ?></span>

                <?php
            endwhile;
            wp_reset_postdata();
            ?>
                </p>
            <?php endif; ?>
        </p>
    </div>
</div>