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
        $stmt->bind_param("sss", $tbbrand, $tbcolor, $wid);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function updatetennisball($tbbrand, $tbcolor, $tid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("update `tennisball` set `tb_brand` = ?, `tb_color` = ? where tennisball_id = ?");
        $stmt->bind_param("ssi", $tbbrand, $tbcolor, $tid);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function deletetennisball($tid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("delete from `tennisball` where tennisball_id=?");
        $stmt->bind_param("i", $tid);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>
