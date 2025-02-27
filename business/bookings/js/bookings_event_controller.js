$(document).on('click', '#bookings_btn', function(){
    var user_request = 'fetch_bookings';
    $.post('bookings/controller/bookings_controller.php', {
        user_request:user_request
    }, function(data){
        var response = JSON.parse(data);
        if(response.status == 'success'){
            $('#main_content_container').html(response.view);
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: response.message
            });
        }
    });
});