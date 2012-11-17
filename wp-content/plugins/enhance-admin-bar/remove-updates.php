<?php
function admin_render3() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('updates');
}
add_action( 'wp_before_admin_bar_render', 'admin_render3' );