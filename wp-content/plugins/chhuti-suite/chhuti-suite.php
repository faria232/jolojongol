<?php
/*
Plugin Name: Chhuti Suite 
Plugin URI: https://codekarigor.com
Description: Placeholder to keep all chhuti plugins together
Version: 1.0
Author: Chhuti Team
Text Domain: Chhuti
 */

namespace Chhuti\Plugins\Suite;

require_once('chhuti-custom-post-types.php');

define('PLUGIN_DIR_CHHUTI_SUITE', __DIR__);

// autoloading classes placed inside 'lib/' directory
spl_autoload_register(function($class) {

  //project specific namespace prefix
  $prefix = 'Chhuti\\Plugins\\Suite\\';

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


if( is_admin() ) {
  // we need an admin menu for this plugin
  add_action('admin_menu', '\Chhuti\Plugins\Suite\chhuti_admin_menu', 80);
}

/**
 * We're adding a menu in the admin dashboard for Chhuti
 */
function chhuti_admin_menu()
{
  $page_title = 'Chhuti Plugins';
  $menu_title = 'Chhuti';
  $capability = 'activate_plugins';
  $menu_slug = 'chhuti-admin';
  //$function = [$this, $function_name];
  $icon_url = 'dashicons-palmtree';
  $position = 9;

  // this would be chhuti plugin suite's control/settings page
  add_menu_page( $page_title, $menu_title, $capability, $menu_slug, ['\Chhuti\Plugins\Suite\Admin', 'loadAdminPage'], $icon_url, $position );

}

