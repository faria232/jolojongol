<?php

namespace Chhuti\Plugins\Booking;

class Payment
{
  private $data = [];
  private $fields = [
    'booking_id',
    'payment_method',
    'payment_date',
    'payment_amount',
    'payment_received_by'
  ];
  private $id;

  public function __construct()
  {
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      // form submitted, process it
      foreach($this->fields as $field) {
        // we're validating all data as string
        $this->data[$field] = filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
      }
      $this->id = $this->data['booking_id'];
      $this->addPayment();
      $url = get_site_url() .'/wp-admin/admin.php?page=booking-info&id='. $this->id;
      include_once( PLUGIN_DIR_CHHUTI_BOOKING .'/views/payment-added.php');
    } else {
      // grab the id from get variable
      $this->id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    }   
  }

  // calculates payment
  public function displayPaymentAddPage()
  {
    echo '<h2>Add payment</h2>';
    echo '<p>Adding payment for booking id: '. $this->id .'</p>';

    if(!$this->id){
      echo '<p>Invalid ID provided</p>';
    } else { 
      include_once( PLUGIN_DIR_CHHUTI_BOOKING .'/views/forms/payment-add.php' );
    }
  }

  // add payment to database
  public function getPaymentData()
  {
    return json_encode($this->fields);
  }

  public function addPayment()
  {
    $model = new Model\Booking($this->data['booking_id']);
    $model->addTransaction($this->data);
    $model->save();
  }

}

