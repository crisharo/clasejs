<?php /*
Template Name: Calendar 202X
Template Post Type: page
*/ ?>
<?php get_header(); ?>

<div class="banner-image shadow border-bottom ">
    <div class="background-overlay" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/banner_6.webp');"></div>
    <div class="banner-content wide-big">
        <div class="content">
            <h1><?php the_title();?></h1>
        </div>
    </div>
    <div class="background-grid"></div>
</div>

<div class="calendar wide-big ">
    <div class="content bg-white-pure border-radius-5 shadow border-gray">
        <div class="list">
            <?php
            // Obtener la página actual
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            // Obtener la fecha actual
            $today = date('Y-m-d');

            // Query de posts futuros con paginación
            $future_query = new WP_Query(array(
                'post_type'      => 'games',
                'posts_per_page' => -1, // Ajusta el número de posts por página
                'orderby'        => 'meta_value',
                'order'          => 'ASC',
                'meta_key'       => 'release_date',
                'meta_query'     => array(
                    array(
                        'key'     => 'release_date',
                        'compare' => '>=',
                        'value'   => $today,
                        'type'    => 'DATE',
                    ),
                ),
            ));

            // Verificar si hay posts
            if ($future_query->have_posts()) :
                $last_date = ''; // Variable para agrupar por fecha
                while ($future_query->have_posts()) : $future_query->the_post();
                    $release_date = get_field('release_date');
                    // Si la fecha cambia, mostrar el encabezado de la fecha
                    if ($release_date !== $last_date) {
                        echo '<div><div class="release-header">' . esc_html($release_date) . '</div></div>';
                        $last_date = $release_date;
                    }
            ?>
                    <div class="item">
                        <div class="title flex-horizontal">
                            <div class="icon">
                                <?php 
                                $icon = get_field('icon'); 
                                if (!empty($icon)) : ?>
                                    <img src="<?php echo esc_url($icon['url']); ?>" title="<?php echo esc_attr($icon['alt']); ?>" alt="img" draggable="false">
                                <?php endif; ?>
                            </div>
                            
                            <div class="name">
                                <a href="<?php the_permalink(); ?>" class="link-inline"><?php the_title(); ?></a>
                            </div>
                        </div>
                        <div class="meta">
                            <div class="game-system">
                                <?php
                                    $field = get_field_object('system');
                                    $systems = $field['value'];
                                    if( $systems ): ?>
                                        <ul>
                                            <?php foreach( $systems as $system ): ?>
                                                <li>
                                                    <span class="color-<?php echo $field['choices'][ $system ]; ?>">
                                                    </span>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                <?php endif; ?>
                            </div>

                            <div class="game-status">
                                <?php $status = get_field( 'status' );
                                if( !empty( $status ) ): ?>
                                <span class="label color-<?php echo esc_attr($status['value']); ?>">
                                <?php echo esc_html($status['label']); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>                        
                    </div>
                    
            <?php endwhile; ?>

            <?php else: ?>
                <p>No upcoming games found.</p>
            <?php endif; ?>

            <?php wp_reset_postdata(); ?>
        </div>

    </div>
</div>

<?php get_footer(); ?>