<?php
// Get current post ID
$post_id = get_the_ID();

// Get post tags and categories
$tags = wp_get_post_terms($post_id, 'post_tag', array('fields' => 'ids'));
$categories = wp_get_post_terms($post_id, 'category', array('fields' => 'ids'));

// First try to get posts with matching tags
$args = array(
    'post_type' => 'games',
    'posts_per_page' => 5,
    'post__not_in' => array($post_id),
    'orderby' => 'rand',
    'tax_query' => array(
        array(
            'taxonomy' => 'post_tag',
            'terms' => $tags
        )
    )
);

$related_query = new WP_Query($args);

// If no posts found by tags, try categories
if (!$related_query->have_posts() && !empty($categories)) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'category',
            'terms' => $categories
        )
    );
    wp_reset_query();
    $related_query = new WP_Query($args);
}

// Display related posts if found
if ($related_query->have_posts()) : ?>
    <div class="bg-white index-games shadow border-radius-5 border-gray">
        <div class="section-title">Related Games</div>  
        <div class="list">
            <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                <div class="item">
                    <div class="icon">
                        <?php $icon = get_field('icon'); if( !empty( $icon ) ): ?>
                        <img src="<?php echo esc_url($icon['url']); ?>" title="<?php echo esc_attr($icon['alt']); ?>" alt="img" draggable="false">
                        <?php endif; ?>
                    </div>
                    <div class="title">
                        <div class="name">
                            <a href="<?php the_permalink(); ?>" class="link-inline"><?php the_title(); ?></a>
                        </div>
                        <div class="release-date">
                            <?php $release_date = get_field('release_date'); if ($release_date): ?>
                                <?php echo esc_html($release_date); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>       
            <?php endwhile; ?>
        </div>
    </div>
<?php
endif;
wp_reset_postdata();
?>