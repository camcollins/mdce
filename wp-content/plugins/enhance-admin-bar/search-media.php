<?php
function wp_media_search_form() {
    global $wp_admin_bar, $wpdb;
    if ( !is_super_admin() || !is_admin_bar_showing() )
        return;
    $media_search = '
	<form action="'.admin_url('upload.php?tab=search').'" method="get">
        <input class="media-input" maxlength="100" name="search" size="13" type="text" value="' . __( 'Search Media', 'textdomain' ) . '" style="text-shadow: 0px 0px 0px #aaa; color: #333; height: 24px;" />
        <button class="media-button" style="color: #333; height: 27px; text-shadow: 0px 0px 0px #aaa !important; padding-left: 5px; padding-right: 5px; padding-bottom: 3px;">
            <span>Go</span>
        </button>
    </form>
';
    /* Add the main siteadmin menu item */
    $wp_admin_bar->add_menu( array( 'id' => 'media_search', 'title' => __( 'Search Media', 'textdomain' ), 'href' => '#' ) );
    $wp_admin_bar->add_menu( array( 'parent' => 'media_search', 'title' => $media_search, 'href' => '#' ) );
}
add_action( 'admin_bar_menu', 'wp_media_search_form', 1000 );