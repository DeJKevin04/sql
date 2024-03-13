<?php
// PostgreSQL database connection code
$host = 'ep-royal-sky-a1u76h94.ap-southeast-1.aws.neon.tech';
$db   = 'kevindb';
$user = 'kevindb_owner';
$pass = 'your_password'; // Replace with your actual password
$charset = 'utf8mb4';

// Set up the DSN and options for the PDO connection
$dsn = "pgsql:host=$host;dbname=$db;sslmode=require";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// Attempt to establish a connection to the PostgreSQL database
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Get the POST records
$txtName = $_POST['txtName'];
$txtEmail = $_POST['txtEmail'];
$txtAddress = $_POST['txtAddress'];
$txtMessage = $_POST['txtMessage'];

// Database insert SQL code using PostgreSQL
$sql = "INSERT INTO tbl_contact (fldName, fldEmail, fldAddress, fldMessage) VALUES (:name, :email, :address, :message)";

// Prepare the statement and bind parameters
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':name', $txtName);
$stmt->bindParam(':email', $txtEmail);
$stmt->bindParam(':address', $txtAddress);
$stmt->bindParam(':message', $txtMessage);

// Execute the statement and check for success
if($stmt->execute()) {
    echo "Record inserted successfully.";
} else {
    echo "Error inserting record.";
}
?>