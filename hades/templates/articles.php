<?php /*
Template Name: Articles
Template Post Type: post
*/ ?>
<?php get_header();?>

<header class="main-container">
    <img src="<?php echo the_post_thumbnail_url('full'); ?>" class="background-image" alt="Sky background">
        <div class="message">
            <h1><?php the_title();?></h1>
            <div class="sub">2025 Edition</div>
        </div>
</header>

    <main id="primary" class="wide-big article">
        
        
            <article class="container shadow bg-white border-gray border-radius-5">
                <?php while (have_posts()) : the_post();?>

                    <div class="entry-content">
                        <div class="meta">
                            <div class="author">
                            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                            <?php echo esc_html(get_the_author()); ?>
                            </a>- updated <?php echo esc_html(get_the_date()); ?>
                            </div>
                            <div class="share">
                                <?php get_template_part('template-parts/share'); ?>
                            </div>
                        </div>
                        <?php the_content();?>
                    </div>

                    <footer>
                    <div class="single-disclaimer">
                        <span>
                        You can follow us on <strong><a href="https://x.com/daikamaweb">X/Twitter</a></strong>  or subscribe via email to receive updates and free games.
                        </span>
                        <?php echo do_shortcode('[noptin form=17577]'); ?>
                    </div>
                    </footer>
                    <?php
                endwhile;
                ?>
            </article>        
            <?php get_template_part('template-parts/single-related'); ?>
            <div class="box shadow border-gray border-radius-5 bg-white">
                <?php get_template_part('template-parts/comments'); ?>
            </div>
            
        

    </main>

<?php get_footer(); ?>
