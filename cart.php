<?php
// Include the database connection file
include 'dbconn.php';

// Check if the form was submitted
if(isset($_POST['add_to_cart'])) {
    // Retrieve product details from the form
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Prepare the SQL statement to insert the data into the cart table
    $sql = "INSERT INTO cart (product_id, quantity) VALUES (:product_id, :quantity)";

    // Prepare the statement and bind parameters
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':product_id', $product_id);
    $stmt->bindParam(':quantity', $quantity);

    // Execute the statement and check for success
    if($stmt->execute()) {
        echo "Product added to cart successfully.";
    } else {
        echo "Error adding product to cart.";
    }
}
?>
