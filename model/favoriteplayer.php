<?php
if (!function_exists('selectfavoriteplayer')) {
    function selectfavoriteplayer() {
        try {
            
            $conn = get_db_connection();

         
            $stmt = $conn->prepare("
                SELECT favoriteplayer_id, name, favoriteplayer 
                FROM `favoriteplayer`
            ");

       
            $stmt->execute();

            $result = $stmt->get_result();

          
            $conn->close();

            
            return $result;
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

?>
