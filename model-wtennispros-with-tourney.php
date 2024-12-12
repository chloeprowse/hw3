<?php
function selectwomenstennispros() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT w_tennispro_id, w_tennispro_name, country FROM `w_tennispro` ");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>
<?php
function selecttourneybywtennispro($wid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT r.rank_id, rank_number, total_points, tourney_name, country, day_time FROM `rank` r join tourney t on t.rank_id = r.rank_id where t.w_tennispro_id=?");
        $stmt->bind_param("i", $wid);
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function inserttourneybywtennispro($tourneyName, $country, $rank, $totalpoints, $day, $rid, $wid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO `tourney` (`tourney_name`, `country`, `rank_number`, `total_points`, `day_time`, `r.rank_id`,  `w_tennispro_id`) 
                                VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssii", $tourneyName, $country, $rank, $totalpoints, $day, $rid, $wid,);
        $stmt->execute();
        $success = $stmt->affected_rows > 0;
        $stmt->close();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        if (isset($conn)) $conn->close();
        throw $e;
    }
}

function updatetourneybywtennispro($tourneyName, $country, $rank, $totalpoints, $day, $tourneyId) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE `tourney` 
                                SET `tourney_name` = ?, `country` = ?, `rank_number` = ?, `total_points` = ?, `day_time` = ?
                                WHERE tourney_id = ?");
        $stmt->bind_param("sssssi", $tourneyName, $country, $rank, $totalpoints, $day, $tourneyId);
        $stmt->execute();
        $success = $stmt->affected_rows > 0;
        $stmt->close();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        if (isset($conn)) $conn->close();
        throw $e;
    }
}

function deletetourneybywtennispro($tourneyId) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("DELETE FROM `tourney` 
                                WHERE tourney_id = ?");
        $stmt->bind_param("i", $tourneyId);
        $stmt->execute();
        $success = $stmt->affected_rows > 0;
        $stmt->close();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        if (isset($conn)) $conn->close();
        throw $e;
    }
}
?>
?>

