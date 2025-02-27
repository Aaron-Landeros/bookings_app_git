<?php
require "../model/profile_queries.php";

// $company_id=1;
$user_id=1;
 
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
    case "fetch_profile":
        try {
            include '../../../utilities/db_conn.php';
            $db = new PDO($dsn, $username, $password);
    
            $user_data = fetch_profile_data_by_user_id($db, $user_id);
    
            if ($user_data) {
                ob_start();
                include '../profile.php';
                $content = ob_get_clean();
    
                echo json_encode(['status' => 'success', 'view' => $content]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Usuario no encontrado']);
            }
    
        } catch (PDOException $e) {
            error_log('Database Error: ' . $e->getMessage());
            echo json_encode(['status' => 'error', 'message' => 'Database error occurred.']);
        } catch (Exception $e) {
            error_log('Error: ' . $e->getMessage());
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    break;
    

    case 'fetch_modal_edit':
        try{
            include '../../../utilities/db_conn.php';
            $db = new PDO($dsn, $username, $password);
 
            $company_id = filter_input(INPUT_POST, 'company_id', FILTER_SANITIZE_NUMBER_INT);
            $user_data = fetch_profile_data_by_user_id($db, $user_id);

            $content = '';
            ob_start();
            include '../components/modal/profile_edit_modal.php';
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

    case 'update_profile':
        try{
            include '../../../utilities/db_conn.php';
            $db = new PDO($dsn, $username, $password);

            $db->beginTransaction();
            
            $company_id = filter_input(INPUT_POST, 'company_id', FILTER_SANITIZE_NUMBER_INT);
            $company_name = filter_input(INPUT_POST, 'company_name');
            $company_address = filter_input(INPUT_POST, 'company_address');
            $company_phone = filter_input(INPUT_POST, 'company_phone');
            $company_email = filter_input(INPUT_POST, 'company_email');

            if ($company_id && $company_name && $company_address && $company_phone && $company_email) {
                update_profile_by_id(
                $db, 
                $company_id, 
                $company_name, 
                $company_address,
                $company_phone,
                $company_email
            );    
            }
            $db->commit();

            echo json_encode(['status' => 'success', 'message' => "profile editado"]);
        }catch (PDOException $e) {
            $db->rollback();
            error_log('Database Error: ' . $e->getMessage());
            $message = $development_mode ? 'Database error occurred: ' . $e->getMessage() : $user_message;
            echo json_encode(['status' => 'error', 'message' => $message]);
        } catch (ErrorException $e) {
            $db->rollback();
            error_log('Warning converted to Exception: ' . $e->getMessage());
            $message = $development_mode ? $e->getMessage() : $user_message;
            echo json_encode(['status' => 'error', 'message' => $message]);
        } catch (Exception $e) {
            $db->rollback();
            error_log('Error: ' . $e->getMessage());
            $message = $development_mode ?  $e->getMessage() : $user_message;
            echo json_encode(['status' => 'error', 'message' => $message]);
        }
    break;  
}

?>