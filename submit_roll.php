<?php
include 'connect_db.php'; // Ensure this path is correct
require 'phpqrcode/qrlib.php'; // Ensure you have the PHP QR Code library

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract and sanitize input
    $reelNumber = $conn->real_escape_string($_POST['reelNumber']);
    $width = intval($_POST['width']);
    $gsm = intval($_POST['gsm']);
    $length = intval($_POST['length']);
    $grade = $conn->real_escape_string($_POST['grade']);
    $breaks = $conn->real_escape_string($_POST['breaks']);
    $comments = $conn->real_escape_string($_POST['comments']);
    
    // Default values for status and location
    $status = 'In-Stock';
    $location = 'Production';

// Generate QR Code
$qrData = "Reel Number: $reelNumber, Breaks: $breaks,Width: $width, GSM: $gsm, Length: $length, Grade: $grade, Comments: $comments";
$qrCodePath = 'qrcodes/' . $reelNumber . '.png';
QRcode::png($qrData, $qrCodePath);


    // SQL to add roll
    $sql = "INSERT INTO Products (ReelNumber, Width, GSM, Length, Grade, Breaks, Comments, Status, Location, qrCode) VALUES ('$reelNumber', $width, $gsm, $length, '$grade', '$breaks', '$comments', '$status', '$location', '$qrCodePath')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "New roll added successfully!<br>";

        // Generate QR Code
        //$qrData = "Reel Number: $reelNumber, Width: $width, GSM: $gsm, Length: $length, Grade: $grade, Breaks: $breaks, Comments: $comments";
        //$qrCodePath = 'qrcodes/' . $reelNumber . '.png';
        //QRcode::png($qrData, $qrCodePath);

        echo "QR Code for the Roll:<br>";
        echo "<img src='".$qrCodePath."' /><br>";
        echo "<a href='".$qrCodePath."' target='_blank'>Open QR Code</a>";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
}

// Redirect back to the form after a delay
header("Refresh:5; url=add_roll.php");
?>
