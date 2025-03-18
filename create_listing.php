php
<?php
require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image_url = $_POST['image_url'];

    $sql = "INSERT INTO listings (title, description, price, image_url) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssds", $title, $description, $price, $image_url);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Listing created successfully"]);
    } else {
        echo json_encode(["message" => "Error creating listing: " . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["message" => "Invalid request method"]);
}

$conn->close();
?>