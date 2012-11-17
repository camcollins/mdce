<?php
wp_deregister_script('admin-bar');
wp_deregister_style('admin-bar');
remove_action('wp_footer','wp_admin_bar_render',1000);
