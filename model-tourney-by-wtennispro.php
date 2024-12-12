<?php
function selecttourneybywtennispro($wid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT r.rank_id, rank_number, total_points, tourney_name, country, day_time 
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

