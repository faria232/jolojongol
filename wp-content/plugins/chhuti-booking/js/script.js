

console.log("CALLED");
jQuery.ajax({
    dataType: "html",
    url: "/wp-content/plugins/chhuti-booking/api/get-future-bookings.php",
    type: "get"
});