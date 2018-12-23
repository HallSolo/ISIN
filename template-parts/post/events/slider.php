<?php
        list($date, $time) = explode(' ', get_field('date'));
        $info_2 = implode(', ',array($time, get_field('place')));
        $category = array_map(function ($item){ return $item->cat_name; }, get_the_category());
?>
				<div class="slider-item">
					<div class="slider-photo">
						<a href="<?php the_permalink(); ?>">
							<img src="<?php the_post_thumbnail_url() ?>" alt=""/>
						</a>
					</div>
					<div class="slider-description">
						<div class="slider-data">
							<span><?php echo $date ?></span> / <span><?php echo implode(', ', $category); ?></span>
						</div>
						<a href="<?php the_permalink(); ?>" class="slider-title"><?php the_title(); ?></a>
						<div class="slider-loc">
							<span><?php echo $info_2 ?></span>
							
			<?php
            // Find connected pages
            $parent = $post->ID;
            $connected = new WP_Query(array(
                'connected_type' => 'events_to_people',
                'connected_items' => $post,
                'nopaging' => true
            )); ?>
			<?php if (!empty($connected)): ?>
                <span>спикеры:
            <?php while ($connected->have_posts()) : $connected->the_post();  ?>

                <span class="item"><?php the_title(); ?></span>

            <?php
            endwhile;
            wp_reset_postdata();
            ?>
                </span>
            <?php endif; ?>	
						</div>
						<a href="<?php the_permalink($parent); ?>" class="slider-arrow"></a>
					</div>
				</div>