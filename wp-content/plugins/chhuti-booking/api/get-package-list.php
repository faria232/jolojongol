<?php
require_once('../../../../wp-load.php');
// get the package lists and return it as json
$memcache = new Chhuti\Plugins\Booking\ChhutiMemcached();
$data = $memcache->get('package-details');
if($data) {
  echo $data;
} else {
  // try to get the details from memcahed first, if not found then make db query
  $packages = Chhuti\Plugins\Booking\get_package_details();

  $package_data = [];
  foreach($packages as $package) {
    $array = [
      'package_id' => $package->ID,
      'package_name' => $package->post_title,
    ];
    $array['package_price_for_adults'] = get_post_meta($package->ID, 'package_price_for_adults', true);
    $array['package_price_for_children'] = get_post_meta($package->ID, 'package_price_for_children', true);
    $array['package_price_for_others'] = get_post_meta($package->ID, 'package_price_for_others', true);
    $package_data[] = $array;
  }

  $data = json_encode($package_data);
  $memcache->set('package-details', $data);

  echo $data;
}

