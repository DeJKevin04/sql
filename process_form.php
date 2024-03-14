<?php
// Database connection variables
$servername = "sql113.ezyro.com";
$username = "ezyro_36160966";
$password = "30f6aa700";
$dbname = "ezyro_36160966_kevindb";

// Create connection
$con = mysqli_connect('sql113.ezyro.com', 'ezyro_36160966', '30f6aa700', 'ezyro_36160966_kevindb');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO customer (name, email, purchase, comments, location) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $email, $purchase, $comments, $location);

// Set parameters and execute
$name = $_POST['name'];
$email = $_POST['email'];
$purchase = $_POST['purchase'];
$comments = $_POST['comments'];
$location = $_POST['location'];

$stmt->execute();

// Redirect to index.html after submission
header('Location: index.html');


$stmt->close();
$conn->close();
?>

