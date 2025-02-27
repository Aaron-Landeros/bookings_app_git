let controller_url = "services/controller/services_controller.php";


$(document).ready(function () {
    fetch_services_index();
});

function fetch_services_index() {
    var user_request = 'fetch_service_index';

    $.post(controller_url,{
      user_request: user_request,
    }, function (data) {
      var response = JSON.parse(data);
      if (response.status == "success") {
        $("#main_content_container").html(response.view);
      } else {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: response.message,
        });
      }
    }
  );
}



$(document).on("click", ".card_services", function () {
    var user_request = "fetch_services";
    var company_id = $(this).data('company-id');

    $.post(controller_url,{
        user_request: user_request,
        company_id: company_id
      }, function (data) {
        var response = JSON.parse(data);
        if (response.status == "success") {
          $("#main_content_container").html(response.view);
        } else {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: response.message,
          });
        }
      }
    );
});

$(document).on("click", "#add_btn", function() {

  var service_id = $("#service_id").val();
  var appointment_date = $("#appointment_date").val();
  var appointment_time = $("#appointment_time").val();

  $.post(controller_url,{
    user_request: 'create_appointment',
    service_id: service_id,
    appointment_date: appointment_date,
    appointment_time: appointment_time
  }, function (data) {
    var response = JSON.parse(data);
    if (response.status == "success") {
      $("#main_content_container").html(response.view);
      Swal.fire({
        icon: "success",
        title: "Success",
        text: response.message,
      });
    } else {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: response.message,
      });
    }
  });
});