<?php
include 'connect_db.php'; // Ensure this path is correct

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract and sanitize input
    $name = $conn->real_escape_string($_POST['customerName']);
    $address = $conn->real_escape_string($_POST['customerAddress']);
    $phone = $conn->real_escape_string($_POST['customerPhone']);
    $status = $conn->real_escape_string($_POST['customerStatus']);
    $comments = $conn->real_escape_string($_POST['customerComments']);

    // SQL to add customer
    $sql = "INSERT INTO Customers (CustomerName, Address, Phone, Status, Comments) VALUES ('$name', '$address', '$phone', '$status', '$comments')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "New customer added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

// Redirect back to the form
header("Location: add_customer_supplier.php");
?>
