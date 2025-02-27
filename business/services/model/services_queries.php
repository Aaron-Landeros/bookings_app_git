<?php
    function fetch_company_data($db) {
        try {
            $query = "SELECT * FROM company_data";
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

    function fetch_company_image($company_id){
        try {
            $directory = "../../../business_images/$company_id";
            if(!is_dir($directory)){
                throw new Exception("El Directorio no existe: $directory");
            }

            $files = scandir($directory);
            $files = array_diff($files, array('.', '..')); // Excluir los directorios especiales "." y ".."

            // Obtener el primer archivo válido
            foreach ($files as $file) {
                if (is_file("$directory/$file")) {
                    return $file; // Devuelve el nombre del archivo
                }
            }

        } catch (Exception $e) {
            error_log("Error en fetch_employee_portrait: " . $e->getMessage());
            return null; // Regresar null si ocurre un error
        }
    }


    function fetch_company_by_id($db, $company_id){
        try {
            $query = "SELECT * FROM company_data WHERE company_id = :company_id";
            $statement = $db->prepare($query);
            $statement->bindValue(':company_id', $company_id);
            $statement->execute();
            $results = $statement->fetch();
            $statement->closeCursor();
            return $results;
            
        } catch(PDOException $e) {
            error_log("Database error in fetch_service_by_id: " . $e->getMessage());
            throw $e;
        } catch (Exception $e) {
            error_log("Error in fetch_service_by_id: " . $e->getMessage());
            throw $e;
        }
    } 

    function fetch_services_by_company_id($db, $company_id){
        try {
            $query = "SELECT * FROM company_service WHERE company_id = :company_id";
            $statement = $db->prepare($query);
            $statement->bindValue(':company_id', $company_id);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
            return $results;
            
        } catch(PDOException $e) {
            error_log("Database error in fetch_services_by_company_id: " . $e->getMessage());
            throw $e;
        } catch (Exception $e) {
            error_log("Error in fetch_services_by_company_id: " . $e->getMessage());
            throw $e;
        }
    } 

    function fetch_appointment_data($db, $service_id, $appointment_date, $appointment_time) {
        try {
            $query = "INSERT INTO appointment_data (company_id, user_id, service_id, 
            appointment_date, appointment_time, appointment_status) 
            VALUES (1, 1, :service_id, :appointment_date, :appointment_time, 'ON HOLD')";
    
            $statement = $db->prepare($query);
            $statement->bindValue(':service_id', $service_id, PDO::PARAM_INT);
            $statement->bindValue(':appointment_date', $appointment_date, PDO::PARAM_STR);
            $statement->bindValue(':appointment_time', $appointment_time, PDO::PARAM_STR);
    
            $statement->execute();
    
            return $db->lastInsertId();
        } catch (PDOException $e) {
            error_log("Database error in fetch_appointment_data: " . $e->getMessage());
            throw $e;
        } catch (Exception $e) {
            error_log("Error in fetch_appointment_data: " . $e->getMessage());
            throw $e;
        }
    }
    