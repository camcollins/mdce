<?php
function wp_plugins_search_form() {
    global $wp_admin_bar, $wpdb;
    if ( !is_super_admin() || !is_admin_bar_showing() )
        return;
    $plugins_search = '
	<form action="http://wordpress.org/extend/plugins/search.php" method="get">
        <input class="plugins-input" maxlength="100" name="search" size="13" type="text" value="' . __( 'Search Plugins', 'textdomain' ) . '" style="text-shadow: 0px 0px 0px #aaa; color: #333; height: 24px;" />
        <button class="plugins-button" style="color: #333; height: 27px; text-shadow: 0px 0px 0px #aaa !important; padding-left: 5px; padding-right: 5px; padding-bottom: 3px;">
            <span>Go</span>
        </button>
    </form>
';
    /* Add the main siteadmin menu item */
    $wp_admin_bar->add_menu( array( 'id' => 'plugins_search', 'title' => __( 'Search Plugins', 'textdomain' ), 'href' => '#' ) );
    $wp_admin_bar->add_menu( array( 'parent' => 'plugins_search', 'title' => $plugins_search, 'href' => '#' ) );
}
add_action( 'admin_bar_menu', 'wp_plugins_search_form', 1000 );