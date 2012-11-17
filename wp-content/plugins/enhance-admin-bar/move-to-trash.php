<?php
function add_admin_bar() {
  global $wp_admin_bar;
  if ( !is_super_admin() || !is_admin_bar_showing() )
      return;
  $current_object = get_queried_object();
  if ( empty($current_object) )
      return;
  if ( !empty( $current_object->post_type ) &&
     ( $post_type_object = get_post_type_object( $current_object->post_type ) ) &&
     current_user_can( $post_type_object->cap->edit_post, $current_object->ID )
  ) {
    $wp_admin_bar->add_menu(
        array( 'id' => 'delete',
            'title' => __('Move to Trash'),
            'href' => get_delete_post_link($current_object->term_id)
        )
    );
  }
}
add_action( 'admin_bar_menu', 'add_admin_bar', 35 );