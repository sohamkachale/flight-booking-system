<?php
$servername = "localhost";
$username = "root"; // Change if needed
$password = "soham28"; // Change if needed
$dbname = "clg_project"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the booking ID
    $booking_id = trim($_POST['booking_id']);

    // Check if booking ID is empty
    if (empty($booking_id)) {
        die("Error: Booking ID is required.");
    }

    // Prepare SQL statement
    $sql = "DELETE FROM booking WHERE booking_id = ?";

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error in preparing statement: " . $conn->error);
    }

    $stmt->bind_param("i", $booking_id);

    // Execute the statement
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo "Booking deleted successfully!";
        } else {
            echo "No booking found with the given ID.";
        }
    } else {
        echo "Error deleting booking: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
