<?php
if (!function_exists('selectfavoriteplayer')) {
    function selectfavoriteplayer() {
        try {
            // Establish database connection
            $conn = get_db_connection();

            // Prepare the SQL query
            $stmt = $conn->prepare("
                SELECT favoriteplayer_id, name, favoriteplayer 
                FROM `favoriteplayer`
            ");

            // Execute the query
            $stmt->execute();

            // Fetch the results
            $result = $stmt->get_result();

            // Close the connection
            $conn->close();

            // Return the result set
            return $result;
        } catch (Exception $e) {
            // Ensure the connection is closed in case of an error
            if (isset($conn)) {
                $conn->close();
            }
            throw $e;
        }
    }
}
?>
<?php 
if (!function_exists('selectfavoriteplayerChart')) {
    function selectfavoriteplayerChart() {
        try {
            // Establish database connection
            $conn = get_db_connection();

            // Prepare the SQL query for chart data
            $stmt = $conn->prepare("
                SELECT favoriteplayer AS name, COUNT(*) AS num_favoriteplayer
                FROM `favoriteplayer`
                GROUP BY favoriteplayer
            ");

            // Execute the query
            $stmt->execute();

            // Fetch the results
            $result = $stmt->get_result();

            // Close the connection
            $conn->close();

            // Return the result set
            return $result;
        } catch (Exception $e) {
            // Ensure the connection is closed in case of an error
            if (isset($conn)) {
                $conn->close();
            }
            throw $e;
        }
    }
}
?>
<?php
if (!function_exists('insertfavoriteplayer')) {
    function insertfavoriteplayer($name, $player) {
        try {
            $conn = get_db_connection();
            $stmt = $conn->prepare("INSERT INTO `favoriteplayer` (`name`, `favoriteplayer`) VALUES (?, ?);");
            $stmt->bind_param("ss", $name, $player);

            // Debug query execution
            if ($stmt->execute()) {
                $conn->close();
                return true;
            } else {
                echo "Error: " . $stmt->error; // Show error if query fails
                $conn->close();
                return false;
            }
        } catch (Exception $e) {
            if (isset($conn)) {
                $conn->close();
            }
            throw $e;
        }
    }
}
?>
<?php 
if (!function_exists('updatefavoriteplayer')) {
    function updatefavoriteplayer($name, $player, $fid) {
        try {
            $conn = get_db_connection();
            $stmt = $conn->prepare("UPDATE `favoriteplayer` SET `name` = ?, `favoriteplayer` = ? WHERE `favoriteplayer_id` = ?");
            $stmt->bind_param("ssi", $name, $player, $fid);

            // Debug query execution
            if ($stmt->execute()) {
                $conn->close();
                return true;
            } else {
                echo "Error: " . $stmt->error; // Show error if query fails
                $conn->close();
                return false;
            }
        } catch (Exception $e) {
            if (isset($conn)) {
                $conn->close();
            }
            throw $e;
        }
    }
}
?>
<?php
if (!function_exists('deletefavoriteplayer')) {
    function deletefavoriteplayer($fid) {
        try {
            $conn = get_db_connection();
            $stmt = $conn->prepare("DELETE FROM `favoriteplayer` WHERE `favoriteplayer_id` = ?");
            $stmt->bind_param("i", $fid);
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
?>

