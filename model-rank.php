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
function insertrank($rnumber,$rtotalpoints) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO `rank` (`rank_number`, `total_points`) VALUES (?, ?);");
        $stmt->bind_param("ss", $rnumber, $rtotalpoints);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function updaterank($rnumber,$rtotalpoints, $rid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("update `rank` set `rank_number` = ?, `total_points` = ? where rank_id = ?");
        $stmt->bind_param("ssi", $rnumber, $rtotalpoints, $rid);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function deleterank($rid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("delete from rank where rank_id=?");
        $stmt->bind_param("i", $rid);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>
