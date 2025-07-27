<?php
include 'db_con_tickets.php';
$result = $conn->query("SELECT * FROM bookings");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tickets | IndiGo</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --indigo-blue: #003366;
            --indigo-orange: #FF5722;
            --light-gray: #f4f4f4;
            --dark-gray: #333;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-gray);
            color: var(--dark-gray);
            margin: 0;
            padding: 0;
        }
        
        /* Navigation */
        nav {
            background: var(--indigo-blue);
            padding: 15px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .logo {
            display: flex;
            align-items: center;
        }
        
        .logo img {
            height: 40px;
            margin-right: 10px;
        }
        
        .logo span {
            color: white;
            font-size: 22px;
            font-weight: 600;
        }
        
        .nav-links {
            display: flex;
            list-style: none;
        }
        
        .nav-links li {
            margin-left: 30px;
        }
        
        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        
        .nav-links a:hover {
            color: var(--indigo-orange);
        }
        
        /* Tickets Container */
        .tickets-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
        }
        
        .tickets-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .tickets-header h1 {
            color: var(--indigo-blue);
            font-size: 32px;
            margin-bottom: 10px;
        }
        
        .tickets-header p {
            color: #666;
            font-size: 16px;
        }
        
        /* Ticket Card */
        .ticket {
            background: white;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            position: relative;
        }
        
        .ticket-header {
            background: var(--indigo-blue);
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .ticket-header h2 {
            font-size: 20px;
            margin: 0;
        }
        
        .ticket-id {
            background: var(--indigo-orange);
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
        }
        
        .ticket-body {
            display: flex;
            padding: 20px;
        }
        
        .flight-info {
            flex: 1;
        }
        
        .flight-info-row {
            display: flex;
            margin-bottom: 15px;
        }
        
        .flight-info-col {
            flex: 1;
        }
        
        .flight-info-label {
            font-size: 12px;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }
        
        .flight-info-value {
            font-size: 16px;
            font-weight: 500;
        }
        
        .flight-route {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 20px 0;
            position: relative;
        }
        
        .airport {
            text-align: center;
        }
        
        .airport-code {
            font-size: 24px;
            font-weight: 600;
            color: var(--indigo-blue);
        }
        
        .airport-name {
            font-size: 12px;
            color: #666;
        }
        
        .flight-duration {
            position: relative;
            flex: 1;
            margin: 0 20px;
            text-align: center;
            color: #666;
            font-size: 12px;
        }
        
        .flight-duration::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #ddd;
            z-index: 1;
        }
        
        .flight-duration::after {
            content: '✈';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 0 10px;
            z-index: 2;
        }
        
        .qr-code {
            border-left: 1px dashed #ddd;
            padding-left: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        
        .qr-code img {
            width: 120px;
            height: 120px;
        }
        
        .qr-code-label {
            margin-top: 10px;
            font-size: 12px;
            color: #666;
        }
        
        .ticket-footer {
            background: #f9f9f9;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid #eee;
        }
        
        .ticket-price {
            font-size: 20px;
            font-weight: 600;
            color: var(--indigo-orange);
        }
        
        .ticket-actions {
            display: flex;
            gap: 10px;
        }
        
        .btn {
            padding: 8px 15px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
        }
        
        .btn-cancel {
            background: #ffebee;
            color: #c62828;
        }
        
        .btn-cancel:hover {
            background: #ffcdd2;
        }
        
        .btn-print {
            background: #e3f2fd;
            color: #1565c0;
        }
        
        .btn-print:hover {
            background: #bbdefb;
        }
        
        .no-tickets {
            text-align: center;
            padding: 50px;
            color: #666;
        }
        
        .no-tickets-icon {
            font-size: 50px;
            color: #ddd;
            margin-bottom: 20px;
        }
        
        .no-tickets p {
            margin-bottom: 20px;
        }
        
        .btn-book {
            display: inline-block;
            padding: 10px 20px;
            background: var(--indigo-orange);
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <nav>
        <div class="logo">
            <img src="indigo-airlines-group-bookings.png" alt="IndiGo Logo">
            <span>IndiGo</span>
        </div>
        <ul class="nav-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="booking_ticket.php">My Tickets</a></li>
            <li><a href="form.php">Book Flight</a></li>
        </ul>
    </nav>
    
    <div class="tickets-container">
        <div class="tickets-header">
            <h1>My Tickets</h1>
            <p>View and manage your upcoming flights</p>
        </div>
        
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="ticket" id="ticket-<?php echo $row['id']; ?>">
                    <div class="ticket-header">
                        <h2>IndiGo Airlines - Flight Ticket</h2>
                        <div class="ticket-id">Booking #<?php echo $row['id']; ?></div>
                    </div>
                    
                    <div class="ticket-body">
                        <div class="flight-info">
                            <div class="flight-info-row">
                                <div class="flight-info-col">
                                    <div class="flight-info-label">Passenger Name</div>
                                    <div class="flight-info-value"><?php echo $row['name']; ?></div>
                                </div>
                                <div class="flight-info-col">
                                    <div class="flight-info-label">Passport Number</div>
                                    <div class="flight-info-value"><?php echo $row['passport_number']; ?></div>
                                </div>
                            </div>
                            
                            <div class="flight-info-row">
                                <div class="flight-info-col">
                                    <div class="flight-info-label">Travel Date</div>
                                    <div class="flight-info-value"><?php echo $row['travel_date']; ?></div>
                                </div>
                                <div class="flight-info-col">
                                    <div class="flight-info-label">Flight Time</div>
                                    <div class="flight-info-value"><?php echo $row['flight_time']; ?></div>
                                </div>
                            </div>
                            
                            <div class="flight-route">
                                <div class="airport">
                                    <div class="airport-code"><?php echo $row['arrival_airport']; ?></div>
                                    <div class="airport-name">Departure</div>
                                </div>
                                
                                <div class="flight-duration">Non-stop</div>
                                
                                <div class="airport">
                                    <div class="airport-code"><?php echo $row['departure_airport']; ?></div>
                                    <div class="airport-name">Arrival</div>
                                </div>
                            </div>
                            
                            <div class="flight-info-row">
                                <div class="flight-info-col">
                                    <div class="flight-info-label">Seat Number</div>
                                    <div class="flight-info-value"><?php echo $row['seat']; ?></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="qr-code">
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=Ticket-<?php echo $row['id']." ".$row['name']; ?>" alt="QR Code">
                            <div class="qr-code-label">Scan for boarding</div>
                        </div>
                    </div>
                    
                    <div class="ticket-footer">
                        <div class="ticket-price">₹<?php echo $row['ticket_price']; ?></div>
                        <div class="ticket-actions">
                            <button class="btn btn-cancel" onclick="cancelTicket(<?php echo $row['id']; ?>)">Cancel</button>
                            <button class="btn btn-print" onclick="printTicket(<?php echo $row['id']; ?>)">Print</button>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="no-tickets">
                <div class="no-tickets-icon">✈</div>
                <h3>No Tickets Found</h3>
                <p>You don't have any booked flights yet.</p>
                <a href="form.php" class="btn-book">Book a Flight</a>
            </div>
        <?php endif; ?>
    </div>
    
    <script>
        function cancelTicket(bookingId) {
            if (confirm("Are you sure you want to cancel this ticket?")) {
                fetch('cancel_booking.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `booking_id=${Id}`
                })
                .then(response => response.text())
                .then(data => {
                    if (data.includes("successfully")) {
                        document.getElementById(`ticket-${Id}`).remove();
                    } else {
                        alert("Failed to cancel ticket: " + data);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert("An error occurred while canceling the ticket.");
                });
            }
        }
        
        function printTicket(bookingId) {
            const printWindow = window.open('', '', 'width=800,height=600');
            const ticket = document.getElementById(`ticket-${Id}`).cloneNode(true);
            
            // Remove buttons for print
            const footer = ticket.querySelector('.ticket-footer');
            if (footer) {
                footer.remove();
            }
            
            printWindow.document.write(`
                <!DOCTYPE html>
                <html>
                <head>
                    <title>IndiGo Ticket #${Id}</title>
                    <style>
                        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; }
                        .ticket { border: 1px solid #ddd; border-radius: 10px; max-width: 600px; margin: 0 auto; }
                        .ticket-header { background: #003366; color: white; padding: 15px; }
                        .ticket-body { padding: 20px; display: flex; }
                        .flight-info { flex: 1; }
                        .qr-code { border-left: 1px dashed #ddd; padding-left: 20px; }
                        .flight-route { display: flex; margin: 20px 0; }
                        .airport-code { font-size: 24px; font-weight: bold; }
                    </style>
                </head>
                <body>
            `);
            printWindow.document.write(ticket.outerHTML);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            
            setTimeout(() => {
                printWindow.print();
            }, 500);
        }
    </script>
</body>
</html>