<?php

namespace Chhuti\Plugins\Booking;

use Chhuti\Plugins\Booking\Model\Booking as Model;

class Booking
{

  public function __construct()
  {
  }

  /**
   * This method gets information about a booking by its id
   * and then displays it on the admin section.
   * @var integer $id
   */
  public function displayBookingInfo($id)
  {
    // get information on booking with id $id
    echo '<p>Displaying details for booking with id: '. $id .'</p>';

    $result = new Model($id);

    include_once( PLUGIN_DIR_CHHUTI_BOOKING .'/views/booking-info.php');
  }

  /**
   * This method displays the booking form for the webuser.
   */
  public function displayBookingForm()
  {
    $booking_date = filter_input(INPUT_GET, 'date', FILTER_SANITIZE_STRING);
    $package_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

    /**
     * If the second step is completed, there will be a package id in get request,
     * otherwise there will be only booking date.
     */
    if($package_id) {
      echo $this->getBookingDetailsPage($booking_date, $package_id);
    } elseif($booking_date) {
      echo $this->getPackageSelectionPage($booking_date);
    } else {
      echo 'Error';
    }
  }

  /**
   * Processing post data and Adding booking details to the database.
   */
  private function addBookingDetails()
  {
    foreach($_POST as $key => $value) {
      $array[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_STRING);
    }

    // we need data validation and data preparation at this stage
    $prices = $this->getPackagePrices($array['package_id']);
    $guests = [
      'adults' => $array['count_adults'],
      'children' => $array['count_children'],
      'others' => $array['count_others']
    ];
    $payment_total = $this->calculatePriceTotal($prices, $guests);
    $guests_count = intval($guests['adults']) + intval($guests['children']) + intval($guests['others']);

    $booking_array = [
      'package' => $array['package_id'],
      'guests_count' => $guests_count,
      'count_adults' => $array['count_adults'],
      'count_children' => $array['count_children'],
      'count_others' => $array['count_others'],
      'booking_source' => 'website',
      'primary_guest_name' => $array['name_first'] .' '. $array['name_last'],
      'primary_guest_phone' => $array['phone'],
      'primary_guest_organisation' => '',
      'primary_guest_email' => $array['email']
    ];

    $payment_array = [
      'payment_status' => 'pending',
      'payment_total' => $payment_total,
      'payment_advance' => 0,
      'payment_due' => $payment_total,
      'payments' => []
    ];

    $model = new Model();
    $model->setReservationDate($array['date']);
    $model->setBookingDetails($booking_array);
    $model->setPaymentDetails($payment_array);
    $model->save();

    if($model->getId()) {
      echo 'success: '. $model->getId();
    } else {
      echo 'failed '. json_encode($model);
    }

  }

  /**
   * This method gets the packages (first 10) to display on the seclection page,
   * and displays the first step of booking form.
   * @var integer $booking_date
   * @return void
   */
  private function getPackageSelectionPage($booking_date)
  {

    // get list of all the packages
    $args = [
      'posts_per_page' => 10,
      'post_type' => 'package',
      'post_status' => 'publish',
      'meta_key' => 'package_status',
      'meta_value' => 'available'
    ];

    $packages = get_posts($args);
    include_once( PLUGIN_DIR_CHHUTI_BOOKING  .'/views/forms/booking-form-step-1.php');
    return;
  }

  /**
   * This methods displays the booking details page.
   * @var integer $booking_date
   * @var integer $package_id
   * @return void
   */
  private function getBookingDetailsPage($booking_date, $package_id)
  {
    //$html = '<p>booking date: '. $booking_date .' package id: '. $package_details .'</p>';
    include_once( PLUGIN_DIR_CHHUTI_BOOKING .'/views/forms/booking-form-step-2.php');
    return;
  }

  /**
   * This method gets the package prices.
   * @var integer $package_id
   * @return integer
   */
  private function getPackagePrices($package_id)
  {
    $status = get_post_meta($package_id, Model::META_KEY_PACKAGE_STATUS, true);

    $price['adults'] = get_post_meta($package_id, Model::META_KEY_PRICE_ADULTS, true);
    $price['children'] = get_post_meta($package_id, Model::META_KEY_PRICE_CHILDREN, true);
    $price['others'] = get_post_meta($package_id, Model::META_KEY_PRICE_OTHERS, true);

    return $price;
  }

  /**
   * Calculates total price for the booking based on the package
   * and number of guests selected.
   * @var array $prices
   * @var array $guests
   * @return integer
   */
  private function calculatePriceTotal($prices, $guests)
  {
    $price_total = 0;
    foreach($prices as $key => $value) {
      $price = intval($value) * intval($guests[$key]);
      $price_total += $price;
    }

    return $price_total;
  }

}

