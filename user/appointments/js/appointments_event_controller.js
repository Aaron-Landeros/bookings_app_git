
function fetch_appointments() {
    var user_request = 'fetch_appointments';
    $.post('appointments/controller/appointment_controller.php', {
        user_request:user_request
    }, function(data){
        var response = JSON.parse(data);
        if(response.status == 'success'){
            $('#app-content').html(response.view);
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: response.message
            });
        }
    });
}

$(document).ready(function () {
    fetch_appointments()
});

$(document).on('click', '#appointment_get_view', function(){
    fetch_appointments()
});

$(document).on('click', '.card_appointment', function(){
    var user_request = 'fetch_modal_edit';
    var appointment_id = $(this).data("appointment-id"); 
    
    $.post('appointments/controller/appointment_controller.php', {
        user_request: user_request,
        appointment_id: appointment_id
    }, function(data){
        var response = JSON.parse(data);
        
        if (response.status == 'success') {
            $('.modal-container').empty();
            $('.modal-container').append(response.view);
            $("#edit_appointment_modal").modal("show");
            
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: response.message
            });
        }
    });
});

$(document).on('click', '#update_appointment', function(){
    var user_request = 'update_appointment';

    var appointment_id = $(this).data("appointment-id");  
    var new_status = $("#new_status").val();

    $.post('appointments/controller/appointment_controller.php', { 
        user_request: user_request,
        appointment_id: appointment_id,  
        appointment_status: new_status
    }, function(data){
        var response = JSON.parse(data);

        if (response.status == 'success') {
            $("#edit_appointment_modal").modal("hide");
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: response.message
            }).then((result) => {
                $('#appointment_get_view').trigger('click');
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: response.message
            });
        }
    });
});


$(document).on('click', '#add_appointment', function(){
    var user_request = 'fetch_modal_create';
    
    $.post('appointments/controller/appointment_controller.php', {
        user_request: user_request
    }, function(data){
        var response = JSON.parse(data);
        
        if (response.status == 'success') {
            $('.modal-container').empty();
            $('.modal-container').append(response.view);
            $("#create_appointment_modal").modal("show");
            
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: response.message
            });
        }
    });
});

