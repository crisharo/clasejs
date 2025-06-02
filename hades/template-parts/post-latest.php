<div class="block bg-white shadow border-radius-5 border-gray">
    <div class="section-title">Latest News</div>
    <div class="post-list">
    <?php
    $args = array(
        'post_type'              => 'news',   // CPT 'news'
        'posts_per_page'         => 5,       // Mostrar 8 posts
        'orderby'                => 'date',  // Ordenar por fecha
        'order'                  => 'DESC',  // Orden descendente
        'no_found_rows'          => true,    // Mejor rendimiento al deshabilitar paginación
        'update_post_meta_cache' => false,   // No cachear metadatos
        'update_post_term_cache' => false,   // No cachear taxonomías
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) : 
    ?>
    <?php while ($query->have_posts()) : $query->the_post(); ?>
    <div class="item">
        <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
        </a>
        <div class="date"><?php the_date(); ?></div>
    </div>
    <?php endwhile; ?>
    <?php endif;
    wp_reset_postdata();?>

    </div>
</div>