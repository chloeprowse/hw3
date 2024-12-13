<?php
if (!function_exists('selectfavoriteplayer')) {
    function selectfavoriteplayer() {
        try {
            $conn = get_db_connection();

            $stmt = $conn->prepare("
                SELECT name, COUNT(favoriteplayer) AS num_favoriteplayer 
                FROM `favoriteplayer`
                GROUP BY name
            ");

            $stmt->execute();

            // Fetch the results
            $result = $stmt->get_result();

            return $result;
        } catch (Exception $e) {
            // Log the error
            error_log("Database query error: " . $e->getMessage());

            if (isset($conn)) {
                $conn->close();
            }
            throw $e;
        } finally {
            if (isset($conn)) {
                $conn->close();
            }
        }
    }
}

if (!function_exists('insertfavoriteplayer')) {
    function insertfavoriteplayer($name, $player) {
        try {
            $conn = get_db_connection();
            $stmt = $conn->prepare("INSERT INTO `favoriteplayer` (`name`, `favoriteplayer`) VALUES (?, ?);");
            $stmt->bind_param("ss", $name, $player);
            $success = $stmt->execute();
            $conn->close();
            return $success;
        } catch (Exception $e) {
            if (isset($conn)) {
                $conn->close();
            }
            throw $e;
        }
    }
}

if (!function_exists('updatefavoriteplayer')) {
    function updatefavoriteplayer($name, $player, $fid) {
        try {
            $conn = get_db_connection();
            $stmt = $conn->prepare("UPDATE `favoriteplayer` SET `name` = ?, `favoriteplayer` = ? WHERE `favoriteplayer_id` = ?");
            $stmt->bind_param("ssi", $name, $player, $fid);
            $success

