<?php
// Get current post tags
$post_tags = wp_get_post_tags(get_the_ID(), array('fields' => 'ids'));

if ($post_tags) {
    // Query related posts
    $related_args = array(
        'post_type' => array('post', 'news'),
        'posts_per_page' => 2,
        'post__not_in' => array(get_the_ID()),
        'tag__in' => $post_tags,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    
    $related_query = new WP_Query($related_args);
    
    if ($related_query->have_posts()) : ?>
        <div class="related-post-small">
            <ul class="list">
                <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                        <span class="post-date">
                            <?php echo get_the_date('M j'); ?>
                        </span>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    <?php 
    endif;
    wp_reset_postdata();
}
?>
