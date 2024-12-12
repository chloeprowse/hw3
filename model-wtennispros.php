<?php
function selectwomenstennispros() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT w.w_tennispro_name, w.country, r.rank_number, r.total_points, t.tourney_name, t.country, t.day_time FROM `w_tennispro` w join `tourney`t on w.w_tennispro_id=t.w_tennispro_id join `rank` r on t.rank_id=r.rank_id ");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
        
 function insertWomenTennisPros($name, $country, $ranknum, $totalpoints, $tourneyname, $tcountry, $daytime) {
    try {
        $conn = get_db_connection();
        $conn->begin_transaction(); // Start transaction

        // Step 1: Insert into w_tennispro table
        $stmt1 = $conn->prepare("INSERT INTO `w_tennispro` (`w_tennispro_name`, `country`) VALUES (?, ?);");
        $stmt1->bind_param("ss", $name, $country);
        $stmt1->execute();
        $wid = $conn->insert_id; // Get the generated w_tennispro_id

        // Step 2: Insert into rank table
        $stmt2 = $conn->prepare("INSERT INTO `rank` (`rank_number`, `total_points`) VALUES (?, ?);");
        $stmt2->bind_param("ii", $ranknum, $totalpoints);
        $stmt2->execute();
        $rid = $conn->insert_id; // Get the generated rank_id

        // Step 3: Insert into tourney table
        $stmt3 = $conn->prepare("INSERT INTO `tourney` (`w_tennispro_id`, `rank_id`, `tourney_name`, `country`, `day_time`) VALUES (?, ?, ?, ?, ?);");
        $stmt3->bind_param("iisss", $wid, $rid, $tourneyname, $tcountry, $daytime);
        $stmt3->execute();

        $conn->commit(); // Commit transaction
        $conn->close();
        return true;
    } catch (Exception $e) {
        $conn->rollback(); // Rollback transaction on error
        $conn->close();
        throw $e;
    }
}


function updateWomenTennisPros($name, $country, $wid, $tourneyname, $tcountry, $daytime, $ranknum, $totalpoints) {
    try {
        $conn = get_db_connection();
        $conn->begin_transaction(); // Start transaction

        // Step 1: Update w_tennispro table
        $stmt1 = $conn->prepare("UPDATE `w_tennispro` SET `w_tennispro_name` = ?, `country` = ? WHERE `w_tennispro_id` = ?");
        $stmt1->bind_param("ssi", $name, $country, $wid);
        $stmt1->execute();

        $stmt2 = $conn->prepare("UPDATE `tourney` SET `tourney_name` = ?, `country` = ?, `day_time` = ? WHERE `w_tennispro_id` = ? AND `tourney_id` = ?");
        $stmt2->bind_param("sssi", $tourneyname, $tcountry, $daytime, $wid, $tid);
        $stmt2->execute();

        $stmt3 = $conn->prepare ("UPDATE `rank` SET `rank_number` = ?, `total_points` = ? WHERE `rank_id` = (SELECT `rank_id` FROM `tourney` WHERE `w_tennispro_id` = ? LIMIT 1)");
        $stmt3->bind_param("iii", $ranknum, $totalpoints, $wid);
        $stmt3->execute();

        // Commit the transaction
        $conn->commit();
        
        // Close the connection
        $stmt1->close();
        $stmt2->close();
        $stmt3->close();
        $conn->close();

        return true; // Return success
    } catch (Exception $e) {
        // Rollback on error
        if (isset($conn) && $conn) {
            $conn->rollback();
            $conn->close();
        }
        throw $e; // Re-throw the exception for the caller
    }
}
function deleteWomenTennisPros($wid) {
    try {
        $conn = get_db_connection();
        $conn->begin_transaction(); 

        $stmt1 = $conn->prepare("DELETE FROM `tourney` WHERE `w_tennispro_id` = ?");
        $stmt1->bind_param("i", $wid);
        $stmt1->execute();

        $stmt2 = $conn->prepare(
            "DELETE FROM `rank` 
             WHERE `rank_id` IN (
                SELECT `rank_id` FROM `tourney` WHERE `w_tennispro_id` = ?
             )"
        );
        $stmt2->bind_param("i", $wid);
        $stmt2->execute();

        // Step 3: Delete the main record from w_tennispro
        $stmt3 = $conn->prepare("DELETE FROM `w_tennispro` WHERE `w_tennispro_id` = ?");
        $stmt3->bind_param("i", $wid);
        $stmt3->execute();

        $conn->commit(); 

        $stmt1->close();
        $stmt2->close();
        $stmt3->close();
        $conn->close();

        return true;
    } catch (Exception $e) {
        // Rollback on error
        if (isset($conn) && $conn) {
            $conn->rollback();
            $conn->close();
        }
        throw $e;
    }
}

?>
