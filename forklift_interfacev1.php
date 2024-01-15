<!DOCTYPE html>
<html>
<head>
    <title>Forklift Interface</title>
</head>
<body>
    <h2>Forklift Interface</h2>

    <!-- Incoming Section -->
    <h3>Incoming Shipments</h3>
    <form action="process_incoming.php" method="post">
        <label for="incomingTruck">Select Truck:</label><br>
        <select name="licenseNumber" id="incomingTruck" required>
            <?php
            include 'connect_db.php';
            $sql = "SELECT LicenseNumber FROM Shipments WHERE Status = 'Incoming' AND Location = 'LoadingUnloading'";
            // Add code to populate the dropdown
            ?>
        </select><br>
        <label for="unloadingLocation">Unloading Location:</label><br>
        <input type="text" id="unloadingLocation" name="unloadingLocation" required><br>
        <input type="submit" value="Update Incoming Shipment">
    </form>

    <hr>

    <!-- Outgoing Section -->
    <h3>Outgoing Shipments</h3>
    <form action="process_outgoing.php" method="post">
        <label for="outgoingTruck">Select Truck:</label><br>
        <select name="licenseNumber" id="outgoingTruck" required>
            <?php
            // Add code to populate the dropdown for outgoing trucks
            ?>
        </select><br>
        <label for="rollWidth">Select Roll Width:</label><br>
        <select name="rollWidth" id="rollWidth" required>
            <?php
            // Add code to populate the dropdown with roll widths
            ?>
        </select><br>
        <input type="submit" value="Load Outgoing Shipment">
    </form>

</body>
</html>
