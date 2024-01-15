<!DOCTYPE html>
<html>
<head>
    <title>HomayouPaper Dashboard</title>
    <style>
        /* Add your CSS styling here */
        body { background-color: #FFF3E0; }
        .table { border-collapse: collapse; width: 100%; }
        .table th, .table td { border: 1px solid #ddd; padding: 8px; }
        .table tr:nth-child(even){background-color: #f2f2f2;}
        .table th { padding-top: 12px; padding-bottom: 12px; text-align: left; background-color: #FFAB91; color: white; }
    </style>
</head>
<body>
    <h1>🏭 HomayouPaper Management Dashboard 🏭</h1>
    <!-- Navigation Links -->
    <nav>
        <a href="new_truck.php">🚚 New Truck</a> |
        <a href="add_customer_supplier.php">👥 New Customer/Supplier</a> |
        <!-- Add more links as needed -->
<!-- Other Links -->
<a href="add_raw_material.php">📦 New Raw Material</a> |
<a href="add_roll.php">🗞 Add Roll</a> |
<a href="create_shipment.php">🚢 Create Shipment</a> |
<a href="weight_station.php">⚖️ Weight Station Interface</a> |
<a href="create_sale_order.php">📝 Create Sale Order</a> |
<a href="create_purchase_order.php">🛒 Create Purchase Order</a> |
<a href="forklift_interface.php">🚜 Forklift Interface</a> |
<a href="report_section.php">📊 Report Section</a>


    </nav>

    <!-- Shipment Table Section -->
    <h2>📦 Shipments Overview 📦</h2>
    <div>
        <?php
        include 'connect_db.php'; // Database connection

        $sql = "SELECT * FROM Shipments";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class='table'>";
            echo "<tr><th>ID</th><th>Status</th><th>Location</th><th>Truck ID</th> <!-- More headers --></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["ShipmentID"]."</td><td>".$row["Status"]."</td><td>".$row["Location"]."</td><td>".$row["TruckID"]."</td> <!-- More data --></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>

</body>
</html>
