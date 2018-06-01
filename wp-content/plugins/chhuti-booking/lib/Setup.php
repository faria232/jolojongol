<?php
namespace Chhuti\Plugins\Booking;

class Setup
{
  
  public function __construct()
  {
    error_log('setting up chhuti booking plugin');
  }

  public static function activatePlugin()
  {
    error_log('activated');
    self::createTable();
  }

  public static function createTable()
  {
    global $wpdb;
    $tableName = $wpdb->prefix . "booking";
    $sql = "
CREATE TABLE $tableName (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    calendar_id INT UNSIGNED NOT NULL DEFAULT 1,
    reservation_date DATE NOT NULL,
    reserved_on_date DATETIME NOT NULL,
    booking_details LONGTEXT CHECK(booking_details IS NULL OR JSON_VALID(booking_details)),
    payment_details LONGTEXT CHECK(payment_details IS NULL OR JSON_VALID(payment_details)),
    guests_count SMALLINT UNSIGNED AS (JSON_VALUE(booking_details, '$.guests_count')),
    primary_guest_name VARCHAR(50) AS (JSON_VALUE(booking_details, '$.primary_guest_name')),
    payment_status VARCHAR(15) AS (JSON_VALUE(payment_details, '$.payment_status')),
    PRIMARY KEY (id),
    INDEX (guests_count),
    INDEX (primary_guest_name),
    INDEX (payment_status)
);";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
  }

  public static function deactivatePlugin()
  {
    error_log('deactivated');
    return true;
  }

  public static function test()
  {
    global $wpdb;
    $tableName = $wpdb->prefix . "booking";

    $reservation_date = date('Y-m-d', strtotime("+1 month"));
    $reserved_on_date = date('Y-m-d H:i:s', time());
    // add sample entries to test it's working
    $bookingData = [
      "package" => 1,
      "guests_count" => 10,
      "count_adults" => 6,
      "count_children" => 4,
      "count_others" => 2,
      "booking_source" => "website",
      "primary_guest_name" => "Test user",
      "primary_guest_phone" => "012345678",
      "primary_guest_organisation" => "Test organisation",
      "primary_guest_email" => "test@example.com"
    ];
    $bookingDataJson = json_encode($bookingData);
    $paymentData = [
      "payment_status" => "pending",
      "payment_total" => "12709",
      "payment_advance" => "0",
      "payments" => []
    ];
    $paymentDataFromBooking = json_encode($paymentData);

    $wpdb->insert(
      $tableName,
      [
        'reservation_date' => $reservation_date,
        'reserved_on_date' => $reserved_on_date,
        'booking_details' => $bookingDataJson,
        'payment_details' => $paymentDataFromBooking
      ],
      [
        '%s',
        '%s',
        '%s',
        '%s',
      ]
    );


  }

}
