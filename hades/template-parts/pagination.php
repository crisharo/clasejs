<div class="pagination">			
    <div class="nav-previous">
        <?php previous_posts_link( __( '<span class="meta-nav">Previous</span>' ) ); ?>
    </div>
    <div class="nav-current">
        <?php
        global $wp_query;
        $current_page = max(1, get_query_var('paged'));
        $total_pages = $wp_query->max_num_pages;
        echo 'Page ' . $current_page . ' of ' . $total_pages;
        ?>
    </div>
    <div class="nav-next">
        <?php next_posts_link( __( '<span class="meta-nav">Next</span>' ) ); ?>
    </div>
</div>