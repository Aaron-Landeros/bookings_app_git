<?php
function verify_login($db, $user_email, $user_password){
    try{
        //1
        $query = "SELECT user_password FROM user_data WHERE user_email= :user_email";
        $statement = $db->prepare($query);
        $statement ->bindValue(':user_email', $user_email);
        $statement->execute();
        $row = $statement->fetch(PDO :: FETCH_ASSOC);
        $statement->closeCursor();

        //condition verify if exist row and password
        if($row && isset($row['user_password'])){
            //
            $hash = $row['user_password'];
            //use PHP password verification function
            return password_verify($user_password, $hash);
        }else{
            return false;
        }
    }catch(PDOException $e) {
        error_log("Database error in fetch_services_data: " . $e->getMessage());
        throw $e;
    } catch (Exception $e) {
        error_log("Error in fetch_services_data: " . $e->getMessage());
        throw $e;
    }
}

function fetch_user_data($db, $user_email){
    try{
        $query = "SELECT * FROM user_data WHERE user_email = :user_email";
        $statement = $db->prepare($query);
        $statement ->bindValue(':user_email', $user_email);
        $statement->execute();
        $user_data = $statement->fetch(PDO :: FETCH_ASSOC);
        $statement->closeCursor();
        return $user_data;

    } catch (PDOException $e){
        error_log('Database Error: ' . $e->getMessage()); // Log error
        return throw $e; // Handle error in controller
    } catch (Exception $e) {
        error_log('Error: ' . $e->getMessage()); // Log error
        return throw $e; // Handle error in controller
    }
}