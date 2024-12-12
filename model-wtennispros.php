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
        
    function insertwomenstennispros($name, $country) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO `w_tennispro` (`w_tennispro_name`, `country`) VALUES (?, ?);");
        $stmt->bind_param("ss", $name, $country);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function updatewomenstennispros($name, $country, $wid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("update `w_tennispro` set `w_tennispro_name` = ?, `country` = ? where w_tennispro_id = ?");
        $stmt->bind_param("ssi", $name, $country, $wid);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function deletetennisball($wid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("delete from `w_tennispro` where w_tennispro_id=?");
        $stmt->bind_param("i", $wid);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>
