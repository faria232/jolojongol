<?php
// get the bookings for next few months and return that data as 'date' => 'count' pairs
require_once('../../../../wp-load.php');

$memcache = new Chhuti\Plugins\Booking\ChhutiMemcached();


$data = $memcache->get('calendar-details');

//if(!'' === $data) {
  // try to get the details from memcahed first, if not found then make db query
  $model = new Chhuti\Plugins\Booking\Model\Booking();
  $bookings = $model->getFutureBookingCounts();

  $booking_data = []; 
  foreach($bookings as $booking) {
    $booking_data[$booking->reservation_date] = $booking->guests;
  }

  $calendar = new Chhuti\Plugins\Booking\Calendar($booking_data);
  $data  = $calendar->getCalendar();

  $memcache->set('calendar-details', $data);

//}

echo $data;
