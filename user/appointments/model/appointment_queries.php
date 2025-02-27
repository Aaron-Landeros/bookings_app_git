<?php
    function fetch_appointment_data($db) {
        try {
            $query =    "SELECT appointment_data.*, company_service.service_name, company_data.company_name, user_data.user_fullname 
                        FROM appointment_data 
                        JOIN company_service ON appointment_data.service_id = company_service.service_id
                        JOIN company_data ON appointment_data.company_id = company_data.company_id
                        JOIN user_data ON appointment_data.user_id = user_data.user_id";
            $statement = $db->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
            return $results;
            
        } catch(PDOException $e) {
            error_log("Database error in fetch_services_data: " . $e->getMessage());
            throw $e;
        } catch (Exception $e) {
            error_log("Error in fetch_services_data: " . $e->getMessage());
            throw $e;
        }
    }

    function update_appointment_by_id($db, $appointment_id, $appointment_status) {
        try {
            $query = "UPDATE appointment_data
                      SET appointment_status = :appointment_status
                      WHERE appointment_id = :appointment_id";
            $statement = $db->prepare($query);
            $statement->bindValue(':appointment_id', $appointment_id, PDO::PARAM_INT);
            $statement->bindValue(':appointment_status', $appointment_status, PDO::PARAM_STR);
            $statement->execute();
            
            return $statement->rowCount();
            
        } catch(PDOException $e) {
            error_log("Database error in update_appointment_by_id: " . $e->getMessage());
            throw $e;
        } catch (Exception $e) {
            error_log("Error in update_appointment_by_id: " . $e->getMessage());
            throw $e;
        }
    }
?>