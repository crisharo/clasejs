<?php
/**
 * Template Name: Games
 * Template Post Type: games
 */

get_header();?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<header class="games-header shadow border-bottom">
    <?php if (has_post_thumbnail()) : ?>
    <div class="preview">
        <div class="bg" style="background-image: url(<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>)">
        </div>
    </div>
    <?php endif; ?>
    <div class="games-header-bar">
        <div class="name flex-horizontal wide">
            <div class="icon">
                <?php 
                $icon = get_field('icon');
                if( !empty( $icon ) ): ?>
                <img src="<?php echo esc_url($icon['url']); ?>" 
                        title="<?php echo esc_attr($icon['alt']); ?>" 
                        alt="<?php echo esc_attr(get_the_title()); ?> icon" 
                        draggable="false" 
                        loading="lazy"
                        itemprop="image">
                <?php endif; ?>
            </div>
            <div class="title">
                <h1 itemprop="headline"><?php the_title();?></h1>
                <div class="flex-horizontal">
                    <div class="game-system">
                        <?php
                            $field = get_field_object('system');
                            $systems = $field['value'];
                            if( $systems ): ?>
                                <ul>
                                    <?php foreach( $systems as $system ): ?>
                                        <li>
                                            <span class="color-<?php echo $field['choices'][ $system ]; ?>" itemprop="gamePlatform">
                                            </span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="games-container wide-big">
              
    <div class="game-grid">

        <div class="content area-1">
            <!-- Tabs Navigation -->
            <div class="tabs-nav border-radius-5 shadow border-gray">
                <button class="tab-button active" data-tab="overview">Overview</button>
                <?php if (get_field('video')) : ?>
                    <button class="tab-button" data-tab="trailer">Trailer</button>
                <?php endif; ?>
                <button class="tab-button" data-tab="gallery">Gallery</button>
            </div>

            <!-- Tabs Content -->
            <div class="tabs-content border-radius-5 shadow border-gray bg-white">
                <!-- Overview Tab -->
                <div class="tab-pane active" id="overview">
                    <div class="text">
                        <?php the_content(); ?>
                        <div class="breadcrumb">See more: <?php get_breadcrumb(); ?></div>
                    </div>
                </div>

                <!-- Trailer Tab -->
                <?php if (get_field('video')) : ?>
                    <div class="tab-pane" id="trailer">
                        <div class="video-container epyt-video-wrapper fluid-width-video-wrapper" style="padding-top: 56.25% !important;">
                            <?php echo get_field('video'); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Gallery Tab -->
                <div class="tab-pane" id="gallery">
                    <div class="gallery-container">
                        <ul class="screenshots-list">
                            <?php
                            $screenshots = array(
                                get_field('screenshot_1'),
                                get_field('screenshot_2'),
                                get_field('screenshot_3')
                            );
                            
                            foreach ($screenshots as $screenshot) :
                                if ($screenshot) : ?>
                                    <li>
                                        <img src="<?php echo esc_url($screenshot['url']); ?>" 
                                             alt="<?php echo esc_attr($screenshot['alt'] ?: get_the_title() . ' screenshot'); ?>"
                                             class="screenshot"
                                             loading="lazy"
                                             itemprop="screenshot">
                                    </li>
                                <?php endif;
                            endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Game News -->
            <?php
                $related_posts = news_games_tags(get_the_ID());
                if ($related_posts) : ?>
                    <div class="related-posts">
                        <?php foreach ($related_posts as $post) : setup_postdata($post); ?>
                            <?php get_template_part('template-parts/post-small');?>
                        <?php endforeach; wp_reset_postdata(); ?>
                    </div>
            <?php endif; ?>

            <!-- Games related -->
            <?php get_template_part('template-parts/games-related'); ?>
            
            <div class="box shadow border-gray border-radius-5 bg-white">
                <?php get_template_part('template-parts/comments'); ?>
            </div>

        </div>
        
        <div class="area-2">
            <div class="sticky">
                <?php get_template_part('template-parts/games-card');?>
            </div>
        </div>

    </div>
</div>

<?php
endwhile;
endif;
wp_reset_postdata();
?>
<?php get_footer(); ?>