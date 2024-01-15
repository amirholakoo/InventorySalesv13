<!DOCTYPE html>
<html>
<head>
    <title>Add New Roll</title>
</head>
<body>
    <h2>Add New Roll</h2>

    <!-- Roll Form -->
    <form action="submit_roll.php" method="post">
        <label for="reelNumber">Reel Number:</label><br>
        <input type="text" id="reelNumber" name="reelNumber" required><br>

        <label for="width">Width:</label><br>
        <input type="number" id="width" name="width"><br>

        <label for="gsm">GSM:</label><br>
        <input type="number" id="gsm" name="gsm"><br>

        <label for="length">Length:</label><br>
        <input type="number" id="length" name="length"><br>

        <label for="grade">Grade:</label><br>
        <input type="text" id="grade" name="grade"><br>

        <label for="breaks">Breaks:</label><br>
        <input type="text" id="breaks" name="breaks"><br>

        <label for="comments">Comments:</label><br>
        <textarea id="comments" name="comments"></textarea><br>

        <input type="submit" value="Add Roll">
    </form>

</body>
</html>
