<?php
/**
 * np011 functions and definitions
 */

function np011_child_enqueue_styles() {

    $parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.min.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'np011_child_enqueue_styles' );

/*
 * Enqueue JavaScript
 */

function np011_child_scripts() {
    wp_register_script( 'custom', get_stylesheet_directory_uri() . '/js/dist/custom.min.js', array(), null, true);
    wp_register_script( 'scripts', get_stylesheet_directory_uri() . '/js/dist/scripts.min.js', array(), null, true);

    wp_enqueue_script('custom');
    wp_enqueue_script('scripts');
}
add_action( 'wp_enqueue_scripts', 'np011_child_scripts' );


/**
 * Setup Child Theme's textdomain.
 *
 * Declare textdomain for this child theme.
 * Translations can be filed in the /languages/ directory.
 */
function np011_child_theme_setup() {
    load_child_theme_textdomain( 'np011-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'np011_child_theme_setup' );
