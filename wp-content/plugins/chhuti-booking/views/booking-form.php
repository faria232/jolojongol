<?php
include_once('../../../../wp-load.php');

get_header();
?>
<div id="main">
<?php

$booking = new \Chhuti\Plugins\Booking\Booking();
$booking-> displayBookingForm();
?>
</div>
<?php
get_footer();

