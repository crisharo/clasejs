<div class="single-related shadow bg-white border-gray border-radius-5">
<div class="section-title">More to read</div>

<?php
// Get current post tags
$tags = wp_get_post_tags(get_the_ID());
if ($tags) {
    $tag_ids = array();
    foreach($tags as $tag) {
        $tag_ids[] = $tag->term_id;
    }
    
    $args = array(
        'post_type' => array('post', 'news'),
        'tag__in' => $tag_ids,
        'post__not_in' => array(get_the_ID()),
        'posts_per_page' => 4,
        'orderby' => 'rand'
    );
    
    $related_query = new WP_Query($args);
    
    if ($related_query->have_posts()) : ?>
        <div class="related-posts">
            <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                <div class="related-post">
                    <div class="preview">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('thumbnail'); ?>
                    <?php endif; ?>
                    </div>
                    <div class="title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <?php get_template_part('template-parts/date-icon');?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else:
        // If no related posts found, show next and previous posts
        $prev_post = get_previous_post();
        $next_post = get_next_post();
        
        if ($prev_post || $next_post) : ?>
            <div class="related-posts">
                <?php if ($prev_post) : ?>
                    <div class="related-post">
                        <div class="preview">
                        <?php if (has_post_thumbnail($prev_post->ID)) : ?>
                            <?php echo get_the_post_thumbnail($prev_post->ID, 'thumbnail'); ?>
                        <?php endif; ?>
                        </div>
                        <div class="title">
                            <a href="<?php echo get_permalink($prev_post->ID); ?>"><?php echo $prev_post->post_title; ?></a>
                            <?php get_template_part('template-parts/date-icon');?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php if ($next_post) : ?>
                    <div class="related-post">
                        <div class="preview">
                        <?php if (has_post_thumbnail($next_post->ID)) : ?>
                            <?php echo get_the_post_thumbnail($next_post->ID, 'thumbnail'); ?>
                        <?php endif; ?>
                        </div>
                        <div class="title">
                            <a href="<?php echo get_permalink($next_post->ID); ?>"><?php echo $next_post->post_title; ?></a>
                            <?php get_template_part('template-parts/date-icon');?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif;
    endif;
    wp_reset_postdata();
} else {
    // If no tags, show next and previous posts
    $prev_post = get_previous_post();
    $next_post = get_next_post();
    
    if ($prev_post || $next_post) : ?>
        <div class="related-posts">
            <?php if ($prev_post) : ?>
                <div class="related-post">
                    <div class="preview">
                    <?php if (has_post_thumbnail($prev_post->ID)) : ?>
                            <?php echo get_the_post_thumbnail($prev_post->ID, 'thumbnail'); ?>
                        <?php endif; ?>
                    </div>
                    <div class="title">
                        <a href="<?php echo get_permalink($prev_post->ID); ?>"><?php echo $prev_post->post_title; ?></a>
                        <?php get_template_part('template-parts/date-icon');?>
                    </div>
                </div>
            <?php endif; ?>
            
            <?php if ($next_post) : ?>
                <div class="related-post">
                    <div class="preview">
                    <?php if (has_post_thumbnail($next_post->ID)) : ?>
                        <?php echo get_the_post_thumbnail($next_post->ID, 'thumbnail'); ?>
                    <?php endif; ?>
                    </div>
                    <div class="title">
                        <a href="<?php echo get_permalink($next_post->ID); ?>"><?php echo $next_post->post_title; ?></a>
                        <?php get_template_part('template-parts/date-icon');?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php endif;
}
?>
</div>