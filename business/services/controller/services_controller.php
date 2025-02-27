<?php
require "../model/services_queries.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user_request = filter_input(INPUT_POST, 'user_request');
} else {
    $user_request = filter_input(INPUT_GET, 'user_request');
}

set_error_handler(function($errno, $errstr, $errfile, $errline) {
    if ($errno === E_WARNING) {
        throw new ErrorException("Warning: $errstr in $errfile on line $errline", 0, $errno, $errfile, $errline);
    }
    return false;
});

switch($user_request) {
    case 'fetch_service_index':
        try{
            include '../../../utilities/db_conn.php'; 
            $db = new PDO($dsn, $username, $password);

            $companies_data = fetch_company_data($db);

            ob_start();
            include '../services.php';
            $content = ob_get_clean();

            echo json_encode(['status' => 'success', 'message' => 'Success', 'view' => $content]);
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
            $message = $development_mode ? $e->getMessage() : $user_message;
            echo json_encode(['status' => 'error', 'message' => $message]);
        }
    break;
    case 'fetch_services':
        try{
            include '../../../utilities/db_conn.php'; 
            $db = new PDO($dsn, $username, $password);

            $company_id = filter_input(INPUT_POST, 'company_id');

            $service_data = fetch_company_by_id($db, $company_id);

            $company_service = fetch_services_by_company_id($db, $company_id);

            $company_img = fetch_company_image($company_id);

            ob_start();
            include '../components/view/view_services_details.php';
            $content = ob_get_clean();

            echo json_encode([
                'status' => 'success', 
                'message' => 'Success', 
                'view' => $content
            ]);
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
            $message = $development_mode ? $e->getMessage() : $user_message;
            echo json_encode(['status' => 'error', 'message' => $message]);
        }
    break;

    case 'create_appointment':
        try {
            include '../../../utilities/db_conn.php'; 
            $db = new PDO($dsn, $username, $password);
    
            $service_id = filter_input(INPUT_POST, 'service_id', FILTER_SANITIZE_NUMBER_INT);
            $appointment_date = filter_input(INPUT_POST, 'appointment_date', FILTER_SANITIZE_SPECIAL_CHARS);
            $appointment_time = filter_input(INPUT_POST, 'appointment_time', FILTER_SANITIZE_SPECIAL_CHARS);
    
            if ($service_id && $appointment_date && $appointment_time) {
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                $appointment_id = fetch_appointment_data($db, $service_id, $appointment_date, $appointment_time);
    
                echo json_encode(['status' => 'success', 'message' => 'Appointment created successfully', 'appointment_id' => $appointment_id]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Invalid data provided']);
            }
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
        }
    break;
    
}
?>
