<?php
/**
 * "Post List" layout for Display Posts Shortcode
 *
 * @package      Daikama
 * @author       Cristian Haro
 * @since        1.0.0
 * @license      GPL-2.0+
**/
?>

<div class="dps-post-list">
    <div class="preview">
        <div class="bg" style="background-image: url(<?php the_post_thumbnail_url('thumbnail'); ?>)">
        </div>
    </div>
    <div class="title">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        <?php get_template_part('template-parts/date-icon');?>
    </div>
</div>