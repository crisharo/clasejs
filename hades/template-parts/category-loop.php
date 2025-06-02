<main id="primary" class="category-page">
    <div class="container">
        <div class="post-grid">
            <?php if (have_posts()) : 
                while (have_posts()) : the_post(); 
                    get_template_part('template-parts/post-small');
                endwhile;
                
                get_template_part('template-parts/pagination');
            else : 
                echo '<p>' . esc_html__('No posts found in this category.', 'textdomain') . '</p>';
            endif; ?>
        </div>
    </div>
</main>