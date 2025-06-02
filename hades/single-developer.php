<?php
get_header();
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="developer-container">
    <header class="shadow border-bottom bg-white-pure">
        <div class="header-wide wide-big">
            <div class="developer-header-content">
                <h1><?php the_title(); ?></h1>
                <div class="developer-description">
                    <?php the_content(); ?>
                </div>
                
                <div class="developer-info">
                    
                    <?php if ( $site = get_field( 'developer_website' ) ) : ?>
                    <div class="developer-info-section">
                        <span class="developer-info-title">Website</span>        
                            <?php
                            $site = str_replace(array('http://www.', 'https://www.', 'https://', 'http://' ), '', $site);
                            $site = rtrim($site, '/');
                            $url = get_field( 'developer_website' );?>
                            <a class="link" href="<?php echo $url ?>" rel="nofollow noopener noreferrer" target="_blank"><?php echo $site ?></a>
                    </div>
                    <?php endif; ?>

                    <?php if( get_field('developer_facebook') || get_field('developer_twitter') || get_field('developer_discord') ): ?>
                    <div class="developer-info-section">
                        <span class="developer-info-title">Social</span>
                        <?php if( get_field('developer_facebook') ): ?>
                        <a class="link" href="<?php echo wp_kses_post( get_field('developer_facebook') ); ?>" rel="nofollow noopener noreferrer" target="_blank">Facebook</a> 
                        <?php endif;?>        
                        
                        <?php if( get_field('developer_twitter') ): ?>
                        <a class="link" href="<?php echo wp_kses_post( get_field('developer_twitter') ); ?>" rel="nofollow noopener noreferrer" target="_blank">X/Twitter</a>  
                        <?php endif;?>        
                        
                        <?php if( get_field('developer_discord') ): ?>
                        <a class="link" href="<?php echo wp_kses_post( get_field('developer_discord') ); ?>" rel="nofollow noopener noreferrer" target="_blank">Discord</a>
                        <?php endif;?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="preview">
                <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>">
            </div>
        </div>
    </header>
    
    <div class="wide-big">
        <div class="developer-body flex-vertical-big">
            <h2 class="title-separator">Games by <?php the_title(); ?></h2>
            <div class="grid-2">
            <?php if( get_field('developer_games') ): ?>
            <?php
                $item_related = get_field('developer_games');
                if( $item_related ): ?>

                <?php foreach( $item_related as $post ): setup_postdata($post); ?>

                    <div class="game-card-archive shadow border-radius-5 border-gray bg-white">
                        <div class="preview">
                            <?php 
                            $icon = get_field('icon');
                            if( !empty( $icon ) ): ?>
                            <img src="<?php echo esc_url($icon['url']); ?>" title="<?php echo esc_attr($icon['alt']); ?>" alt="img" draggable="false">
                            <?php endif; ?>
                        </div>
                        <div class="data">
                            <div class="game-title">
                                <a href="<?php the_permalink(); ?>">
                                <?php the_title()?>
                                </a>
                            </div>
                            <?php $status = get_field( 'status' );
                            if( !empty( $status ) ): ?>
                            <span class="label color-<?php echo esc_attr($status['value']); ?>">
                            <?php echo esc_html($status['label']); ?></span>
                            <?php endif; ?>
                        </div>                
                    </div>

                    <?php endforeach; ?>  
                    <?php wp_reset_postdata(); ?><?php endif; ?><?php endif;?>
                </div>
        </div>

        <div class="developer-body flex-vertical-big">
            <?php
            // Get current developer tags
            $developer_tags = wp_get_post_terms(get_the_ID(), 'post_tag', array('fields' => 'ids'));
            
            if (!empty($developer_tags)) :
                // Second loop - Related News/Posts
                $related_news = new WP_Query(array(
                    'post_type' => array('post', 'news'),
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'post_tag',
                            'field' => 'term_id',
                            'terms' => $developer_tags
                        )
                    )
                ));

                if ($related_news->have_posts()) : ?>
                    
                        <h2 class="title-separator">News about <?php the_title(); ?></h2>
                        <div class="news-grid">
                            <?php while ($related_news->have_posts()) : $related_news->the_post(); ?>
                                <?php get_template_part('template-parts/post-small'); ?>
                            <?php endwhile; ?>
                        </div>
                    
                <?php endif;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</div>

<?php endwhile;endif;wp_reset_postdata();?>
<?php get_footer(); ?>