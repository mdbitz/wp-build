<?php
/**
 * Scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /assets/build/style.min.css
 *
 * Enqueue scripts in the following order:
 * 1. jquery-2.1.4.min.js via Google CDN
 * 2. /theme/assets/js/vendor/modernizr.min.js
 * 3. /theme/assets/js/scripts.js
 */
function theme_scripts() {
    $assets = array(
        'css'       => '/assets/build/style.min.css',
        'js'        => '/assets/build/scripts.min.js',
        'jquery'    => '//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js'
    );

    wp_enqueue_style('theme_css', get_template_directory_uri() . $assets['css'], false, null);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    wp_enqueue_script('jquery');
    wp_enqueue_script('theme_js', get_template_directory_uri() . $assets['js'], array(), null, true);
}
add_action('wp_enqueue_scripts', 'theme_scripts', 100);
