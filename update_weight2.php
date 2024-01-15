<?php
include 'connect_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $licenseNumber = $conn->real_escape_string($_POST['licenseNumber']);
    $weight2 = intval($_POST['weight2']);
    $weight2Time = date("Y-m-d H:i:s");

    $sql = "UPDATE Shipments SET Weight2 = $weight2, Weight2Time = '$weight2Time', Location = 'Office' WHERE LicenseNumber = '$licenseNumber'";

    if ($conn->query($sql) === TRUE) {
        echo "Weight 2 recorded successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

// Redirect back to the weight station page
header("Location: weight_station.php");
?>
