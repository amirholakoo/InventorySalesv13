<!DOCTYPE html>
<html>
<head>
    <title>Weight Station</title>
</head>
<body>
    <h2>Weight Station</h2>

    <!-- Section for Entrance Trucks -->
    <h3>Entrance Trucks</h3>
    <form action="update_weight1.php" method="post">
        <label for="entranceTruck">Select Truck:</label><br>
        <select name="licenseNumber" id="entranceTruck" required>
            <?php
            include 'connect_db.php';
            $sql = "SELECT LicenseNumber FROM Shipments WHERE Location = 'Entrance'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["LicenseNumber"] . "'>" . $row["LicenseNumber"] . "</option>";
                }
            } else {
                echo "<option value=''>No trucks at Entrance</option>";
            }
            ?>
        </select><br>
        <label for="weight1">Weight 1:</label><br>
        <input type="number" id="weight1" name="weight1" required><br>
        <input type="submit" value="Record Weight 1">
    </form>

    <hr>

    <!-- Section for Loading/Unloading or Loaded/Unloaded Trucks -->
    <h3>Loading/Unloading or Loaded/Unloaded Trucks</h3>
    <form action="update_weight2.php" method="post">
        <label for="loadingTruck">Select Truck:</label><br>
        <select name="licenseNumber" id="loadingTruck" required>
            <?php
            $sql = "SELECT LicenseNumber FROM Shipments WHERE Location IN ('LoadingUnloading', 'LoadedUnloaded')";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["LicenseNumber"] . "'>" . $row["LicenseNumber"] . "</option>";
                }
            } else {
                echo "<option value=''>No trucks in Loading/Unloading</option>";
            }
            $conn->close();
            ?>
        </select><br>
        <label for="weight2">Weight 2:</label><br>
        <input type="number" id="weight2" name="weight2" required><br>
        <input type="submit" value="Record Weight 2">
    </form>

</body>
</html>
