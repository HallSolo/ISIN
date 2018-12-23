    <div class="masters-item">
                    <a href="#" class="masters-photo" data-id="master1">
                    <img src="<?= the_post_thumbnail_url() ?>" alt=""/>
                    </a>
                    <div class="masters-info">
                    <a href="#" class="masters-name" data-id="master1"><?php the_title(); ?></a>
                    <div class="masters-special"><?php if(has_excerpt()) the_excerpt(); ?></div>
                    </div>
                </div>
