<?php
include 'connect_db.php'; // Ensure this path is correct

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract and sanitize input
    $name = $conn->real_escape_string($_POST['supplierName']);
    $address = $conn->real_escape_string($_POST['supplierAddress']);
    $phone = $conn->real_escape_string($_POST['supplierPhone']);
    $status = $conn->real_escape_string($_POST['supplierStatus']);
    $comments = $conn->real_escape_string($_POST['supplierComments']);

    // SQL to add supplier
    $sql = "INSERT INTO Suppliers (SupplierName, Address, Phone, Status, Comments) VALUES ('$name', '$address', '$phone', '$status', '$comments')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "New supplier added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

// Redirect back to the form
header("Location: add_customer_supplier.php");
?>
