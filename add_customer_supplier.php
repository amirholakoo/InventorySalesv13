<!DOCTYPE html>
<html>
<head>
    <title>Add New Customer/Supplier</title>
</head>
<body>
    <h2>Add New Customer</h2>

    <!-- Customer Form -->
    <form action="submit_new_customer.php" method="post">
        <label for="customerName">Customer Name:</label><br>
        <input type="text" id="customerName" name="customerName" required><br>

        <label for="customerAddress">Address:</label><br>
        <input type="text" id="customerAddress" name="customerAddress"><br>

        <label for="customerPhone">Phone:</label><br>
        <input type="text" id="customerPhone" name="customerPhone"><br>

        <label for="customerStatus">Status:</label><br>
        <input type="text" id="customerStatus" name="customerStatus"><br>

        <label for="customerComments">Comments:</label><br>
        <textarea id="customerComments" name="customerComments"></textarea><br>

        <input type="submit" value="Add Customer">
    </form>

    <hr>

    <h2>Add New Supplier</h2>

    <!-- Supplier Form -->
    <form action="submit_new_supplier.php" method="post">
        <label for="supplierName">Supplier Name:</label><br>
        <input type="text" id="supplierName" name="supplierName" required><br>

        <label for="supplierAddress">Address:</label><br>
        <input type="text" id="supplierAddress" name="supplierAddress"><br>

        <label for="supplierPhone">Phone:</label><br>
        <input type="text" id="supplierPhone" name="supplierPhone"><br>

        <label for="supplierStatus">Status:</label><br>
        <input type="text" id="supplierStatus" name="supplierStatus"><br>

        <label for="supplierComments">Comments:</label><br>
        <textarea id="supplierComments" name="supplierComments"></textarea><br>

        <input type="submit" value="Add Supplier">
    </form>

</body>
</html>
