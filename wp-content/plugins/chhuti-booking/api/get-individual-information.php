<?php
// get the bookings for next few months and return that data as 'date' => 'count' pairs

require_once('../../../../wp-load.php');
$db = mysql_connect("localhost", "root", "123") or die("Could not connect.");
$link = mysql_select_db("jongolold",$db);

$events = array();

$query = "SELECT *FROM wp_booking where reservation_date= '12-03-2018'";
$result = mysql_query($query) or die('cannot get results!');
while($row = mysqli_fetch_assoc($result)) {
 $data = json_encode($row);
}

echo $data;