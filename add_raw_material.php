<!DOCTYPE html>
<html>
<head>
    <title>Add New Raw Material</title>
</head>
<body>
    <h2>Add New Raw Material</h2>

    <!-- Raw Material Form -->
    <form action="submit_raw_material.php" method="post">
        <label for="materialType">Material Type:</label><br>
        <select name="materialType" id="materialType" required>
            <option value="OCC">کارتن مقوایی قدیمی (OCC)</option>
            <option value="Office Waste">ضایعات دفتری (Office Waste)</option>
            <option value="Chemical">مواد شیمیایی (Chemical)</option>
            <option value="Parts">قطعات (Parts)</option>
            <option value="Others">سایر (Others)</option>
        </select><br>

        <label for="materialName">Material Name:</label><br>
        <input type="text" id="materialName" name="materialName" required><br>

        <label for="supplier">Supplier:</label><br>
        <select name="supplierID" id="supplier" required>
            <?php
            include 'connect_db.php'; // Ensure this path is correct
            $sql = "SELECT SupplierID, SupplierName FROM Suppliers";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='". $row["SupplierID"] ."'>" . $row["SupplierName"] . "</option>";
                }
            } else {
                echo "<option value=''>No suppliers available</option>";
            }
            $conn->close();
            ?>
        </select><br>

        <!-- Additional fields as needed -->

        <input type="submit" value="Add Raw Material">
    </form>

</body>
</html>
