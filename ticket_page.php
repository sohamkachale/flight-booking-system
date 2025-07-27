<?php
include 'db_con_tickets.php';

$result = $conn->query("SELECT * FROM booking");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .container { margin-top: 30px; }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center mb-4">Ticket List</h2>
    <a href="form.php" class="btn btn-primary mb-3">Add Ticket</a>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Arrival Airport</th>
                <th>Arrival time</th>
                <th>Destination Airport</th>
                <th>Date of Flight</th>
                <th>ticket price</th>
                <th>Seat No</th>
                
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['booking_id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['arrival'] ?></td>
                <td><?= $row['arrival_time'] ?></td>
                <td><?= $row['destination'] ?></td>
               
                <td><?= $row['travel_date'] ?></td>
                <td><?= $row['t_price'] ?></td>
                
               
                <td><?= $row['seat_no'] ?></td>
                <td>
                    <!-- <a href="update_ticxket.php?id=<?= $row['booking_id'] ?>" class="btn btn-warning btn-sm">Update</a> -->
                    <a href="update_ticket.php?id=<?= $row['booking_id'] ?>" class="btn btn-warning btn-sm">Update</a>

                    <a href="delete_ticket.php?booking_id=<?= $row['booking_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this ticket?')">Delete</a>

                    <button onclick="printTicket('<?= $row['booking_id'] ?>')" class="btn btn-success btn-sm">Print</button>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script>
function printTicket(id) {
    var printWindow = window.open('', '', 'width=600,height=400');
    printWindow.document.write('<h2>Ticket Details</h2>');
    printWindow.document.write(document.querySelector("tr:nth-child(" + (parseInt(id) + 1) + ")").innerHTML);
    printWindow.document.close();
    printWindow.print();
}
</script>

</body>
</html>
