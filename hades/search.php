<?php get_header(); ?>
<div class="banner-blue shadow border-bottom">
    <div class="category-header">
        <div class="content">
            <h1 class="page-title">
                Search Results for: <span><?php echo get_search_query(); ?></span>
            </h1>
        </div>
    </div>
</div>

<div class="wide-big">
    <div class="search-results flex-vertical">
        <?php if (have_posts()) : 
            // Initialize arrays to store different post types
            $games_posts = array();
            $other_posts = array();
            
            // Separate posts by type
            while (have_posts()) : the_post();
                if (get_post_type() === 'games') {
                    $games_posts[] = get_the_ID();
                } else {
                    $other_posts[] = get_the_ID();
                }
            endwhile;
            
            // Display games if any found
            if (!empty($games_posts)) : ?>
                <div class="search-section flex-vertical">
                    <h2 class="title-separator">Games:</h2>
                    <div class="games-block">
                        <?php foreach ($games_posts as $post_id) :
                            $post = get_post($post_id);
                            setup_postdata($post); ?>
                                <?php get_template_part('template-parts/post-game'); ?>
                        <?php endforeach; 
                        wp_reset_postdata(); ?>
                    </div>
                </div>
            <?php endif;

            // Display other content if any found
            if (!empty($other_posts)) : ?>
                <div class="search-section flex-vertical">
                    <h2 class="title-separator">Articles & News:</h2>
                    <div class="flex-vertical flex-vertical">
                        <?php foreach ($other_posts as $post_id) :
                            $post = get_post($post_id);
                            setup_postdata($post);
                            get_template_part('template-parts/post-small');
                        endforeach; 
                        wp_reset_postdata(); ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php get_template_part('template-parts/pagination'); ?>

        <?php else : ?>
            <div class="no-results">
                <p>No results found for: <strong><?php echo get_search_query(); ?></strong></p>
                <p>Try different keywords or check your spelling.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>