<!DOCTYPE html>
<html>
<head>
    <title>Forklift Interface</title>
</head>
<body>
    <h2>Forklift Interface</h2>

    <!-- Section for Incoming Shipments -->
    <h3>Incoming Shipments</h3>
    <form action="process_incoming_shipment.php" method="post">
        <label for="incomingTruck">Select Truck:</label><br>
        <select name="licenseNumber" id="incomingTruck" required>
            <?php
            include 'connect_db.php';
            $sql = "SELECT LicenseNumber FROM Shipments WHERE Status = 'Incoming' AND Location = 'LoadingUnloading'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["LicenseNumber"] . "'>" . $row["LicenseNumber"] . "</option>";
                }
            } else {
                echo "<option value=''>No Incoming Trucks</option>";
            }
            ?>
        </select><br>
        <label for="unloadingLocation">Unloading Location:</label><br>
        <input type="text" id="unloadingLocation" name="unloadingLocation" required><br>
        <input type="submit" value="Update Incoming Shipment">
    </form>

    <hr>

    <!-- Section for Outgoing Shipments -->
    <h3>Outgoing Shipments</h3>
    <form action="process_outgoing_shipment.php" method="post">
        <label for="outgoingTruck">Select Truck:</label><br>
        <select name="licenseNumber" id="outgoingTruck" required>
            <?php
            $sql = "SELECT LicenseNumber FROM Shipments WHERE Status = 'Outgoing' AND Location = 'LoadingUnloading'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["LicenseNumber"] . "'>" . $row["LicenseNumber"] . "</option>";
                }
            } else {
                echo "<option value=''>No Outgoing Trucks</option>";
            }
            ?>
        </select><br>
        <label for="width">Roll Width:</label><br>
        <input type="number" id="width" name="width" required><br>
        <label for="rolls">Select Rolls:</label><br>
        <select multiple name="rolls[]" id="rolls" required>
            <?php
            $sql = "SELECT ReelNumber FROM Products WHERE Status = 'In-Stock'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["ReelNumber"] . "'>" . $row["ReelNumber"] . "</option>";
                }
            } else {
                echo "<option value=''>No In-Stock Rolls</option>";
            }
            $conn->close();
            ?>
        </select><br>
        <input type="submit" value="Update Outgoing Shipment">
    </form>

</body>
</html>

