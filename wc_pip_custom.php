<?php 
/* 
Plugin Name:  WooCommerce PIP Custom
Plugin URI: https://github.com/rayflores/jeffweber
Description: Use Custom PIP templates **for Admins Only.
Version: 1.0
Author: Ray Flores
Author URI: https://www.rayflores.com/
*/

function wc_pip_custom_plugin_path() {
  // gets the absolute path to this plugin directory
  return untrailingslashit( plugin_dir_path( __FILE__ ) );
}
function show_only_to_admins(){
	global $current_user;
	if ( ( current_user_can( 'manage_options') || current_user_can( 'manage_woocommerce' ) ) && is_admin() ) {
		add_filter( 'woocommerce_locate_template', 'wc_pip_custom_locate_template', 10, 3 );
	}
}
add_action( 'init','show_only_to_admins' );


function wc_pip_custom_locate_template( $template, $template_name, $template_path ) {
  global $woocommerce; 
  $_template = $template;
 
  if ( ! $template_path ) {
	  $template_path = $woocommerce->template_url;
  }
  $plugin_path  = wc_pip_custom_plugin_path() . '/woocommerce/';

  // Look within passed path within the theme - this is priority
  $template = locate_template(
     array(
      $template_path . $template_name,
       $template_name
     )
  );

  // Modification: Get the template from this plugin, if it exists
  if (  file_exists(  $plugin_path . $template_name ) ) {
     $template = $plugin_path . $template_name;
   }
 // Use default template

  if ( ! $template ) {
    $template = $_template;
  }

  // Return what we found
  return $template;
}
// get current user logged in Name -> for initials
add_action('woocommerce_after_order_notes', 'add_billing_field', 10, 1);
 
function add_billing_field( $checkout ) {
	$getmemid = 'WEB';
	
	if ( ( current_user_can( 'manage_options') || current_user_can( 'manage_woocommerce' ) ) ){
		$current_user = wp_get_current_user();
		$first_name = $current_user->user_firstname;
		$last_name = $current_user->user_lastname;
		$getmemid = strtoupper($first_name[0] . $last_name[0]);
	} 
 
	// Output the hidden link
    echo '<div id="user_link_hidden_checkout_field">
            <input type="hidden" class="input-hidden" name="sold_by" id="sold_by" value="' . $getmemid . '">
    </div>';
 
}
// save sold_by
add_action( 'woocommerce_checkout_update_order_meta', 'save_custom_checkout_hidden_field', 10, 1 );
function save_custom_checkout_hidden_field( $order_id ) {

    if ( ! empty( $_POST['sold_by'] ) )
        update_post_meta( $order_id, '_sold_by', sanitize_text_field( $_POST['sold_by'] ) );

}
/**
 * Display field value on the order edit page
 */
add_action( 'woocommerce_admin_order_data_after_billing_address', 'sold_by_checkout_field_display_admin_order_meta', 10, 1 );

function sold_by_checkout_field_display_admin_order_meta($order){
    echo '<p><strong>'.__('Sold By').':</strong> <br/>' . get_post_meta( $order->id, '_sold_by', true ) . '</p>';
}