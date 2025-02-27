<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_fullname = $_SESSION["user_fullname"];
?>
 

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../utilities/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../utilities/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <?php
        include "components/navigation_bar_view.php";
    ?>
    <div id="app-content">
    </div>

    <div class="modal-container">
    </div>


    <script src="../utilities/bootstrap/bootstrap.min.js"></script>
    <script src="../utilities/fontawesome/all.min.js"></script>
    <script src="../utilities/js/jquery.js"></script>
    <script src="../utilities/sweetalert2/sweetalert2.min.js"></script>
    
    <script src="navegacion/navegacion_event_controller.js"></script>
    <script src="appointments/js/appointments_event_controller.js"></script>
    <script src="profile/js/profile_event_controller.js"></script>
    <script src="service/js/service_event_controller.js"></script>
    <script src="account/js/account_event_controller.js"></script>
    <script src="login/js/login_event_controller.js"></script>
    <script src="navigation/navigation.js"></script>
    
</body>
</html>