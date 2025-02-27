<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="scss/custom.css">
    <link href="../utilities/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../utilities/sweetalert2/sweetalert2.min.css">
    <title>Login</title>
</head>
<body>
<div class="main-container">
        <div class="login-container bg-dark w-100 d-flex flex-column">
            <div class="login-header ps-3 pt-4 sticky-top">
                <img class="img-fluid" src="assets/logo.webp" alt="">
            </div>
            <div class="container container-form pt-5 mt-5 d-flex justify-content-center align-items-center flex-column">
                <div class="entheo-ims-logo">
                    <img class="img-fluid" src="assets/entheo_wms_logo.svg" width="300" alt="">
                </div>
                <div class="login-form w-75">
                    <form>
                        <div class="mb-3 w-100">
                            <label for="email" class="form-label text-login fw-semibold">Email</label>
                            <input type="email" name="email" class="form-control w-100 bg-dark-input border-dark-input" id="input_email" placeholder="Enter your email">
                        </div>
                        <div class="mb-3 w-100">
                            <label for="email" class="form-label text-login fw-semibold">Password</label>
                            <input type="password" name="password" class="form-control w-100 bg-dark-input border-dark-input" id="input_pwrd" placeholder="Enter password">
                        </div>
                        <!-- check remember me -->
                        <!-- <div class="mb-2 w-100 d-flex">
                            <input class="me-2 mb-1" type="checkbox" value="" id="checkbox_remember_me" autocomplete="off">
                            <label class="form-label text-login mt-1" for="remember_me">Remember me</label>
                        </div> -->
                        <button type="submit" id="btn_login" class="btn btn-danger w-100 mt-3">Log in</button>
                        <div id="message_container" class="text-light text-center mt-3"></div>
                        <div id="message_container_mail_dont_exists" class="text-light text-center mt-3 d-none"><p>The email entered does not exist, please try again.</p></div>
                    </form> 
                </div>
                <div class="footer-container-form mt-4 pt-3">
                    <!-- <p class="text-login">Don't have an account? <a href="#" class="text-danger text-decoration-none fw-semibold">Get Started</a></p>
                        <a id="forgot_password_link" class="text-decoration-none" href="#"> 
                            <p class="text-danger text-center fw-semibold">Forgot your password?</p>
                        </a> -->
                </div>
                <div class="footer mt-3 pt-3">
                    <div class="container d-flex justify-content-center align-items-center mt-5">
                        <a target="_blank" href="https://entheospace.co/" class="text-decoration-none">
                            <p class="text-white-50 fw-semibold">Powered By ENTHEOSPACE</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../utilities/bootstrap/bootstrap.min.js"></script>
    <script src="../utilities/sweetalert2/sweetalert2.min.js"></script>
    <script src="../utilities/fontawesome/all.min.js"></script>
    <script src="../utilities/js/jquery.js"></script>
    
    <script src="login/js/login_event_controller.js"></script>

</body>
</html>


