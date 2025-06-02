<div class="shadow border-bottom bg-gray-dark">
    <div class="index-menu">
        <span class="orange uppercase">Trending</span>
        <ul class="scroll dragscroll">
            <?php
            $args = array(
                'post_type'      => 'games',
                'posts_per_page'         => 8,
                'orderby'                => 'modified',
                'order'                  => 'DESC',
                'no_found_rows'          => true,
                'update_post_meta_cache' => false,
                'update_post_term_cache' => false,
            );
            $custom_query = new WP_Query( $args );
            if ( $custom_query->have_posts() ) :
            while( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </li>
            <?php endwhile; ?> 
            <?php wp_reset_postdata(); ?>
            <?php else : ?><?php endif; ?>
        </ul>
    </div>
</div>