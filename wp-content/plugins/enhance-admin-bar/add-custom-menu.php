<?php
add_action('init', 'adminbar_nav');
function adminbar_nav() {

	register_nav_menus( array(
		'admin_bar_nav' => __( 'Enhance Admin Bar Custom Menu' ),
	) );

}

add_action('admin_bar_init', 'adminbar_menu_init');
function adminbar_menu_init() {
	if (!is_super_admin() || !is_admin_bar_showing() )
		return;
 	add_action( 'admin_bar_menu', 'admin_bar_menu', 1000 );
}

function admin_bar_menu() {
	global $wp_admin_bar;

	$menu_name = 'admin_bar_nav';
	if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

	    $menu_items = wp_get_nav_menu_items( $menu->term_id );
	    if ($menu_items) {
		    $wp_admin_bar->add_menu( array(
		        'id' => 'admin-menu-0',
		        'title' => 'Enhance Admin Bar Custom Menu',
				'href' => '#' ) );
		    foreach ( $menu_items as $menu_item ) {
		        $wp_admin_bar->add_menu( array(
		            'id' => 'admin-menu-' . $menu_item->ID,
		            'parent' => 'admin-menu-' . $menu_item->menu_item_parent,
		            'title' => $menu_item->title,
		            'href' => $menu_item->url,
		            'meta' => array(
		                'title' => $menu_item->attr_title,
		                'target' => $menu_item->target,
		                'class' => implode( ' ', $menu_item->classes ),
		            ),
		        ) );
		    }
	    }
	}
}

	