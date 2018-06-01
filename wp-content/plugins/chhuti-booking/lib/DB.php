<?php

namespace Chhuti\Plugins\Booking;

class DB 
{
  private $bookingTable;
  private $wpdb;

  public function __construct()
  {
    global $wpdb;
    $this->wpdb = $wpdb;
    $this->bookingTable = $this->wpdb->prefix .'booking';
  }

  // add payment to database
  public function getBookingInfo($id)
  {
    $query = "SELECT * FROM $this->bookingTable WHERE id = $id";
    return $this->wpdb->get_row($query);
  }

  // get list of bookings
  public function getBookingList()
  {
    $query = "SELECT * FROM $this->bookingTable";
    return $this->wpdb->get_results($query);
  }

  public function getFutureBookingCounts($date_from, $date_to)
  {
    $query = "SELECT reservation_date, SUM(guests_count) guests FROM $this->bookingTable WHERE reservation_date > '$date_from' AND reservation_date < '$date_to' group by reservation_date";
    return $this->wpdb->get_results($query);
  }

  public function updateBookingInfo($data)
  {
    $id = $data->getId();

    $calendarId = $data->getCalendarId();
    $reservationDate = $data->getReservationDate();
    $reservedOnDate = $data->getReservedOnDate();
    $bookingDetails = json_encode($data->getBookingDetails());
    $paymentDetails = json_encode($data->getPaymentDetails());
    if($id) {
      // update entry
      $this->wpdb->update(
    $this->bookingTable,
    [
      'calendar_id' => $calendarId,
      'reservation_date' => $reservationDate,
      'reserved_on_date' => $reservedOnDate,
      'booking_details' => $bookingDetails,
      'payment_details' => $paymentDetails
    ],
    [
      'id' => $id
    ]
  );
    } else {
      $this->wpdb->insert(
        $this->bookingTable,
        [
      'calendar_id' => $calendarId,
      'reservation_date' => $reservationDate,
      'reserved_on_date' => $reservedOnDate,
      'booking_details' => $bookingDetails,
      'payment_details' => $paymentDetails
    ],
    [
      '%d',
      '%s',
      '%s',
      '%s',
      '%s'
    ]);
      $id = $this->wpdb->insert_id;
    }

    return $id;
  }

}

