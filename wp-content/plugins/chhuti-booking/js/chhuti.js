function showCalendar()
{


  jQuery.ajax({
    dataType:"html",
    url: "/jolojongol/wp-content/plugins/chhuti-booking/api/get-future-bookings.php",
    type: "get",
    success: function(response) {
      console.log(response);
        console.log(response.length);
      jQuery('#chhuti-calendar').empty().append(response);

        return getBookingForm();
    },
   
  });
}

function getBookingForm()
{


  jQuery.ajax({
    dataType: "html",
    url: "/jolojongol/wp-content/plugins/chhuti-booking/views/forms/booking-details-form.html",
    type: "get",
    success: function(response) {
      return response;
    },
    error: function(response, status, error) {
      console.log('failed '+response);
    }
  });

}

jQuery(document).ready(function(){
  showCalendar();
});



//js for modal
jQuery.noConflict();
(function ($) {
    function readyFn() {
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').focus()
        });
    }
    $(window).on('load',function(){
        $('#myModal').modal('hide');
    });

    $(document).ready(readyFn);
})(jQuery);








// function get_information(e){
//     console.log(onclickModal());
//     // console.log(e.getAttribute('data-date'));
//
// }