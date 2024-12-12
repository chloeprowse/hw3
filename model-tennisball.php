<?php
function selecttennisball() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT tennisball_id, tb_brand, tb_color, w_tennispro_id FROM `tennisball` ");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function inserttennisball($tbbrand, $tbcolor, $wid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO `tennisball` (`tb_brand`, `tb_color`,`w_tennispro_id`) VALUES (?, ?, ?);");
        $stmt->bind_param("ssi", $tbbrand, $tbcolor, $wid);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function updatetennisball($tbbrand, $tbcolor, $wid, $tid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("update `tennisball` set `tb_brand` = ?, `tb_color` = ?, `w_tennispro_id` = ? where tennisball_id = ?");
        $stmt->bind_param("ssii", $tbbrand, $tbcolor, $wid, $tid);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function deletetennisball($rid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("delete from `tennisball` where tennisball_id=?");
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
