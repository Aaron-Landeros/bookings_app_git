$(document).on('click', '#service_get_view', function(){
    var user_request = 'fetch_service';
    $.post('service/controller/service_controller.php', {
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
});

$(document).on('click', '#add_service', function(){
    var user_request = 'fetch_modal_add';
    
    $.post('service/controller/service_controller.php', {
        user_request: user_request
    }, function(data){
        var response = JSON.parse(data);
        
        if (response.status == 'success') {
            $('.modal-container').empty();
            $('.modal-container').append(response.view);
            $("#service_modal").modal("show");
            
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: response.message
            });
        }
    });
});

$(document).on('click', '#card_service', function(){
    var user_request = 'fetch_modal_edit';
    
    $.post('service/controller/service_controller.php', {
        user_request: user_request
    }, function(data){
        var response = JSON.parse(data);
        
        if (response.status == 'success') {
            $('.modal-container').empty();
            $('.modal-container').append(response.view);
            $("#edit_service_modal").modal("show");
            
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: response.message
            });
        }
    });
});


