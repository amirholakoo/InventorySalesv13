<?php
include 'connect_db.php';

function updateProductsAndShipments($licenseNumber, $selectedRolls) {
    global $conn;  // Use the global connection variable

    $rollList = implode(",", $selectedRolls);
    $rollListForDB = "'" . implode("','", $selectedRolls) . "'";

    // Update Products table: Set Status to 'Sold' and Location to License Number
    $sqlUpdateProducts = "UPDATE Products SET Status = 'Sold', Location = '$licenseNumber' WHERE ReelNumber IN ($rollListForDB)";
    if (!$conn->query($sqlUpdateProducts)) {
        throw new Exception("Error updating Products: " . $conn->error);
    }

    // Update Shipments table: Add ListOfReels and update Location
    $sqlUpdateShipments = "UPDATE Shipments SET ListOfReels = '$rollList', Location = 'LoadedUnloaded' WHERE LicenseNumber = '$licenseNumber'";
    if (!$conn->query($sqlUpdateShipments)) {
        throw new Exception("Error updating Shipments: " . $conn->error);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $licenseNumber = $conn->real_escape_string($_POST['licenseNumber']);
    $width = intval($_POST['width']);

    // Fetch rolls with the specified width
    $sqlFetchRolls = "SELECT ReelNumber FROM Products WHERE Width = $width AND Status = 'In-Stock'";
    $result = $conn->query($sqlFetchRolls);
    $rolls = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($rolls, $row['ReelNumber']);
        }
    } else {
        echo "No rolls available with the selected width.";
        $conn->close();
        exit;
    }

    // Simulate selection of 10-14 rolls (for demonstration purposes)
    $selectedRolls = array_slice($rolls, 0, rand(10, 14));

    // Begin transaction
    $conn->begin_transaction();
    try {
        updateProductsAndShipments($licenseNumber, $selectedRolls);
        $conn->commit();
        echo "Outgoing shipment updated successfully!";
    } catch (Exception $e) {
        $conn->rollback();
        echo $e->getMessage();
    }

    $conn->close();
}

header("Location: forklift_interface.php");
?>
