<?php get_header(); ?>
<div class="banner-image shadow border-bottom">
    <div class="background-overlay" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/banner_4.webp');"></div>
    <div class="banner-content wide-big">
        <div class="content">
            <h1>Developers and Publishers</h1>
        </div>
    </div>
    <div class="background-grid"></div>
</div>

<div class="wide-big">
    <main id="primary" class="category-page flex-vertical">
        <?php
        // Get all posts in 'developer' category, sorted alphabetically
        $args = array(
             'post_type'              => 'developer', 
            'category_name' => 'developer',
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC'
        );

        $query = new WP_Query($args);
        
        if ($query->have_posts()) :
            $current_letter = '';
            
            while ($query->have_posts()) : $query->the_post();
                $first_letter = strtoupper(substr(get_the_title(), 0, 1));
                
                // If we're at a new letter, create a new section
                if ($first_letter != $current_letter) :
                    if ($current_letter != '') {
                        echo '</div></div>'; // Close both grid-2 and letter-group divs
                    }
                    $current_letter = $first_letter;
                    ?>
                    <div class="letter-group">
                        <span class="letter-heading"><?php echo $current_letter; ?></span>
                        <div class="grid-2">
                    <?php
                endif;
                get_template_part('template-parts/post-small');
            endwhile;
            
            // Close the last group's divs
            if ($current_letter != '') {
                echo '</div></div>';
            }
            
            wp_reset_postdata();
        else :
            echo '<p>' . esc_html__('No developers found.', 'textdomain') . '</p>';
        endif;
        ?>
    </main>
</div>

<?php get_footer(); ?>