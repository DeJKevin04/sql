<?php
// Database connection settings
$host = 'sql113.ezyro.com';
$user = 'ezyro_36160966';
$pass = '30f6aa700';
$db = 'ezyro_36160966_kevindb';

// Create connection
$con = mysqli_connect($host, $user, $pass, $db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL to create table
$sql = "CREATE TABLE IF NOT EXISTS cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    price INT NOT NULL,
    quantity INT NOT NULL
);";

// Execute query
if (mysqli_query($con, $sql)) {
    echo "Table 'cart' created successfully";
} else {
    echo "Error creating table: " . mysqli_error($con);
}

// Close connection
mysqli_close($con);
?>
