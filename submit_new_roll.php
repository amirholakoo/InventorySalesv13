<?php
include 'connect_db.php'; // Ensure this path is correct
require 'phpqrcode/qrlib.php'; // Adjust the path to the QRCode library

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract and sanitize input
    $reelNumber = $conn->real_escape_string($_POST['reelNumber']);
    $width = intval($_POST['width']);
    $gsm = intval($_POST['gsm']);
    $length = intval($_POST['length']);
    $grade = $conn->real_escape_string($_POST['grade']);
    // ... other fields ...

    // Set default values for status and location
    $status = 'In-Stock';
    $location = 'Production';

    // Generate QR Code
    $qrData = "Reel Number: $reelNumber, Width: $width, GSM: $gsm, Length: $length, Grade: $grade";
    $qrFile = 'qrcodes/' . $reelNumber . '.png';
    QRcode::png($qrData, $qrFile);

    // SQL to add roll
    $sql = "INSERT INTO Products (ReelNumber, Width, GSM, Length, Grade, Status, Location, qrCode) VALUES ('$reelNumber', $width, $gsm, $length, '$grade', '$status', '$location', '$qrFile')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "New roll added successfully! <br>";
        echo "QR Code: <a href='$qrFile' target='_blank'>View and Print</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

// Redirect back to the form
// header("Location: add_roll.php");
?>
