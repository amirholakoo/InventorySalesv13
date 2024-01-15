<?php
include 'connect_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $licenseNumber = $conn->real_escape_string($_POST['licenseNumber']);
    $selectedRolls = $_POST['rolls']; // Array of selected roll numbers
    $listOfReels = implode(", ", $selectedRolls);

    // Update products status and location
    foreach ($selectedRolls as $roll) {
        $sqlUpdateProduct = "UPDATE Products SET Status = 'Sold', Location = '$licenseNumber' WHERE ReelNumber = '$roll'";
        $conn->query($sqlUpdateProduct);
    }

    // Update shipment
    $sqlUpdateShipment = "UPDATE Shipments SET ListOfReels = '$listOfReels', Location = 'LoadedUnloaded' WHERE LicenseNumber = '$licenseNumber'";

    if ($conn->query($sqlUpdateShipment) === TRUE) {
        echo "Outgoing shipment updated successfully!";
    } else {
        echo "Error: " . $sqlUpdateShipment . "<br>" . $conn->error;
    }

    $conn->close();
}

// Redirect back to the forklift interface
header("Location: forklift_interface.php");
?>
