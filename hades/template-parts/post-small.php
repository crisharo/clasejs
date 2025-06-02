<article class="news-post bg-white border-gray shadow border-radius-5">
    <div class="news-content">
        <div class="news-text">
            <span class="category-name blue-dark">
                <?php $category = get_the_category(); echo $category[0]->cat_name; ?>
            </span>
            <a class="news-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <?php get_template_part('template-parts/date-icon');?>
        </div>
        <?php if (has_post_thumbnail()) : ?>
            <div class="featured-image">
                <div class="bg" style="background-image: url(<?php the_post_thumbnail_url('thumbnail'); ?>)">
                </div>
            </div>
        <?php endif; ?>
    </div>
</article>