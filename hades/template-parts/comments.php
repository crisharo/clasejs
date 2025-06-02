<div id="comments" class="single-comments">
    <div class="section-title">Comments</div>
    <?php
    if ( comments_open() || get_comments_number() ) {
        comments_template();
    }
    ?>
</div>