<?php

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

?>

