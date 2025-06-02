<?php get_header();?>       
    <div class="banner-white shadow border-bottom">
        <?php get_template_part('template-parts/index-featured'); ?>
    </div>
    <div class="home-grid wide-big">
        <?php get_template_part('template-parts/index-loop'); ?>
        <?php get_template_part('sidebar/sidebar-index'); ?>
    </div>
<?php get_footer();?>