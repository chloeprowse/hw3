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
?>
