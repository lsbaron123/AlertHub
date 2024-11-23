<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alerthub";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO feedback (fullName, address, comment) 
                        VALUES (?, ?, ?)");
if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}

// Check if POST variables are set
if (isset($_POST['fullName'], $_POST['address'], $_POST['comment'])) {
    $fullName = $_POST['fullName'];
    $address = $_POST['address'];
    $comment = $_POST['comment'];

    // Bind parameters
    $stmt->bind_param("sss", $fullName, $address, $comment);

    // Execute statement
    if ($stmt->execute()) {
        $response = ["status" => "success", "message" => "Successfully submitted."];
    } else {
        $response = ["status" => "error", "message" => "Error: " . $stmt->error];
    }
    echo json_encode($response); // Return JSON response
} else {
    echo "Error: All fields are required."; 
}

// Close connections
$stmt->close();
$conn->close();
?>
