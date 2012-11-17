<?php
if ( !function_exists('admin_bar_search') ) {
	function admin_bar_search () { ?>
		<style type="text/css">
		#wpadminbar #adminbarsearch {
			display: none;
		}
		</style>
		<?php
	}
	add_action('admin_head', 'admin_bar_search');
	add_action('wp_head', 'admin_bar_search');
}
