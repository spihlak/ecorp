<?php
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

// Ecorp Theme functions

/**
 * Ecorp fonts
 * @package understrap
 */
if ( ! function_exists( 'ecorp_typekit' ) ) {
/**
 * Use TypeKit fonts
 */
  function ecorp_typekit() {
    $the_theme = wp_get_theme();
    wp_enqueue_style('', '', array(), $the_theme->get('Version'), false);
  }
}

add_action('wp_enqueue_scripts','ecorp_typekit');

if ( ! function_exists( 'ecorp_google_fonts' ) ) {
 /**
  * Use Google fonts
  */
  function ecorp_google_fonts() {
    $the_theme = wp_get_theme();
    wp_enqueue_style('', '', array(), $the_theme->get('Version'), false);
  }
}

add_action('wp_enqueue_scripts','ecorp_google_fonts');

if ( ! function_exists( 'ecorp_linearicons' ) ) {
  /**
  * Linearicons
  */
  function ecorp_linearicons() {
    $the_theme = wp_get_theme();
    wp_enqueue_style('linearicons','https://cdn.linearicons.com/free/1.0.0/icon-font.min.css', array(), $the_theme->get('Version'), false);
  }
}

add_action('wp_enqueue_scripts','ecorp_linearicons');

function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), false);
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
