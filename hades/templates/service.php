<?php /*
Template Name: Service G/A/N/C
Template Post Type: page
*/ ?>
<?php get_header(); ?>

<div class="banner-image shadow border-bottom ">
    <div class="background-overlay" style="background-image: url(<?php echo the_post_thumbnail_url('full'); ?>)"></div>
    <div class="banner-content wide-big">
        <div class="content">
            <h1><?php the_title();?></h1>
            <span class="sub" style="font-size:18px">Exclusive Games, updates and news</span>
        </div>
    </div>
    <div class="background-grid"></div>
</div>

<div class="wide-big">
    <div class="section flex-vertical-big">
        <h2 class="title-separator">Latest Games</h2>
        <?php
        // Get current page tags
        $post_tags = wp_get_post_tags(get_the_ID(), array('fields' => 'ids'));
        
        // Query for games with matching tags
        $games_args = array(
            'post_type' => 'games',
            'posts_per_page' => 10,
            'orderby' => 'date',
            'order' => 'DESC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'post_tag',
                    'field' => 'term_id',
                    'terms' => $post_tags
                )
            )
        );

        $games_query = new WP_Query($games_args);

        if ($games_query->have_posts()) : ?>
            <div class="grid-2">
                <?php while ($games_query->have_posts()) : $games_query->the_post(); 
                    get_template_part('template-parts/post-game');
                endwhile; ?>
            </div>
        <?php 
        else :
            echo '<p>No games found.</p>';
        endif;
        wp_reset_postdata();
        ?>
    </div>

    <div class="section flex-vertical-big">
        <h2 class="title-separator">Latest News</h2>
        <?php
        // Query for news and posts with matching tags
        $news_args = array(
            'post_type' => array('news', 'post'),
            'posts_per_page' => 20,
            'orderby' => 'date',
            'order' => 'DESC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'post_tag',
                    'field' => 'term_id',
                    'terms' => $post_tags
                )
            )
        );

        $news_query = new WP_Query($news_args);

        if ($news_query->have_posts()) : ?>
            <div class="grid-2">
                <?php while ($news_query->have_posts()) : $news_query->the_post();
                    get_template_part('template-parts/post-small');
                endwhile; ?>
            </div>
        <?php 
        else :
            echo '<p>No news found.</p>';
        endif;
        wp_reset_postdata();
        ?>
    </div>
</div>

<?php get_footer(); ?>