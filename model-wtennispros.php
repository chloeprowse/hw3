<?php
function selectwomenstennispros() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT w.w_tennispro_id, w.w_tennispro_name, w.country, r.rank_number, r.total_points, t.tourney_name, t.country, t.day_time, t.tourney_id FROM `w_tennispro` w join `tourney`t on w.w_tennispro_id=t.w_tennispro_id join `rank` r on t.rank_id=r.rank_id ");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
        
 function insertwomenstennispros($name, $country, $ranknum, $totalpoints, $tourneyname, $tcountry, $daytime) {
    try {
        $conn = get_db_connection();
        $conn->begin_transaction(); 

        
        $stmt1 = $conn->prepare("INSERT INTO `w_tennispro` (`w_tennispro_name`, `country`) VALUES (?, ?);");
        $stmt1->bind_param("ss", $name, $country);
        $stmt1->execute();
        $wid = $conn->insert_id; 

       
        $stmt2 = $conn->prepare("INSERT INTO `rank` (`rank_number`, `total_points`) VALUES (?, ?);");
        $stmt2->bind_param("ii", $ranknum, $totalpoints);
        $stmt2->execute();
        $rid = $conn->insert_id; 

      
        $stmt3 = $conn->prepare("INSERT INTO `tourney` (`w_tennispro_id`, `rank_id`, `tourney_name`, `country`, `day_time`) VALUES (?, ?, ?, ?, ?);");
        $stmt3->bind_param("iisss", $wid, $rid, $tourneyname, $tcountry, $daytime);
        $stmt3->execute();

        $conn->commit(); 
        $conn->close();
        return true;
    } catch (Exception $e) {
        $conn->rollback(); 
        $conn->close();
        throw $e;
    }
}
function updatewomenstennispros($name, $country, $ranknum, $totalpoints, $tourneyname, $tcountry, $daytime) {
    try {
        $conn = get_db_connection();
        $conn->begin_transaction();

        // Step 1: Retrieve `wid` dynamically using `name`
        $stmtGetWid = $conn->prepare("SELECT `w_tennispro_id` FROM `w_tennispro` WHERE `w_tennispro_name` = ? LIMIT 1");
        $stmtGetWid->bind_param("s", $name);
        $stmtGetWid->execute();
        $stmtGetWid->bind_result($wid);
        $stmtGetWid->fetch();
        $stmtGetWid->close();

        if (!$wid) {
            throw new Exception("No `w_tennispro_id` found for player name: $name");
        }

        // Step 2: Update `w_tennispro` table
        $stmt1 = $conn->prepare("UPDATE `w_tennispro` SET `country` = ?, `rank_number` = ?, `total_points` = ? WHERE `w_tennispro_id` = ?");
        $stmt1->bind_param("siii", $country, $ranknum, $totalpoints, $wid);
        $stmt1->execute();

        // Step 3: Retrieve `tourney_id`
        $stmtGetTid = $conn->prepare("SELECT `tourney_id` FROM `tourney` WHERE `w_tennispro_id` = ? LIMIT 1");
        $stmtGetTid->bind_param("i", $wid);
        $stmtGetTid->execute();
        $stmtGetTid->bind_result($tid);
        $stmtGetTid->fetch();
        $stmtGetTid->close();

        if (!$tid) {
            throw new Exception("No `tourney_id` found for `w_tennispro_id`: $wid");
        }

        // Step 4: Update `tourney` table
        $stmt2 = $conn->prepare("UPDATE `tourney` SET `tourney_name` = ?, `country` = ?, `day_time` = ? WHERE `tourney_id` = ?");
        $stmt2->bind_param("sssi", $tourneyname, $tcountry, $daytime, $tid);
        $stmt2->execute();

        // Step 5: Update `rank` table
        $stmt3 = $conn->prepare("UPDATE `rank` SET `rank_number` = ?, `total_points` = ? WHERE `rank_id` = (SELECT `rank_id` FROM `tourney` WHERE `w_tennispro_id` = ? LIMIT 1)");
        $stmt3->bind_param("iii", $ranknum, $totalpoints, $wid);
        $stmt3->execute();

        $conn->commit();

        // Close statements and connection
        $stmt1->close();
        $stmt2->close();
        $stmt3->close();
        $conn->close();

        return true;
    } catch (Exception $e) {
        if (isset($conn) && $conn) {
            $conn->rollback();
            $conn->close();
        }
        throw $e;
    }
}


function deletewomenstennispros($wid) {
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
