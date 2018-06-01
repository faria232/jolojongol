<?php
require_once('../../../wp-load.php');
get_header();
?>
<section id="primary" class="content-full-width">
<h1>Test Page | Chhuti Booking Plugin</h1>
<?php
/*$booking = new Chhuti\Plugins\Booking\Model\Booking(1);
echo '<p>Booking for '. $booking->getCalendarId() .'</p>';
echo '<p>Reservation date: '. $booking->getReservationDate() .'</p>';
echo '<p>Reserved on: '. $booking->getReservedOnDate() .'</p>';
echo '<pre>';
var_dump($booking->getBookingDetails());
var_dump($booking->getPaymentDetails());
echo '</pre>';
 *//*
   echo '<h2>Adding payment</h2>';
$payment = [
  'payment_amount' => 2000,
  'payment_date' => time(),
  'payment_mode' => 'card',
  'payment_received_by' => 'Chhuti',
  'bank_charge' => 0
];

$booking->addTransaction($payment);
echo '<pre>';
$booking->save();
echo '</pre>';

echo '<h2>Add second payment</h2>';

$payment = [
  'payment_amount' => 10000,
  'payment_date' => time(),
  'payment_mode' => 'card',
  'payment_received_by' => 'Chhuti',
  'bank_charge' => 0
];

$booking->addTransaction($payment);
$booking->save();


echo '<pre>';
var_dump($booking->getBookingDetails());
var_dump($booking->getPaymentDetails());
echo '</pre>';


echo '<h2>update payment</h2>';
$payment['payment_amount'] = 11000;
$booking->updateTransaction(1, $payment);
$booking->save();

echo '<pre>';
var_dump($booking->getBookingDetails());
var_dump($booking->getPaymentDetails());
echo '</pre>';


echo '<h2>making correction</h2>';
$payment['payment_amount'] = 10709;
$booking->updateTransaction(1, $payment);
$booking->save();

echo '<pre>';
var_dump($booking->getBookingDetails());
var_dump($booking->getPaymentDetails());
echo '</pre>';
  */
/*
echo '<h2>add new booking</h2>';

$newBooking = new Chhuti\Plugins\Booking\Model\Booking();
$bookingInfo = [
    'package' => 3,
    'guests_count' => 16,
    'count_adults' => 8,
    'count_children' => 6,
    'count_others' => 2,
    'booking_source' => 'phone',
    'primary_guest_name' => 'kuddus',
    'primary_guest_phone' => '123456789',
    'primary_guest_organisation' => 'Boring',
    'primary_guest_email' => 'some@thing.com'
  ];
$paymentInfo = [
  'payment_total' => 25359,
  'payment_advance' => 0
];
$newBooking->setBookingDetails($bookingInfo);
$newBooking->setPaymentDetails($paymentInfo);
$newBooking->setReservationDate(strtotime('2018-03-19'));
$newBooking->save();
echo '<pre>';
var_dump($newBooking);
echo '</pre>';
 */
/*
$booking = new Chhuti\Plugins\Booking\Model\Booking(5);
echo '<p>Booking for calendar id: '. $booking->getCalendarId() .'</p>';
echo '<p>Reservation date: '. $booking->getReservationDate() .'</p>';
echo '<p>Reserved on: '. $booking->getReservedOnDate() .'</p>';
echo '<pre>';
var_dump($booking->getBookingDetails());
var_dump($booking->getPaymentDetails());
echo '</pre>';
/**/
$model = new Chhuti\Plugins\Booking\Model\Booking();
$bookings = $model->getFutureBookingCounts();

$booking_data = []; 
foreach($bookings as $booking) {
  $booking_data[$booking->reservation_date] = $booking->guests;
}

$calendar = new Chhuti\Plugins\Booking\Calendar($booking_data);
$data = $calendar->getCalendar();

echo $data;
?>
</section>
<?php
get_footer();

