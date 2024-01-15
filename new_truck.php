<!DOCTYPE html>
<html>
<head>
    <title>Add New Truck</title>
</head>
<body>
    <h2>Add New Truck</h2>

    <!-- Truck Form -->
    <form action="submit_new_truck.php" method="post">
        <label for="digit1">Two-Digit Number:</label><br>
        <input type="text" id="digit1" name="digit1" maxlength="2" required><br>

        <label for="farsiLetter">Farsi Alphabet:</label><br>
        <select name="farsiLetter" id="farsiLetter" required>
            <!-- Add options for Farsi alphabet here -->
            <option value="الف">الف</option>
            <!-- Add more Farsi alphabet options as needed -->
<option value="ب">ب</option>
<option value="ج">ج</option>
<option value="د">د</option>


        </select><br>

        <label for="digit2">Three-Digit Number:</label><br>
        <input type="text" id="digit2" name="digit2" maxlength="3" required><br>

        <label for="driverName">Driver Name:</label><br>
        <input type="text" id="driverName" name="driverName" required><br>

        <label for="phone">Phone:</label><br>
        <input type="text" id="phone" name="phone"><br>

        <input type="submit" value="Add Truck">
    </form>

</body>
</html>
