<?php get_header();?>

<div class="banner-image shadow border-bottom ">
    <div class="background-overlay" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/banner_3.webp');"></div>
    <div class="banner-content wide-big">
        <div class="content">
            <h1><?php single_cat_title(); ?></h1>
        </div>
    </div>
    <div class="background-grid"></div>
</div>

<div class="games-archive-grid wide-big">
    
    <main id="primary" class="category-page">
        <div class="container">
            <div class="games-block">
                <?php if (have_posts()) : while (have_posts()) : the_post();  ?>
                     <?php get_template_part('template-parts/post-game'); ?>
                <?php endwhile; ?>
                <?php else : echo '<p>' . esc_html__('No posts found in this category.', 'textdomain') . '</p>';            endif;?>                    
            </div>
        </div>
        <?php get_template_part('template-parts/pagination'); ?>
    </main>
    
</div>

<?php get_footer();?>