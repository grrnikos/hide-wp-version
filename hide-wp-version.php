<?php

/**
 * Hide WP version meta tag from <head> and generator tag from feeds
 * @return null
 */
function remove_wp_version_tag() {
    return null;
}
add_filter( 'the_generator', 'remove_wp_version_tag' );

/**
 * Hide WP version string from scripts and styles
 * @return string $src
 */
function remove_wp_version_string( $src ) {
    if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) ) {
        $src = remove_query_arg( 'ver', $src );
    }
    return $src;
}
add_filter( 'script_loader_src', 'remove_wp_version_string' );
add_filter( 'style_loader_src', 'remove_wp_version_string' );
