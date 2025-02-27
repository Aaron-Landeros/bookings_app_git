<?php
require "../model/service_queries.php";
 
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
    case "fetch_service":
        try{
            include '../../../utilities/db_conn.php';
            $db = new PDO($dsn, $username, $password);
 
            $content = '';
            ob_start();
            include '../service.php';
            $content = ob_get_clean();
 
            // Return the view
            echo json_encode(['status' => 'success', 'view' => $content]);
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

    case 'fetch_modal_add':
        try{
            include '../../../utilities/db_conn.php';
            $db = new PDO($dsn, $username, $password);
 
            $content = '';
            ob_start();
            include '../components/modal/add_service_modal.php';
            $content = ob_get_clean();
 
            // Return the view
            echo json_encode(['status' => 'success', 'view' => $content]);
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

    case 'fetch_modal_edit':
        try{
            include '../../../utilities/db_conn.php';
            $db = new PDO($dsn, $username, $password);
 
            $content = '';
            ob_start();
            include '../components/modal/edit_service.php';
            $content = ob_get_clean();
 
            // Return the view
            echo json_encode(['status' => 'success', 'view' => $content]);
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
}
?>