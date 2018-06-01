<?php

namespace Chhuti\Plugins\Booking;

use Chhuti\Plugins\Booking\ListTable;

class BookingList
{
  private $wpdb;
  private $today;

  public function __construct()
  {
    $this->wpdb = new DB();
    $this->$today = date('d-m-Y', time());
  }


  public function displayBookingList()
  {
    //$results = $this->wpdb->getBookingList();
    //include_once( PLUGIN_DIR_CHHUTI_BOOKING . '/views/booking-list.php');
    $list = new ListTable();
    $list->prepare_items();

    //$list->display();
    return $list;
  }
}

