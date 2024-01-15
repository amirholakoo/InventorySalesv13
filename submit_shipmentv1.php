<?php
include 'connect_db.php'; // Ensure this path is correct

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract and sanitize input
    $truckID = intval($_POST['truckID']);
    $shipmentType = $conn->real_escape_string($_POST['shipmentType']);

    // Begin transaction
    $conn->begin_transaction();

    try {
        // Update truck status to 'Busy'
        $updateTruckSql = "UPDATE Trucks SET Status = 'Busy' WHERE TruckID = $truckID";
        $conn->query($updateTruckSql);

        // SQL to add shipment
        $insertShipmentSql = "INSERT INTO Shipments (TruckID, Status) VALUES ($truckID, '$shipmentType')";
        $conn->query($insertShipmentSql);

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
