<?php
include 'connect_db.php'; // Ensure this path is correct

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract and sanitize input
    $licenseNumber = $conn->real_escape_string($_POST['licenseNumber']);
    $shipmentType = $conn->real_escape_string($_POST['shipmentType']);
    $entryTime = date("Y-m-d H:i:s"); // Current date and time

    // SQL to add shipment
    $sqlShipment = "INSERT INTO Shipments (LicenseNumber, Status, Location, EntryTime) VALUES ('$licenseNumber', '$shipmentType', 'Entrance', '$entryTime')";

    // SQL to update truck status
    $sqlTruck = "UPDATE Trucks SET Status = 'Busy' WHERE LicenseNumber = '$licenseNumber'";

    // Start transaction
    $conn->begin_transaction();

    try {
        // Execute shipment insert
        $conn->query($sqlShipment);

        // Execute truck status update
        $conn->query($sqlTruck);

        // Commit transaction
        $conn->commit();
        echo "Shipment created successfully and truck status updated!";
    } catch (Exception $e) {
        // Rollback transaction on error
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }

    $conn->close();
}
// Redirect back to the form after 3 seconds
header("Refresh:2; url=create_shipment.php");

?>
