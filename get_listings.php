php
<?php
// get_listings.php

// Include the database connection file
require_once 'db_connect.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select all records from the listings table
$sql = "SELECT * FROM listings";
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Array to hold the listings
    $listings = array();

    // Fetch each row and add it to the listings array
    while($row = $result->fetch_assoc()) {
        $listings[] = $row;
    }

    // Set the header to JSON and output the listings
    header('Content-Type: application/json');
    echo json_encode($listings);
} else {
    // If no listings are found, return an error message
    header('Content-Type: application/json');
    echo json_encode(array("error" => "No listings found."));
}

// Close the database connection
$conn->close();
?>