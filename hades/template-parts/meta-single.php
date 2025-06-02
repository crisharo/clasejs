<div class="meta">
    <div class="author">
    By <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
    <?php echo esc_html(get_the_author()); ?>
    </a> on <?php echo esc_html(get_the_date()); ?>
    </div>
    <div class="share">
        <?php get_template_part('template-parts/share'); ?>
    </div>
</div>