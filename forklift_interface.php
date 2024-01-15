<!DOCTYPE html>
<html>
<head>
    <title>Forklift Interface</title>
</head>
<body>
    <h2>Forklift Interface</h2>

    <!-- Incoming Shipments Section -->
    <h3>Incoming Shipments</h3>
    <form action="process_incoming.php" method="post">
        <label for="incomingTruck">Select Truck (Incoming):</label><br>
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
                echo "<option value=''>No trucks available</option>";
            }
            ?>
        </select><br>

        <label for="unloadingLocation">Unloading Location:</label><br>
        <input type="text" id="unloadingLocation" name="unloadingLocation" required><br>

        <input type="submit" value="Update Incoming Shipment">
    </form>

    <hr>

    <!-- Outgoing Shipments Section -->
    <h3>Outgoing Shipments</h3>
    <form action="process_outgoing.php" method="post">
        <label for="outgoingTruck">Select Truck (Outgoing):</label><br>
        <select name="licenseNumber" id="outgoingTruck" required>
            <?php
            $sql = "SELECT LicenseNumber FROM Shipments WHERE Status = 'Outgoing' AND Location = 'LoadingUnloading'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["LicenseNumber"] . "'>" . $row["LicenseNumber"] . "</option>";
                }
            } else {
                echo "<option value=''>No trucks available</option>";
            }
            ?>
        </select><br>

        <label for="width">Select Width:</label><br>
        <select name="width" id="width" required>
            <?php
            $sql = "SELECT DISTINCT Width FROM Products WHERE Status = 'In-Stock'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["Width"] . "'>" . $row["Width"] . "</option>";
//echo "<tr><td><input type='checkbox' name='selectedRolls[]' value='".$row["RollID"]."'></td><td>".$row["RollID"]."</td><td>".$row["ReelNumber"]."</td><td>".$row["GSM"]."</td><td>".$row["Grade"]."</td><td>".$row["Length"]."</td></tr>";
                }
            } else {
                echo "<option value=''>No widths available</option>";
            }
            $conn->close();
            ?>
        </select><br>

        <input type="submit" value="Update Outgoing Shipment">
    </form>

</body>
</html>
