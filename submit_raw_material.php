<?php
include 'connect_db.php'; // Ensure this path is correct

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract and sanitize input
    $materialType = $conn->real_escape_string($_POST['materialType']);
    $materialName = $conn->real_escape_string($_POST['materialName']);
    $supplierID = intval($_POST['supplierID']);

    // SQL to add raw material
    $sql = "INSERT INTO RawMaterials (MaterialType, MaterialName, SupplierID) VALUES ('$materialType', '$materialName', $supplierID)";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "New raw material added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

// Redirect back to the form
header("Location: add_raw_material.php");
?>
