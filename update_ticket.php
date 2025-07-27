<?php
include 'db_con_tickets.php';

// Ensure `booking_id` is received in the URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Error: Booking ID is missing.");
}

$booking_id = intval($_GET['id']); // Ensure it's an integer

// Fetch ticket details using prepared statements
$stmt = $conn->prepare("SELECT * FROM booking WHERE booking_id = ?");
$stmt->bind_param("i", $booking_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Error: No ticket found with Booking ID $booking_id.");
}

$ticket = $result->fetch_assoc();

// Update ticket if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $arrival = $_POST["arrival"];
    $destination = $_POST["destination"];
    $travel_date = $_POST["travel_date"];
    $seat_no = $_POST["seat_no"];

    $update_stmt = $conn->prepare("UPDATE booking SET name=?, arrival=?, destination=?, travel_date=?, seat_no=? WHERE booking_id=?");
    $update_stmt->bind_param("sssssi", $name, $arrival, $destination, $travel_date, $seat_no, $booking_id);

    if ($update_stmt->execute()) {
        header("Location: TICKET_PAGE.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Ticket</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2 class="text-center mb-4">Update Ticket</h2>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($ticket['name']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Arrival Airport</label>
            <input type="text" name="arrival" class="form-control" value="<?= htmlspecialchars($ticket['arrival']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Destination Airport</label>
            <input type="text" name="destination" class="form-control" value="<?= htmlspecialchars($ticket['destination']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Travel Date</label>
            <input type="date" name="travel_date" class="form-control" value="<?= htmlspecialchars($ticket['travel_date']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Seat No</label>
            <input type="text" name="seat_no" class="form-control" value="<?= htmlspecialchars($ticket['seat_no']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Ticket</button>
    </form>
</div>

</body>
</html>