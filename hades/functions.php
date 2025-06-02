<?php
// Theme setup hook
add_action( 'after_setup_theme', 'cyberia_setup' );

function cyberia_setup() {
    // Language support
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'html5', array( 'search-form' ) );

    // Set content width
    global $content_width;
    if ( ! isset( $content_width ) ) {
        $content_width = 1920;
    }

    // Register menus
    register_nav_menus( array(
        'main-menu'   => esc_html__( 'Main Menu', 'cyberia' ),
        'seo-menu'    => esc_html__( 'SEO Menu', 'cyberia' ),
        'footer-seo'  => esc_html__( 'Footer SEO', 'cyberia' ),
    ));
}

// Enqueue styles and scripts
add_action( 'wp_enqueue_scripts', 'cyberia_load_assets' );
function cyberia_load_assets() {
    // Enqueue main stylesheet
    wp_enqueue_style( 'cyberia-style', get_stylesheet_uri() );

    // Enqueue custom JavaScript file    
    wp_enqueue_script( 'share', get_template_directory_uri() . '/js/share.js', array(), null, true );
    wp_enqueue_script( 'menu', get_template_directory_uri() . '/js/menu.js', array(), null, true );
    wp_enqueue_script( 'gallery', get_template_directory_uri() . '/js/gallery.js', array(), null, true );
    wp_enqueue_script( 'dragscroll-script', get_template_directory_uri() . '/js/dragscroll.js', array(), null, true );
    wp_enqueue_script( 'particles', get_template_directory_uri() . '/assets/js/particles.js', array(), null, true );
}
// Enqueue particles CSS
    wp_enqueue_style('particles-style', get_template_directory_uri() . '/assets/css/particles.css');

// Enqueue DPS Display Post CSS
    wp_enqueue_style('dps-style', get_template_directory_uri() . '/assets/css/dps.css');

// Move jQuery to footer
add_action( 'wp_enqueue_scripts', 'mytheme_move_jquery_to_footer' );
function mytheme_move_jquery_to_footer() {
    if ( ! is_admin() ) {
        wp_scripts()->add_data( 'jquery', 'group', 1 );          // Move jQuery to footer
        wp_scripts()->add_data( 'jquery-core', 'group', 1 );     // Move jQuery core to footer
        wp_scripts()->add_data( 'jquery-migrate', 'group', 1 );  // Move jQuery migrate to footer
    }
}

// Function to display post date in "time ago" format
function meks_time_ago() {
    return human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) . ' ' . __( 'ago' );
}

// Remove Classic Theme Styles Inline CSS from the frontend
function remove_classic_theme_styles() {
    if (!is_admin()) { // Ensure it only affects the frontend
        wp_dequeue_style('classic-theme-styles-inline-css');
        wp_deregister_style('classic-theme-styles-inline-css');
    }
}
add_action('wp_enqueue_scripts', 'remove_classic_theme_styles', 100);

// Remove Global Styles and SVG Filters from WP 5.9.1 - 6.1
function remove_global_styles() {
    wp_dequeue_style('global-styles');
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');
}
add_action('wp_enqueue_scripts', 'remove_global_styles', 100);

// Limit the excerpt to 20 characters without breaking words
function custom_excerpt_first_paragraph($excerpt) {
    global $post;

    if (!is_admin()) {
        // Get the raw post content
        $content = $post->post_content;

        // Strip all HTML tags
        $content = wp_strip_all_tags($content);

        // Extract the first paragraph using a regex
        preg_match('/^(.*?\.)/s', $content, $matches);

        if (!empty($matches[1])) {
            $first_sentence = $matches[1];

            // Count words
            $word_count = str_word_count($first_sentence);

            // If less than 20 words, continue to the next period
            if ($word_count < 25) {
                preg_match('/^(.*?\..*?\.)/s', $content, $matches_extended);
                if (!empty($matches_extended[1])) {
                    return trim($matches_extended[1]); // Return up to the second period
                }
            }

            return trim($first_sentence); // Return only the first sentence if word count is enough
        }
    }

    return $excerpt; // Fallback to the default excerpt
}
add_filter('the_excerpt', 'custom_excerpt_first_paragraph');


//Breadcrumb
function get_breadcrumb() {
    if (is_category() || is_single()) {
        $categories = get_the_category();
        if ($categories) {
            foreach($categories as $category) {
                echo '<a href="' . get_category_link($category->term_id) . '">#' . $category->cat_name . '</a> ';
            }
        }
    } elseif (is_page()) {
        echo "&#187;&nbsp;&nbsp;";
        echo the_title();
    } elseif (is_search()) {
        echo "&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}

//RELATED POST
function news_games_tags($post_id, $number_of_posts = 5) {
    $tags = wp_get_post_tags($post_id);
    if (!$tags) {
        return [];
    }
    $tag_ids = [];
    foreach ($tags as $tag) {
        $tag_ids[] = $tag->term_id;
    }
    $args = [
        'tag__in' => $tag_ids,
        'post__not_in' => [$post_id],
        'posts_per_page' => $number_of_posts,
        'ignore_sticky_posts' => 1,
        'post_type' => ['post', 'news'], // Only show posts and news
    ];
    $related_posts_query = new WP_Query($args);
    return $related_posts_query->posts;
}

function enqueue_tabs_assets() {
    if (is_singular('games')) {
        wp_enqueue_style('tabs-style', get_template_directory_uri() . '/assets/css/tabs.css');
        wp_enqueue_script('tabs-script', get_template_directory_uri() . '/assets/js/tabs.js', array(), '1.0', true);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_tabs_assets');

// Include 'news' CPT in category archives
function include_news_in_category_archives($query) {
    if (!is_admin() && $query->is_main_query() && $query->is_category()) {
        $query->set('post_type', array('post', 'news', 'games', 'developer'));
    }
    return $query;
}
add_action('pre_get_posts', 'include_news_in_category_archives');

// CATEGORY TEMPLATE A LOS SUB
function new_subcategory_hierarchy() { 
    $category = get_queried_object();
    $parent_id = $category->category_parent;
    $templates = array();
    if ( $parent_id == 0 ) {
        // Use default values from get_category_template()
        $templates[] = "category-{$category->slug}.php";
        $templates[] = "category-{$category->term_id}.php";
        $templates[] = 'category.php';     
    } else {
        // Create replacement $templates array
        $parent = get_category( $parent_id );
        // Current first
        $templates[] = "category-{$category->slug}.php";
        $templates[] = "category-{$category->term_id}.php";
        // Parent second
        $templates[] = "category-{$parent->slug}.php";
        $templates[] = "category-{$parent->term_id}.php";
        $templates[] = 'category.php'; 
    }
    return locate_template( $templates );
}
add_filter( 'category_template', 'new_subcategory_hierarchy' );

// Add tag support to pages
function add_tags_to_pages() {
    register_taxonomy_for_object_type('post_tag', 'page');
}
add_action('init', 'add_tags_to_pages');

// Estilo Post dentro de Post
function be_dps_template_part( $output, $original_atts ) {

	// Return early if our "layout" attribute is not specified
	if( empty( $original_atts['layout'] ) )
		return $output;
	ob_start();
	get_template_part( 'partials/dps', $original_atts['layout'] );
	$new_output = ob_get_clean();
	if( !empty( $new_output ) )
		$output = $new_output;
	return $output;
}
add_action( 'display_posts_shortcode_output', 'be_dps_template_part', 10, 2 );