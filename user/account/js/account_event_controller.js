$(document).on('click', '#get-account-view', function(){
    var user_request = 'fetch_account';
    $.post('account/controller/account_controller.php', {
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

$(document).on('click', "#btn_logout", function(){
    var user_request = 'logout_user';


    $.post('login/controller/login_controller.php', {
        user_request:user_request
    }, function(data){
        var response = JSON.parse(data);
        if(response.status == 'success'){
            window.location.href = 'login.php'
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: response.message
            });
        }
    });
})