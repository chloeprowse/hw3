<?php
function get_db_connection(){
    // Create connection
    $conn = new mysqli('138.197.17.168', 'chloepro_hw3user', 'NcZdR^o5pb=Q', 'chloepro_hw3');
    
    // Check connection
    if ($conn->connect_error) {
      return false;
    }
    return $conn;
}
?>
