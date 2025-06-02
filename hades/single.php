<?php get_header();?>
<div class="single-header">
    <div class="background-overlay" style="background-image: url('<?php echo the_post_thumbnail_url('full'); ?>');"></div>

        <header class="entry-header">                       
            <div class="entry-title">
                <div class="category">
                    <?php 
                    $categories = get_the_category();
                    if (!empty($categories)) {
                        $category = $categories[0]; // Obtener la primera categoría
                        echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->cat_name) . '</a>';
                    }
                    ?>
                </div>
                <h1><?php the_title(); ?></h1>
            </div>
        </header>
        

    </div>
    <main id="primary" class="wide-big single-grid">
        
        <div class="single">
            <article class="container shadow bg-white border-gray border-radius-5">
                <?php while (have_posts()) : the_post();?>

                    <div class="entry-content">
                    <?php get_template_part('template-parts/meta-single'); ?>
                        <?php the_content();?>
                    </div>
                    <?php
                endwhile;
                ?>
            </article>        
            <?php get_template_part('template-parts/single-related'); ?>
            <div class="box shadow border-gray border-radius-5 bg-white">
                <?php get_template_part('template-parts/comments'); ?>
            </div>
            
        </div>

        <?php get_template_part('sidebar/sidebar-single'); ?>

    </main>

<?php get_footer(); ?>
