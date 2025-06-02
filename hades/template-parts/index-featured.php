<?php
// Query for multiple post types
$featured_args = array(
    'post_type' => array('post', 'news'),
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC'
);
$featured_query = new WP_Query($featured_args);

// Start the loop
if ($featured_query->have_posts()) : ?>
    <div class="featured-posts">
        <?php while ($featured_query->have_posts()) : $featured_query->the_post(); ?>
            <article class="featured-post bg-white border-radius-5 shadow border-gray">
                
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="featured-image">
                            <div class="bg" style="background-image: url(<?php the_post_thumbnail_url('full'); ?>)">
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="featured-text">
                        <span class="category-name blue-dark">
                            <?php $category = get_the_category(); echo $category[0]->cat_name; ?>
                        </span>
                        <a class="featured-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <!-- Display Date -->
                        <div class="date">
                            <i class="fa-regular fa-calendar"></i>
                            <div class="span"><?php echo meks_time_ago(); /* post date in time ago format */ ?></div>
                        </div>
                    </div>
                
            </article>
        <?php endwhile; ?>
    </div>
<?php
endif;
wp_reset_postdata(); // Reset the query
?>