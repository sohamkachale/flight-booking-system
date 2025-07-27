<?php
include 'db_con_tickets.php';

// Check if `booking_id` is set and not empty
if (!isset($_GET['booking_id']) || empty($_GET['booking_id'])) {
    die("Error: Booking ID is missing.");
}

$booking_id = intval($_GET['booking_id']); // Ensure it's an integer

// Check if the record exists before deleting
$check_stmt = $conn->prepare("SELECT * FROM booking WHERE booking_id = ?");
$check_stmt->bind_param("i", $booking_id);
$check_stmt->execute();
$result = $check_stmt->get_result();

if ($result->num_rows === 0) {
    die("Error: Booking ID not found.");
}

// Proceed to delete
$delete_stmt = $conn->prepare("DELETE FROM booking WHERE booking_id = ?");
$delete_stmt->bind_param("i", $booking_id);

if ($delete_stmt->execute()) {
    
    header("Location: ticket_page.php"); // Redirect to index page after successful deletion
    exit();
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
