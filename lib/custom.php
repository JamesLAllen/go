<?php
/**
 * Custom functions
 */
add_filter('show_admin_bar', '__return_false');

function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');

function remove_related_videos($embed) {
	if (strstr($embed,'http://www.youtube.com/embed/')) {
		return str_replace('?fs=1','?fs=1&rel=0&autohide=1&modestbranding=1&showinfo=0',$embed);
	} else {
		return $embed;
	}
}
add_filter('oembed_result', 'remove_related_videos', 1, true);

/**
 * Set the post revisions unless the constant was set in wp-config.php
 */
if (!defined('WP_POST_REVISIONS')) define('WP_POST_REVISIONS', 5);

// REMOVE META BOXES FROM DEFAULT POSTS SCREEN
function remove_default_post_screen_metaboxes() {
 remove_meta_box( 'commentstatusdiv','post','normal' ); // Comments Metabox
 remove_meta_box( 'trackbacksdiv','post','normal' ); // Talkback Metabox
 }
   add_action('admin_menu','remove_default_post_screen_metaboxes');

//remove pings to self
function no_self_ping( &$links ) {
    $home = get_option( 'home' );
    foreach ( $links as $l => $link )
        if ( 0 === strpos( $link, $home ) )
            unset($links[$l]);
}
add_action( 'pre_ping', 'no_self_ping' );

function home_page_menu_args( $args ) {
$args['show_home'] = true;
return $args;
}
add_filter( 'wp_page_menu_args', 'home_page_menu_args' );