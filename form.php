<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Flight | IndiGo</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --indigo-blue: #003366;
            --indigo-orange: #FF5722;
            --light-gray: #f4f4f4;
            --dark-gray: #333;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-gray);
            color: var(--dark-gray);
            line-height: 1.6;
        }
        
        /* Navigation */
        nav {
            background: var(--indigo-blue);
            padding: 15px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
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
        
        /* Booking Form Container */
        .booking-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
        }
        
        .booking-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .booking-header h1 {
            color: var(--indigo-blue);
            font-size: 32px;
            margin-bottom: 10px;
        }
        
        .booking-header p {
            color: #666;
            font-size: 16px;
        }
        
        .booking-form {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }
        
        /* Form Layout */
        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -15px;
        }
        
        .form-group {
            flex: 1 0 300px;
            margin: 0 15px 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--indigo-blue);
        }
        
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px 15px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        
        .form-group input:focus,
        .form-group select:focus {
            border-color: var(--indigo-blue);
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 51, 102, 0.1);
        }
        
        /* Validation States */
        input:invalid, select:invalid {
            border-color: #ff4444;
        }
        
        input:valid, select:valid {
            border-color: #00C851;
        }
        
        /* Submit Button */
        .submit-btn {
            display: block;
            width: 100%;
            max-width: 300px;
            margin: 30px auto 0;
            padding: 14px;
            background: var(--indigo-orange);
            color: white;
            border: none;
            border-radius: 6px;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .submit-btn:hover {
            background: #e64a19;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        /* Button Ripple Effect */
        .submit-btn:after {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 5px;
            height: 5px;
            background: rgba(255, 255, 255, 0.5);
            opacity: 0;
            border-radius: 100%;
            transform: scale(1, 1) translate(-50%);
            transform-origin: 50% 50%;
        }
        
        .submit-btn:focus:not(:active)::after {
            animation: ripple 1s ease-out;
        }
        
        @keyframes ripple {
            0% {
                transform: scale(0, 0);
                opacity: 0.5;
            }
            100% {
                transform: scale(20, 20);
                opacity: 0;
            }
        }
        
        /* Flight Options */
        .flight-options {
            margin-top: 20px;
        }
        
        .flight-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            cursor: pointer;
            transition: all 0.3s ease;
            border: 1px solid #ddd;
        }
        
        .flight-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-color: var(--indigo-blue);
        }
        
        .flight-card.selected {
            border-left: 4px solid var(--indigo-orange);
            background-color: rgba(255, 87, 34, 0.05);
        }
        
        .flight-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .flight-time {
            font-size: 18px;
            font-weight: 500;
        }
        
        .flight-duration {
            color: #666;
            font-size: 14px;
        }
        
        .flight-price {
            color: var(--indigo-orange);
            font-size: 20px;
            font-weight: 600;
        }
        
        .flight-details {
            display: flex;
            justify-content: space-between;
            color: #666;
            font-size: 14px;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
                margin: 0;
            }
            
            .form-group {
                flex: 1 0 100%;
                margin: 0 0 20px 0;
            }
            
            .booking-container {
                padding: 0 15px;
            }
            
            .nav-links li {
                margin-left: 15px;
            }
            
            .booking-form {
                padding: 25px;
            }
        }
        
        @media (max-width: 480px) {
            .nav-links {
                display: none; /* Consider hamburger menu for mobile */
            }
            
            .booking-header h1 {
                font-size: 26px;
            }
            
            .submit-btn {
                max-width: 100%;
            }
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
    
    <div class="booking-container">
        <div class="booking-header">
            <h1>Book Your Flight</h1>
            <p>Fill in the details below to book your flight with India's most punctual airline</p>
        </div>
        
        <form class="booking-form" action="create_info.php" method="post" onsubmit="return confirmBooking()">
            <div class="form-row">
                <div class="form-group">
                    <label for="name">Passenger Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                
                <div class="form-group">
                    <label for="passport_name">Passport Name</label>
                    <input type="text" id="passport_name" name="passport_name" required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="passport_number">Passport Number</label>
                    <input type="text" id="passport_number" name="passport_number" 
                           pattern="[A-Z0-9]{6,9}" 
                           title="Passport number should be 6-9 characters long and contain only uppercase letters and numbers" 
                           required>
                </div>
                
                <div class="form-group">
                    <label for="date">Date of Travel</label>
                    <input type="date" id="date" name="date" required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="arrival">Departure Airport</label>
                    <select id="arrival" name="arrival" required>
                        <option value="">Select Airport</option>
                        <option value="DEL">Delhi (DEL)</option>
                        <option value="BOM">Mumbai (BOM)</option>
                        <option value="MAA">Chennai (MAA)</option>
                        <option value="BLR">Bangalore (BLR)</option>
                        <option value="HYD">Hyderabad (HYD)</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="destination">Arrival Airport</label>
                    <select id="destination" name="destination" required>
                        <option value="">Select Airport</option>
                        <option value="DEL">Delhi (DEL)</option>
                        <option value="BOM">Mumbai (BOM)</option>
                        <option value="MAA">Chennai (MAA)</option>
                        <option value="BLR">Bangalore (BLR)</option>
                        <option value="HYD">Hyderabad (HYD)</option>
                    </select>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="arrival_time">Flight Time</label>
                    <select id="arrival_time" name="arrival_time" required>
                        <option value="">Select Time</option>
                        <option value="03:30 PM">03:30 PM</option>
                        <option value="12:00 AM">12:00 AM</option>
                        <option value="11:00 PM">11:00 PM</option>
                        <option value="01:00 PM">01:00 PM</option>
                        <option value="02:00 PM">02:00 PM</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="seat">Seat Preference</label>
                    <select id="seat" name="seat" required onchange="updatePrice()">
                        <option value="">Select Seat</option>
                        <option value="A1">Window Seat - A1 (₹15,000)</option>
                        <option value="A2">Window Seat - A2 (₹25,000)</option>
                        <option value="B1">Aisle Seat - B1 (₹45,000)</option>
                        <option value="B2">Aisle Seat - B2 (₹50,000)</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label for="t_price">Ticket Price (₹)</label>
                <input type="number" id="t_price" name="t_price" readonly required>
            </div>
            
            <button type="submit" class="submit-btn">Continue to Payment</button>
        </form>
    </div>
    
    <script>
        function confirmBooking() {
            return confirm("Are you sure you want to book this flight?");
        }
        
        function updatePrice() {
            const seat = document.getElementById("seat").value;
            const priceField = document.getElementById("t_price");
            
            switch(seat) {
                case "A1":
                    priceField.value = 15000;
                    break;
                case "A2":
                    priceField.value = 25000;
                    break;
                case "B1":
                    priceField.value = 45000;
                    break;
                case "B2":
                    priceField.value = 50000;
                    break;
                default:
                    priceField.value = "";
            }
        }
    </script>
</body>
</html>