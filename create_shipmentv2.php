<!DOCTYPE html>
<html>
<head>
    <title>Create Shipment</title>
</head>
<body>
    <h2>Create Shipment</h2>

    <!-- Shipment Form -->
    <form action="submit_shipment.php" method="post">
        <label for="truck">Select Truck:</label><br>
        <select name="truckID" id="truck" required>
            <?php
            include 'connect_db.php'; // Ensure this path is correct
            $sql = "SELECT TruckID, LicenseNumber FROM Trucks WHERE Status='Free'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='". $row["TruckID"] ."'>" . $row["LicenseNumber"] . "</option>";
                }
            } else {
                echo "<option value=''>No free trucks available</option>";
            }
            $conn->close();
            ?>
        </select><br>

        <label for="shipmentType">Shipment Type:</label><br>
        <select name="shipmentType" id="shipmentType" required>
            <option value="Incoming">Incoming</option>
            <option value="Outgoing">Outgoing</option>
        </select><br>

        <input type="submit" value="Create Shipment">
    </form>

</body>
</html>
