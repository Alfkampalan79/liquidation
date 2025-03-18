php
<?php
    // Database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "my_database";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
    }

    // Retrieve listings
    $result = $conn->query("SELECT * FROM listings");

    if ($result->num_rows > 0) {
        $listings = $result->fetch_all(MYSQLI_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($listings);
    } else {
        header('Content-Type: application/json');
        echo json_encode([]); // Return an empty array if no listings are found
    }

    $conn->close();
?>