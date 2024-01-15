<?php
include 'connect_db.php'; // Ensure this path is correct

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract and sanitize input
    $truckID = intval($_POST['truckID']);
    $shipmentType = $conn->real_escape_string($_POST['shipmentType']);

    // Get current date and time for EntryTime
    $entryTime = date("Y-m-d H:i:s");

    // SQL to add shipment
    $sqlShipment = "INSERT INTO Shipments (TruckID, Status, Location, EntryTime) VALUES ($truckID, '$shipmentType', 'Entrance', '$entryTime')";
    $sqlUpdateTruck = "UPDATE Trucks SET Status='Busy' WHERE TruckID=$truckID";

    // Start transaction
    $conn->begin_transaction();

    try {
        // Execute shipment query
        if (!$conn->query($sqlShipment)) {
            throw new Exception($conn->error);
        }

        // Execute truck update query
        if (!$conn->query($sqlUpdateTruck)) {
            throw new Exception($conn->error);
        }

        // Commit transaction
        $conn->commit();
        echo "Shipment created successfully!";
    } catch (Exception $e) {
        // Rollback transaction on error
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }

    $conn->close();
}
?>
