<?php
function selectfavoriteplayer() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT name, count(favoriteplayer) as num_favoriteplayer FROM `favoriteplayer` ");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
