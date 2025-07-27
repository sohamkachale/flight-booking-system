<?php
include('db_con_tickets.php');

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize input
    $name = htmlspecialchars($_POST['name']);
    $passport_name = htmlspecialchars($_POST['passport_name']);
    $passport_number = htmlspecialchars($_POST['passport_number']);
    $travel_date = $_POST['date'];
    $departure = $_POST['arrival'];
    $arrival = $_POST['destination'];
    $flight_time = $_POST['arrival_time'];
    $seat = $_POST['seat'];
    $ticket_price = intval($_POST['t_price']);

    // Insert into DB
    $stmt = $conn->prepare("INSERT INTO bookings (name, passport_name, passport_number, travel_date, departure_airport, arrival_airport, flight_time, seat, ticket_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssi", $name, $passport_name, $passport_number, $travel_date, $departure, $arrival, $flight_time, $seat, $ticket_price);

    if ($stmt->execute()) {
        // Redirect to success page or show success
        echo "<script>alert('Booking successful!'); window.location.href='home.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
