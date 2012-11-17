<?php
function add_admin_bar_settings() {
  global $wp_admin_bar;
	$wp_admin_bar->add_menu( array(
	'id' => 'settings_menu',
	'title' => __( 'Settings'),
	'href' => admin_url('options-general.php') ) );

	$wp_admin_bar->add_menu( array(
	'parent' => 'settings_menu',
	'title' => __( 'Writing'),
	'href' => admin_url('options-writing.php') ) );

	$wp_admin_bar->add_menu( array(
	'parent' => 'settings_menu',
	'title' => __( 'Reading'),
	'href' => admin_url('options-reading.php') ) );

	$wp_admin_bar->add_menu( array(
	'parent' => 'settings_menu',
	'title' => __( 'Discussion'),
	'href' => admin_url('options-discussion.php') ) );

	$wp_admin_bar->add_menu( array(
	'parent' => 'settings_menu',
	'title' => __( 'Media'),
	'href' => admin_url('options-media.php') ) );

	$wp_admin_bar->add_menu( array(
	'parent' => 'settings_menu',
	'title' => __( 'Privacy'),
	'href' => admin_url('options-privacy.php') ) );

	$wp_admin_bar->add_menu( array(
	'parent' => 'settings_menu',
	'title' => __( 'Permalinks'),
	'href' => admin_url('options-permalink.php') ) );
}
add_action( 'admin_bar_menu', 'add_admin_bar_settings', 35 );