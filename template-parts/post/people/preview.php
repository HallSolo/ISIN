<div class="teachers-item">
    <a href="<?= the_permalink() ?>" class="teachers-photo">
        <img src="<?= the_post_thumbnail_url() ?>" alt="" border="0">
    </a>
    <div class="teachers-name"><?php the_title(); ?></div>
    <div class="teachers-special"><?php if(has_excerpt()) the_excerpt(); ?></div>
</div>