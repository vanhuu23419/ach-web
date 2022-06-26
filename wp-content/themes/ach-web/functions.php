<?php
require_once(get_template_directory() . '/utils/ViewHelper.php');

/**
 * Theme support
 */
function ach_theme_support() {
    add_theme_support('post-thumbnails');

    add_theme_support('wp-block-styles');

    register_nav_menus(
        array(
            'primary' => 'Primary Menu',
        )
    );
}
add_action('after_setup_theme', 'ach_theme_support');

/**
 * Enqueue styles & scripts
 */
function ach_styles() {
    $styles = [
        'remixicon' => 'https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css',
        'bootstrap-css' => 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css',
        'ach-style' => get_template_directory_uri() . '/public/styles/ach.ultilities.css',
        'main-style' => get_template_directory_uri() . '/public/styles/main.css',
    ];
    $version_string = WP_DEBUG ? time() : false;
    foreach ($styles as $name => $uri) {
        wp_register_style($name, $uri, array(), $version_string);
        wp_enqueue_style($name);
    }
}

function ach_scripts() {
    $scripts = [
        'jquery-js' => 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js',
        'bootstrap-js' => 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js',
        'view-helper' => get_template_directory_uri() . '/public/scripts/view-helper.js',
        'main-script' => get_template_directory_uri() . '/public/scripts/script.js',
    ];
    $version_string = WP_DEBUG ? time() : false;
    foreach ($scripts as $name => $uri) {
        wp_register_script($name, $uri, array(), $version_string, true);
        wp_enqueue_script($name);
    }
}
add_action('wp_enqueue_scripts', 'ach_styles');
add_action('wp_enqueue_scripts', 'ach_scripts');

/**
 * Post view count
 */
function ach_increase_post_view() {   
    if (get_post_type() === 'post') {
        $postID = get_the_id();
        $count_key = 'views';
        $count = (int)get_post_meta($postID, $count_key, true);
        if ($count < 1) {
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
        }
        update_post_meta($postID, $count_key, $count + 1);
    }
}
add_action('template_redirect', 'ach_increase_post_view');
// set 'views' meta when create post
add_action( 'wp_insert_post', function($postId) {
    $count = (int)get_post_meta($postId, 'views', true);
    if ($count < 1) {
        add_post_meta($postId, 'views', '0');
        update_post_meta($postId, 'views', 0);
    }
});