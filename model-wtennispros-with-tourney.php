<?php
// Select all women tennis pros
function selectwomenstennispros() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT w_tennispro_id, w_tennispro_name, country FROM `w_tennispro`");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        if (isset($conn)) $conn->close();
        throw $e;
    }
}

// Select tournaments by tennis pro ID
function selecttourneybywtennispro($wid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT r.rank_id, r.rank_number, r.total_points, t.tourney_name, t.country, t.day_time 
                                FROM `rank` r 
                                JOIN tourney t ON t.rank_id = r.rank_id 
                                WHERE t.w_tennispro_id = ?");
        $stmt->bind_param("i", $wid);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        if (isset($conn)) $conn->close();
        throw $e;
    }
}

// Insert a new tournament
function inserttourneybywtennispro($tourneyName, $country, $wid, $rankNumber, $totalPoints, $dayTime) {
    try {
        $conn = get_db_connection();
        // Insert rank first
        $stmt = $conn->prepare("INSERT INTO `rank` (`rank_number`, `total_points`) VALUES (?, ?)");
        $stmt->bind_param("ii", $rankNumber, $totalPoints);
        $stmt->execute();
        $rankId = $conn->insert_id; // Get the ID of the inserted rank

        // Insert tournament using the new rank ID
        $stmt = $conn->prepare("INSERT INTO `tourney` (`tourney_name`, `country`, `day_time`, `rank_id`, `w_tennispro_id`) 
                                VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssii", $tourneyName, $country, $dayTime, $rankId, $wid);
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

// Update an existing tournament
function updatetourneybywtennispro($tourneyName, $country, $rankId) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE `tourney` 
                                SET `tourney_name` = ?, `country` = ? 
                                WHERE `rank_id` = ?");
        $stmt->bind_param("ssi", $tourneyName, $country, $rankId);
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

// Delete a tournament
function deletetourneybywtennispro($rankId) {
    try {
        $conn = get_db_connection();
        // Delete the tournament
        $stmt = $conn->prepare("DELETE FROM `tourney` WHERE `rank_id` = ?");
        $stmt->bind_param("i", $rankId);
        $stmt->execute();

        // Delete the associated rank
        $stmt = $conn->prepare("DELETE FROM `rank` WHERE `rank_id` = ?");
        $stmt->bind_param("i", $rankId);
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

