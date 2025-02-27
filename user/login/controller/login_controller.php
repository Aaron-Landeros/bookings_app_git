<?php
session_start(); //SIEMPRE PONER, IMPORTANTE POR AUTH
require "../model/login_queries.php";
 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_request = filter_input(INPUT_POST, 'user_request');
}else{
    $user_request = filter_input(INPUT_GET, 'user_request');
}
 
set_error_handler(function($errno, $errstr, $errfile, $errline) {
    if ($errno === E_WARNING) {
        // Convert warning to an exception
        throw new ErrorException("Warning: $errstr in $errfile on line $errline", 0, $errno, $errfile, $errline);
    }
    // For other error types, use the default handler
    return false;
});

switch($user_request){
    case 'verify_login':
        try {
            include '../../../utilities/db_conn.php';
            $db = new PDO($dsn, $username, $password);

            //Inputs
            $user_email = filter_input(INPUT_POST, 'user_email');
            $user_password = filter_input(INPUT_POST, 'user_password');

            if(!verify_login($db, $user_email, $user_password)){
                echo json_encode(['status' => 'success', 'message' => 'email or password incorrect']);
            }else{
                //NEXT
            $user_data = fetch_user_data($db, $user_email);

            $_SESSION['user_id'] = $user_data['user_id'];
            $_SESSION['user_fullname'] = $user_data['user_fullname'];
            $_SESSION['user_email'] = $user_data['user_email'];

            $content = '';
            ob_start();
            include '../components/redirect_script_index.php';
            $content = ob_get_clean();

            echo json_encode(['status' => 'success', 'message' => $content]);
            }
            
        } catch (PDOException $e) {
            error_log('Database Error: ' . $e->getMessage());
            $message = $development_mode ? 'Database error occurred: ' . $e->getMessage() : $user_message;
            echo json_encode(['status' => 'error', 'message' => $message]);
        } catch (ErrorException $e) {
            error_log('Warning converted to Exception: ' . $e->getMessage());
            $message = $development_mode ? $e->getMessage() : $user_message;
            echo json_encode(['status' => 'error', 'message' => $message]);
        } catch (Exception $e) {
            error_log('Error: ' . $e->getMessage());
            $message = $development_mode ?  $e->getMessage() : $user_message;
            echo json_encode(['status' => 'error', 'message' => $message]);
        }
    break;
    case 'logout_user':
        try{

            session_unset(); //CLEAN VARIABLE $_SESSION
            session_destroy(); 
            
            echo json_encode(['status' => 'success']);
        }catch (ErrorException $e) {
            error_log('Warning converted to Exception: ' . $e->getMessage());
            $message = $development_mode ? $e->getMessage() : $user_message;
            echo json_encode(['status' => 'error', 'message' => $message]);
        } catch (Exception $e) {
            error_log('Error: ' . $e->getMessage());
            $message = $development_mode ?  $e->getMessage() : $user_message;
            echo json_encode(['status' => 'error', 'message' => $message]);
        }
    break;
}
?>