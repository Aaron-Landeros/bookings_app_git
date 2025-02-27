<?php
function fetch_profile_data_by_user_id($db, $user_id) {
    try {
        $query = "SELECT business_user_data.*, company_data.*
                  FROM business_user_data 
                  JOIN company_data ON business_user_data.company_id = company_data.company_id
                  WHERE business_user_data.user_id = :user_id";

        $statement = $db->prepare($query);
        $statement->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        error_log("Database error in fetch_profile_data_by_user_id: " . $e->getMessage());
        throw $e;
    } catch (Exception $e) {
        error_log("Error in fetch_profile_data_by_user_id: " . $e->getMessage());
        throw $e;
    }
}

function update_profile_by_id($db, $company_id, $company_name, $company_address, $company_phone, $company_email) {
    try {
        $query = "UPDATE company_data 
                  SET company_name = :company_name,
                      company_address = :company_address,
                      company_phone = :company_phone,
                      company_email = :company_email
                  WHERE company_id = :company_id";

        $statement = $db->prepare($query);
        $statement->bindValue(':company_name', $company_name, PDO::PARAM_STR);
        $statement->bindValue(':company_address', $company_address, PDO::PARAM_STR);
        $statement->bindValue(':company_phone', $company_phone, PDO::PARAM_STR);
        $statement->bindValue(':company_email', $company_email, PDO::PARAM_STR);
        $statement->bindValue(':company_id', $company_id, PDO::PARAM_INT);

        $statement->execute();

        return $statement->rowCount();
    } catch (PDOException $e) {
        error_log("Database error in update_profile_by_id: " . $e->getMessage());
        throw $e;
    } catch (Exception $e) {
        error_log("Error in update_profile_by_id: " . $e->getMessage());
        throw $e;
    }
}
?>