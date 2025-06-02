<?php get_header();?>

    <div class="banner-image shadow border-bottom ">
        <div class="background-overlay" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/banner_5.webp');"></div>
        <div class="banner-content wide-big">
            <div class="content">
                <h1><?php single_cat_title(); ?></h1>
            </div>
        </div>
        <div class="background-grid"></div>
    </div>
    
    <div class="home-grid wide-big">
        <?php get_template_part('template-parts/category-loop'); ?>
        <?php get_template_part('sidebar/sidebar-index'); ?>
    </div>

<?php get_footer();?>