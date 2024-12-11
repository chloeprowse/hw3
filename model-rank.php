<?php
function selectrank() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT rank_id, rank_number, total_points FROM `rank` ");
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
