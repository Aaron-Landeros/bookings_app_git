$(document).on('click', '#profile_get_view', function(){
    var user_request = 'fetch_profile';
    $.post('profile/controller/profile_controller.php', { 
        user_request: user_request
    }, function(data){

        var response = JSON.parse(data);
        if (response.status == 'success') {
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


$(document).on('click', '#edit_profile', function(){
    var user_request = 'fetch_modal_edit';
    
    $.post('profile/controller/profile_controller.php', {
        user_request: user_request
    }, function(data){
        var response = JSON.parse(data);
        
        if (response.status == 'success') {
            $('.modal-container').empty();
            $('.modal-container').append(response.view);
            $("#profile_modal").modal("show");
            
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: response.message
            });
        }
    });
});

$(document).on('click', "#update_profile", function(){
    var user_request = 'update_profile';

    var company_id = $(this).data("company-id");  
    var new_name = $("#new_name").val();
    var new_address = $("#new_address").val();
    var new_phone = $("#new_phone").val();
    var new_email = $("#new_email").val();

    $.post('profile/controller/profile_controller.php', { 
        user_request: user_request,
        company_id: company_id,  
        company_name: new_name,
        company_address: new_address,
        company_phone: new_phone,
        company_email: new_email
    }, function(data){
        var response = JSON.parse(data);

        if (response.status == 'success') {
            $("#profile_modal").modal("hide");
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: response.message
            }).then((result) => {
                $('#profile_get_view').trigger('click');
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: response.message
            });
        }
    });
})