<?php
function selecttennisball() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT tennisball_id, tb_brand, tb_color FROM `tennisball` ");
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
