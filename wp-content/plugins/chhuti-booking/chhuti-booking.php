<?php
/*
Plugin Name: Chhuti Booking
Plugin URI: https://codekarigor.com
Description: Simple booking using Calendar
Version: 1.0
Author: Chhuti Team
Text Domain: Chhuti
 */

namespace Chhuti\Plugins\Booking;

define('PLUGIN_CHHUTI_BOOKING_VERSION', '1.0');
define('PLUGIN_DIR_CHHUTI_BOOKING', __DIR__);
define('URL_BOOKING_LIST', get_site_url() .'/wp-admin/admin.php?page=booking-admin');
define('URL_BOOKING_INFO', get_site_url() .'/wp-admin/admin.php?page=booking-info');

include_once( PLUGIN_DIR_CHHUTI_BOOKING . '/custom-fields.php');

// autoloading classes placed inside 'lib/' directory
spl_autoload_register(function($class) {

  //project specific namespace prefix
  $prefix = 'Chhuti\\Plugins\\Booking\\';

  //base directory for the namespace prefix
  $base_dir = __DIR__ . '/lib/';

  //does the class use the namespace prefix
  $len = strlen($prefix);

  if (strncmp($prefix, $class, $len) !== 0) {

    // no, move to the next registered autoloader
    return;

  }

  //get the relative class name
  $relative_class = substr($class, $len);

  // replace the namespace prefix with base direcrory,
  // replace namespace separators with directory separators
  // in the relative class name, append with .php
  $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';


  if (file_exists($file)) {
    // if the fies exists, require it
    require $file;

  }

});

// we're going to run DB table creation during activation
register_activation_hook(__FILE__, array('\Chhuti\Plugins\Booking\Setup', 'activatePlugin'));

// this method will run during plugin activation
register_deactivation_hook(__FILE__, array('\Chhuti\Plugins\Booking\Setup','deactivatePlugin'));

// we're adding scripts here
add_action('wp_enqueue_scripts', '\Chhuti\Plugins\Booking\load_chhuti_scripts');
function load_chhuti_scripts()
{
  wp_enqueue_style('chhuti-booking-style', plugins_url('/css/style.css', __FILE__));
  // we're loading this javascript in footer
  wp_enqueue_script('chhuti-booking-script', plugins_url('/js/chhuti.js', __FILE__), [], PLUGIN_CHHUTI_BOOKING_VERSION, true);
}

// we're adding admin css here
function admin_chhuti_scripts()
{
  wp_enqueue_style('chhuti-admin-style', plugins_url('/css/chhuti-admin.css', __FILE__));
}
add_action('admin_enqueue_scripts', '\Chhuti\Plugins\Booking\admin_chhuti_scripts');


// if admin site is loaded, then we're adding admin menu here
if( is_admin() ) {
  // we need an admin menu for this plugin
  add_action('admin_menu', '\Chhuti\Plugins\Booking\chhuti_admin_menu', 90);
}

function chhuti_admin_menu()
{
  // this will create bookings sub menu
  add_submenu_page('chhuti-admin', 'Booking List', 'Bookings', 'activate_plugins', 'booking-admin', ['\Chhuti\Plugins\Booking\Admin','loadBookingAdminPage']);

  // this will create place to see individual bookings
  add_submenu_page('booking-admin', 'Booking Information', 'Booking Info', 'activate_plugins', 'booking-info', ['\Chhuti\Plugins\Booking\Admin','loadBookingInfoPage']);

  // this will create feature to add single payment
  add_submenu_page('booking-admin', 'Add Payment', 'Add Payment', 'activate_plugins', 'payment', ['\Chhuti\Plugins\Booking\Admin','loadPaymentAddPage']);
}

// returning list of packages
function get_package_details()
{
  global $wpdb;
  $args = [
    'posts_per_page' => 10,
    'post_type' => 'package',
    'post_status' => 'publish',
    'meta_key' => 'package_status',
    'meta_value' => 'available'
  ];
  $packages = get_posts($args);
  return $packages;
}

