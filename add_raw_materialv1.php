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
            <option value="OCC">OCC (کاغذ باطله)</option>
            <option value="Office Waste">Office Waste (زباله‌های اداری)</option>
            <option value="Chemical">Chemical (مواد شیمیایی)</option>
            <option value="Parts">Parts (قطعات)</option>
            <option value="Others">Others (سایر)</option>
        </select><br>

        <label for="materialName">Material Name:</label><br>
        <input type="text" id="materialName" name="materialName" required><br>

        <label for="supplierID">Supplier ID:</label><br>
        <input type="number" id="supplierID" name="supplierID" required><br>

        <label for="status">Status:</label><br>
        <input type="text" id="status" name="status"><br>

        <label for="comments">Comments:</label><br>
        <textarea id="comments" name="comments"></textarea><br>

        <input type="submit" value="Add Raw Material">
    </form>

</body>
</html>
