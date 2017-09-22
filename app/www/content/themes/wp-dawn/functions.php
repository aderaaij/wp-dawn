<?php
$nameSpace = 'wpd_';

// =========================================================================
// REMOVE EMOJI STUFF
// https://wordpress.stackexchange.com/questions/185577/disable-emojicons-introduced-with-wp-4-2
// =========================================================================
function disable_wp_emojicons() {
    // all actions related to emojis
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    add_filter( 'emoji_svg_url', '__return_false' );

    // filter to remove TinyMCE emojis
    add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );

// =========================================================================
// REMOVE EMOJI FROM TINYMCE
// =========================================================================
function disable_emojicons_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}

// =========================================================================
// REMOVE JUNK FROM HEAD
// =========================================================================
remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
remove_action('wp_head', 'wp_generator'); // remove wordpress version

remove_action('wp_head', 'feed_links', 2); // remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links

remove_action('wp_head', 'index_rel_link'); // remove link to index page
remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)

remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );

// =========================================================================
// Cache busting function
// =========================================================================
function autoversion($url) {
    $path = pathinfo($url);
    $ver = filemtime(get_theme_file_path().$url);
    return $ver;
}

// =========================================================================
// REGISTER / DEREGISTER SCRIPTS AND STYLES
// =========================================================================
function enqueue_scripts_styles() {
    global $wp_styles;
    // Register script
    wp_register_script( 'script', get_template_directory_uri() . '/assets/js/script.js','', autoversion('/assets/js/script.js'), true );
    wp_enqueue_script('script');

    wp_enqueue_style( 'style',  get_template_directory_uri() . '/assets/css/screen.css','', autoversion('/assets/css/screen.css'), '');

    // Remove wp-embed script
    wp_deregister_script( 'wp-embed' );
    
}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts_styles' );