<?php
function admin_render2() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('get-shortlink');
}
add_action( 'wp_before_admin_bar_render', 'admin_render2' );