    <div class="masters-item">
                    <a href="<?php the_permalink(); ?>" rel="modal:open" class="masters-photo">
                    <img src="<?= the_post_thumbnail_url() ?>" alt=""/>
                    </a>
                    <div class="masters-info">
                    <a href="<?php the_permalink(); ?>" rel="modal:open" class="masters-name"><?php the_title(); ?></a>
                    <div class="masters-special"><?php if(has_excerpt()) the_excerpt(); ?></div>
                    </div>
                </div>
