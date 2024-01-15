<?php
include 'connect_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $licenseNumber = $conn->real_escape_string($_POST['licenseNumber']);
    $weight1 = intval($_POST['weight1']);
    $weight1Time = date("Y-m-d H:i:s");

    $sql = "UPDATE Shipments SET Weight1 = $weight1, Weight1Time = '$weight1Time', Location = 'LoadingUnloading' WHERE LicenseNumber = '$licenseNumber'";

    if ($conn->query($sql) === TRUE) {
        echo "Weight 1 recorded successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

// Redirect back to the weight station page
header("Location: weight_station.php");
?>
