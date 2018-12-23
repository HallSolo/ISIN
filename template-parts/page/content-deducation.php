<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<div class="additional-item">
    <a href="<?php the_permalink(); ?>" class="additional-title"><?php the_title(); ?></a>
    <?php
    $fields = get_field_objects();
    foreach ($fields as $key => $value) {
        if( ($value['type'] == 'text' OR $value['type'] == 'date_picker') AND !empty($value['value']) ) : ?>
            <div class="additional-small"><?php echo $value['label']; ?>:
                <?php echo str_replace(';', ', ', $value['value']); ?>
            </div>
        <?php endif; ?>
    <?php } ?>
    <p><?php if(has_excerpt()) the_excerpt(); ?></p>
</div>