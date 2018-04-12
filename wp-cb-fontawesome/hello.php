<?php

/*
Plugin Name: Wp Fontawesome by Creareblogs.net
Plugin URI: http://wordpress.org/plugins/wp-cb-fontawesome/
Description: This plugin helps you to integrate in wordpress the brank new FontAwesome.com 5 icon fonts, and migrate from version 4.
Author: CreareBlogs.net
Version: 0.1
Author URI: http://www.creareblogs.net/fontawesome-su-wordpress/
*/

add_action( 'wp_enqueue_scripts', 'wp_cb_fontawesome' );
function wp_cb_fontawesome() {
    wp_enqueue_script( 'font-awesome', 'https://use.fontawesome.com/releases/v5.0.1/js/all.js', array(), null );
	wp_enqueue_script( 'font-awesome-4', plugins_url( 'js/4/fa-v4-shims.min.js', __FILE__ ), array(), null );
}

add_filter( 'script_loader_tag', 'wp_cb_add_defer_attribute', 10, 2 );
/**
 * Filter the HTML script tag of `font-awesome` script to add `defer` attribute.
 *
 * @param string $tag    The <script> tag for the enqueued script.
 * @param string $handle The script's registered handle.
 *
 * @return   Filtered HTML script tag.
 */
function wp_cb_add_defer_attribute( $tag, $handle ) {
    if ( 'font-awesome' === $handle || 'font-awesome-4' === $handle ) {
        $tag = str_replace( ' src', ' defer src', $tag );
    }

    return $tag;
}
?>