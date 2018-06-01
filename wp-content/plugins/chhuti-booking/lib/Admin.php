<?php

namespace Chhuti\Plugins\Booking;

use Chhuti\Plugins\Booking\ListTable;

class Admin
{
  public function __construct()
  {
    // body

  }

  public static function loadBookingAdminPage()
  {
    echo '<div>';
    echo '<h2>Booking Admin</h2>';
    $list = new ListTable();
    $list->prepare_items();
    $list->display();
    echo '</div>';
  }

  public static function loadBookingInfoPage()
  {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    echo '<h2>Booking Details</h2>';
    if(!$id){
      echo '<p>Invalid ID provided</p>';
    }
    else {
      $booking = new Booking();
      $booking->displayBookingInfo($id);
    }
  }

  public static function loadPaymentAddPage()
  {
      $payment = new Payment();
      $payment->displayPaymentAddPage($id);
  }

}
