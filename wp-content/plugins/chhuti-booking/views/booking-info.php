
<?php
include'css/chhuti-admin.css';

// displaying information on a single booking

if(null === $result) {
  echo '<p>Failed to get any information on this booking';
} else {

  $booking_details = $result->getBookingDetails();
  $payment_details = $result->getPaymentDetails();

  echo '<h2 class="font-20">' . $booking_details['primary_guest_name'] .' | <span>'. date('jS F, Y', strtotime($result->getReservationDate())) .'</span> | '. $payment_details['payment_status'] .'</h2>';
  echo '<hr>';
  echo '<p class="font-18 gap">Booking details for '. $booking_details['primary_guest_name'] .' reservation made for '. date('jS F, Y', strtotime($result->getReservationDate())) .'.</p>';
  echo '<h3 class="font-20 gap">Booking details</h3>';
?>
<dl class="listbooking">
  <dt><strong>Package: </strong>  <?php echo $booking_details['package']; ?></dt>
  <dt><strong>No of Guests:</strong> <?php echo $booking_details['guests_count']; ?></dt>
</dl>
<?php
  echo '<p><a class="font-18" href="'. URL_BOOKING_LIST .'">Back to booking list</a></p>';

  echo '<h3 class="gap gap-top">Payment Details</h3>';
  $add_payment_url = 'admin.php?page=payment&id=' . $result->getId();
  echo '<p class="font-18"><strong>Payment amount:&nbsp;&nbsp;</strong>' . $payment_details['payment_total'] .'</p>';
  echo '<p class="font-18"><strong>Advance paid:&nbsp;&nbsp;</strong>' . $payment_details['payment_advance'] .'</p>';
  echo '<p class="font-18"><strong>Payment due:&nbsp;&nbsp;</strong>'  . $payment_details['payment_due'] .'</p>';
  echo '<a class="font-18 gap" href="'. $add_payment_url .'">Add Payment</a>';

  if(!empty($payment_details['payments'])) {
    echo '<table class="widefat fixed"><thead><tr><th class="font-16">Payment Date</th><th class="font-16">Payment Method</th><th class="font-16">Payment Amount</th><th class="font-16">Received by</th></tr></thead><tbody>';
    foreach($payment_details['payments'] as $payment) {
      echo '<tr>';
      echo '<td class="font-16">'. $payment['payment_date'] .'</td>';
      echo '<td class="font-16">'. $payment['payment_method'] .'</td>';
      echo '<td class="font-16">'. $payment['payment_amount'] .'</td>';
      echo '<td class="font-16">'. $payment['payment_received_by'] .'</td>';
      echo '</tr>';
    }
    echo '</tbody></table>';
  }
  echo '<p><a class="font-18" href="'. URL_BOOKING_LIST .'">Back to booking list</a></p>';
}

