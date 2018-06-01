//sending date-id to server and requesting for info

<?php

    $db = mysql_connect("localhost", "root", "123") or die("Could not connect.");
    $link = mysql_select_db("jongolold",$db);

    $events = array();

    $query = "SELECT *FROM wp_booking where reservation_date= '12-03-2018'";
    $result = mysql_query($query) or die('cannot get results!');
    while($row = mysqli_fetch_assoc($result)) {
         print_r($row);
    }
  echo $data;

?>
