<?php
        list($date, $time) = explode(' ', get_field('date'));
        $info_2 = implode(', ',array($time, get_field('place')));
        $category = array_map(function ($item){ return $item->cat_name; }, get_the_category());
?>
<div class="related-item">
					<a href="<?php the_permalink(); ?>" class="related-photo">
						<img src="<?php the_post_thumbnail_url(); ?>" alt=""/>
					</a>
					<div class="related-date"><?php echo $date ?> / <?php echo implode(', ', $category); ?></div>
					<a href="<?php the_permalink(); ?>" class="related-name non-arrow"><?php the_title(); ?></a>
					<div class="related-info">
						<div class="related-time"><?php echo $info_2 ?></div>
						<?php
            // Find connected pages
            $connected = new WP_Query(array(
                'connected_type' => 'events_to_people',
                'connected_items' => $post,
                'nopaging' => true
            ));
						?>
			<?php if (!empty($connected)): ?>
                	<div class="related-autor">спикеры:
            <?php while ($connected->have_posts()) : $connected->the_post();  ?>

                <span class="item"><?php the_title(); ?></span>

            <?php
            endwhile;
            wp_reset_postdata();
            ?>
			   </div>
            <?php endif; ?>
			</div>
		</div>