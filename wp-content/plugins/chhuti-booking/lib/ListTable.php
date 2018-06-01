<?php

namespace Chhuti\Plugins\Booking;

if( ! class_exists( '\WP_List_Table' ) ) {
  require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
  require_once( ABSPATH . 'wp-admin/includes/class-wp-screen.php' );
  require_once( ABSPATH . 'wp-admin/includes/screen.php' );
  require_once( ABSPATH . 'wp-admin/includes/template.php' );
}

class ListTable extends \WP_List_Table
{

  public function __construct()
  {
    parent::__construnct([
      'singular' => 'chhuti_booking',
      'plural' => 'chhuti_bookings',
      'ajax' => false
    ]);
    $this->screen = get_current_screen();
  }

  public function get_columns()
  {
    return $columns = [
      'id' => 'ID',
      'reservation_date' => 'Reservation date',
      'primary_guest_name' => 'Primary guest name',
      'guests_count' => 'No of guests',
      'payment_status' => 'Payment status'
    ];
  }

  public function get_sortable_columns()
  {
    return $sortable = [
      'id' => ['ID',true],
      'reservation_date' => ['Reservation date',true],
      'primary_guest_name' => ['Primary guest name', true]
    ];
  }

  public function prepare_items()
  {
    global $wpdb, $_wp_column_headers;
    $screen = get_current_screen();
    $table_name = $wpdb->prefix . 'booking';

    /** preparing query */
    $query = "SELECT * FROM $table_name";

    /** is search set? */
    $search = (isset($_REQUEST['s']))? filter_input(INPUT_GET, 's', FILTER_SANITIZE_STRING) : false;
    if($search) {
      $query .= $wpdb->prepare(" WHERE primary_guest_name LIKE '%%%s%%' ", $search);
    }

    /** checking sorting order */
    $orderby = !empty($_GET["orderby"]) ? filter_input(INPUT_GET,"orderby", FILTER_SANITIZE_STRING) : 'id';
    $order = !empty($_GET["order"]) ? filter_input(INPUT_GET, "order", FILTER_SANITIZE_STRING) : 'ASC';

    if($orderby) {
      switch($orderby) {
      case 'Primary guest name':
        $orderby = 'primary_guest_name';
        break;
      case 'Reservation date':
        $orderby = 'reservation_date';
        break;
      case 'ID':
        $orderby = 'id';
        break;
      default:
        $orderby = 'id';
      }
    }

    if(!empty($orderby) && !empty($order)){
      $query.=' ORDER BY '. esc_sql($orderby) .' '. esc_sql($order);
    }

    /** pagination */
    $totalitems = $wpdb->query($query);
    $perpage = 10;
    $paged = !empty($_GET['paged']) ? intval(filter_input(INPUT_GET, 'paged', FILTER_SANITIZE_STRING)) : 1;

    /** page number */
    /*if(empty($paged) || !is_numeric($paged) || $paged <= 0) {
      $paged = 1;
    }*/

    $totalpages = ceil($totalitems/$perpage);
    if(!empty($paged) && !empty($perpage)) {
      $offset = ($paged - 1) * $perpage;
      $query .= ' LIMIT '. intval($offset) .','. intval($perpage);
    }

    $this->set_pagination_args([
      'total_items' => $totalitems,
      'total_pages' => $totalpages,
      'per_page' => $perpage
    ]);

    /** register the columns */
    $columns = $this->get_columns();
    $hidden = [];
    $sortable = $this->get_sortable_columns();
    $this->_column_headers = [$columns, $hidden, $sortable];

    /** fetch the items */
    $this->items = $wpdb->get_results($query);
  }

  public function display_rows()
  {
    $records = $this->items;
    list($columns, $hidden) = $this->get_column_info();

    /** loop for each record */
    if(!empty($records)) {
      foreach($records as $record) {
        echo '<tr id="record_'. $record->id .'">';
        foreach($columns as $column_name => $display_name) {
          $class = "class='$column_name column-$column_name'";
          $style = "";
          if(in_array($column_name, $hidden)) $style = 'style="display:none;"';
          $attributes = $class . $style;

          /** edit link */
          $editlink = 'admin.php?page=booking-info&id='. intval($record->id);

          /** display the cells */
          switch($column_name) {
          case 'id':
            echo '<td '. $attributes .'>'. stripslashes($record->id).'</td>';
            break;
          case 'reservation_date':
            echo '<td '. $attributes .'><a href="'. $editlink .'">'. stripslashes($record->reservation_date). '</a></td>';
            break;
          case 'primary_guest_name':
            echo '<td '. $attributes .'><a href="'. $editlink .'">'. stripslashes($record->primary_guest_name). '</a></td>';
            break;
          case 'guests_count':
            echo '<td '. $attributes .'>'. stripslashes($record->guests_count). '</td>';
            break;
          case 'payment_status':
            echo '<td '. $attributes .'>'. stripslashes($record->payment_status). '</td>';
            break;
          }
        }
        echo '</tr>';
      }
    }
  }

  /*public function display_tablenav($which)
  {
    echo '<form action="" method="GET">';
    $this->search_box( __('Search'), 'id');
    echo '<input type="hidden" name="page" value="'. esc_attr($_REQUEST['page']) .'">';
    echo '</form>';
  }*/
}

