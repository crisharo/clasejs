<?php get_header();?>
    <div class="wide-med page">
        <article class="shadow border-gray border-radius-5 bg-white-pure">
            <?php while (have_posts()) : the_post();?>
                <div class="content">
                    <header><h1><?php the_title(); ?></h1></header>
                    <?php the_content();?></div>
            <?php
        endwhile;
        ?>
        </article>        
    </div>
<?php get_footer(); ?>
