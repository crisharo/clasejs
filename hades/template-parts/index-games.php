<div class="bg-white index-games shadow border-radius-5 border-gray">
    <div class="section-title">Upcoming Games</div>  
    <div class="list">
        <?php
        // Set today's date
        $today = date('Y-m-d');
        // Fetch future posts based on 'release_date'
        $futureposts = get_posts(array(
            'post_type'      => 'games',
            'posts_per_page' => 6, // Fetch up to 6 posts
            'no_found_rows'  => true,
            'orderby'        => 'meta_value_num',
            'order'          => 'ASC',
            'meta_query'     => array(
                array(
                    'key'     => 'release_date',
                    'compare' => '>=', // Only posts with release_date >= today's date
                    'value'   => $today,
                    'type'    => 'DATE',
                ),
            ),
        ));
        if ($futureposts): ?>
            <!-- First Item -->
            <?php foreach ($futureposts as $post): setup_postdata($post); ?>

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
            
            <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>
            <?php else: ?>
            <p>No upcoming games found.</p>
        <?php endif; ?>
    </div>
</div>