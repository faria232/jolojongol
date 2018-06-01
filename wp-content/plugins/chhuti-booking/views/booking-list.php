<?php
echo '<div class="wrap">';
if(empty($results)) {
?>
<p>Sorry, there is no booking result in Database.</p>
<?php
} else {
?>
<div class="filters">
<h3>Filters</h3>
<p class="info">You can only choose one filter at a time (for the time being).</p>
<ul class="list-horizontal">
<li><a href="">ID</a></li>
<li><a href="">Reservation date</a></li>
<li><a href="">Primary guest name</a></li>
<li><a href="">Payment status</a></li>
</ul>
</div>
<table class="widefat fixed" cellspacing="0">
  <thead>
    <tr>
      <th></th>
      <th>Date</th>
      <th>Primary guest name</th>
      <th>Guests count</th>
      <th>Payment status</th>
      <th>Payment total</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
<?php
  foreach($results as $result) {
    $booking_details = json_decode($result->booking_details);
    $payment_details = json_decode($result->payment_details);
    echo '<tr>';
    echo '<td>'. $result->id .'</td>';
    echo '<td>' . $result->reservation_date .'</td>';
    echo '<td>' . $result->primary_guest_name .'</td>';
    echo '<td>' . $result->guests_count .'</td>';
    echo '<td>' . $result->payment_status .'</td>';
    echo '<td>' . $payment_details->payment_total .'</td>';
    echo '<td><a href="admin.php?page=booking-info&id='. $result->id .'">View</a></td>';
    echo '</tr>';
  }
?>
  </tbody>
</table>
<?php
}
echo '</div>';

