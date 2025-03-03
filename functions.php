<?php
function my_theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

function enqueue_custom_scripts()
{
    // Enqueue custom.js
    wp_enqueue_script(
        'custom-js', // Handle
        get_stylesheet_directory_uri() . '/js/custom.js', // Path to your custom.js file
        array('jquery'), // Dependencies (jQuery is required)
        filemtime(get_stylesheet_directory() . '/js/custom.js'), // Version (filemtime for cache busting)
        true // Load in footer
    );

    // Localize script to pass PHP variables to JavaScript
    wp_localize_script(
        'custom-js', // Handle
        'ajax_object', // JavaScript object name
        array(
            'ajax_url' => admin_url('admin-ajax.php'), // URL for admin-ajax.php
        )
    );
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');