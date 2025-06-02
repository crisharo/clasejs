<div class="home">
    <span class="title-separator">Latest Stories</span>
    <?php 
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'post_type' => array('news', 'post'),
        'posts_per_page' => 28,
        'paged' => $paged,
        'offset' => 3,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    
    $custom_query = new WP_Query($args);
    $post_count = 0;
    
    if ($custom_query->have_posts()) :
        while ($custom_query->have_posts()) : $custom_query->the_post();
            $post_count++;
            $post_type = get_post_type();
            
            // Use featured-post structure every 6 posts or for regular posts
            if ($post_count % 5 === 0 || $post_type === 'post') : ?>
                <article class="featured-post bg-white border-gray shadow border-radius-5">
                    <div class="featured-content">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="featured-image">
                                <div class="bg" style="background-image: url(<?php the_post_thumbnail_url('full'); ?>)"></div>
                            </div>
                        <?php endif; ?>
                        <div class="featured-text">
                            <span class="category-name blue-dark">
                                <?php $category = get_the_category(); echo $category[0]->cat_name; ?>
                            </span>
                            <a class="featured-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            <?php get_template_part('template-parts/date-icon'); ?>
                        </div>
                    </div>
                </article>
            
            <?php elseif ($post_type === 'news') : ?>
                <?php get_template_part('template-parts/post-small'); ?>
            <?php endif;
            
        endwhile;
        
        wp_reset_postdata();
    else : ?>
        <p><?php esc_html_e('No posts found.', 'cyberia'); ?></p>
    <?php endif; ?>
    
</div>