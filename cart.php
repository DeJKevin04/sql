<?php
// Include the database connection file
include 'dbconn.php';

// Check if the form data has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve product details from the form
    $product_id = $_POST['product_id'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    // Prepare the SQL statement to insert the data into the cart table
    $sql = "INSERT INTO cart (product_id, price, quantity) VALUES (?, ?, ?)";

    // Prepare the statement
    if($stmt = mysqli_prepare($con, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "iii", $product_id, $price, $quantity);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)) {
            echo "Product added to cart successfully.";
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

// Close database connection
mysqli_close($con);
?>