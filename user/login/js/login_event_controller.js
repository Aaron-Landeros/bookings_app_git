let url = 'login/controller/login_controller.php';

$(document).on('click', '#btn_login', function (e) {
    e.preventDefault();

    var user_request = 'verify_login';
    //Input Form
    var user_email = $('#input_email') .val();
    var user_password = $('#input_pwrd').val();

    $.post(url, {
    user_request: user_request,
    user_email: user_email,
    user_password: user_password
    }, function (data) {
    var response = JSON.parse(data);
    if(response.status = 'success'){
        $('#message_container').html(response.message);
    } else {
        
    }

    });
})