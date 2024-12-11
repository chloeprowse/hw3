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
?>
