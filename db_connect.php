<?php
function connectDatabase() {
    $servername = "localhost";
    $username = "root";
    $password = ""; // Default is empty for XAMPP
    $dbname = "media_gallery";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    return $conn;
}
?>
