<?php
include 'connect_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $licenseNumber = $conn->real_escape_string($_POST['licenseNumber']);
    $unloadingLocation = $conn->real_escape_string($_POST['unloadingLocation']);

    $sql = "UPDATE Shipments SET UnloadLocation = '$unloadingLocation', Location = 'LoadedUnloaded' WHERE LicenseNumber = '$licenseNumber'";

    if ($conn->query($sql) === TRUE) {
        echo "Incoming shipment updated successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

header("Location: forklift_interface.php");
?>
