<?php
include 'connect_db.php'; // Make sure this path is correct

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract and sanitize input
    $digit1 = $conn->real_escape_string($_POST['digit1']);
    $farsiLetter = $conn->real_escape_string($_POST['farsiLetter']);
    $digit2 = $conn->real_escape_string($_POST['digit2']);
    $driverName = $conn->real_escape_string($_POST['driverName']);
    $phone = $conn->real_escape_string($_POST['phone']);

    // Construct license number
    $licenseNumber = $digit1 . $farsiLetter . $digit2;

    // SQL to add truck
    $sql = "INSERT INTO Trucks (LicenseNumber, DriverName, Phone, Status, Location) VALUES ('$licenseNumber', '$driverName', '$phone', 'Free', 'Entrance')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "New truck added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}

// Redirect back to the form after 3 seconds
header("Refresh:2; url=new_truck.php");
?>
