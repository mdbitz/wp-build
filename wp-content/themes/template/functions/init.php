<?php
/**
 * Initial setup and constants
 */
function theme_setup() {
    // Make theme available for translation
    load_theme_textdomain('uttheme', get_template_directory() . '/lang');

    // Enable plugins to manage the document title
    // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
    add_theme_support('title-tag');

    // Register wp_nav_menu() menus
    // http://codex.wordpress.org/Function_Reference/register_nav_menus
    register_nav_menus(array(
            'main' => __('Header Navigation', 'uttheme')
    ));

    // Add post thumbnails
    // http://codex.wordpress.org/Post_Thumbnails
    // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
    // http://codex.wordpress.org/Function_Reference/add_image_size
    add_theme_support('post-thumbnails');

    // Add post formats
    // http://codex.wordpress.org/Post_Formats
    add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'));

    // Add HTML5 markup for captions
    // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
    add_theme_support('html5', array('caption', 'comment-form', 'comment-list'));

    // Tell the TinyMCE editor to use a custom stylesheet
    add_editor_style('/assets/css/editor-style.css');
}
add_action('after_setup_theme', 'theme_setup');
