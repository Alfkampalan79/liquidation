php
<?php
$servername = "liquidation.sytes.net";
$username = "liquidation";
$password = "gl0Riountain";
$dbname = "listings_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>