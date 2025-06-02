<?php /*
Template Name: About
Template Post Type: page
*/ ?>
<?php get_header(); ?>

<div class="main-container">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about.webp" class="background-image" alt="Sky background">
        <div class="message">
            <h1><?php the_title();?></h1>
        </div>
</div>

<div class="wide-med page">
    <div class="content shadow border-gray border-radius-5 bg-white-pure">
        <?php the_content(); ?>
    </div>
</div>

<?php get_footer(); ?>