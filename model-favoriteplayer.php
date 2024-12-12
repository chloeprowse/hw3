<?php
function selectfavoriteplayer() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT favoriteplayer_id, name, favoriteplayer FROM `favoriteplayer` ");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function insertfavoriteplayer($name, $player) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO `favoriteplayer` (`name`, `favoriteplayer`) VALUES (?, ?);");
        $stmt->bind_param("ss", $name, $player);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function updatefavoriteplayer($name, $player, $fid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("update `favoriteplayer` set `name` = ?, `player` = ? where favoriteplayer_id = ?");
        $stmt->bind_param("ssi", $name, $player, $fid);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
function deletefavoriteplayer($fid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("delete from `favoriteplayer` where favoriteplayer_id=?");
        $stmt->bind_param("i", $fid);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>
