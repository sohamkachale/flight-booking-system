<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment | IndiGo</title>
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
        
        /* Payment Container */
        .payment-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
        }
        
        .payment-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .payment-header h1 {
            color: var(--indigo-blue);
            font-size: 32px;
            margin-bottom: 10px;
        }
        
        .payment-header p {
            color: #666;
            font-size: 16px;
        }
        
        /* Payment Card */
        .payment-card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }
        
        .payment-amount {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .payment-amount-label {
            font-size: 14px;
            color: #666;
            margin-bottom: 5px;
        }
        
        .payment-amount-value {
            font-size: 36px;
            font-weight: 600;
            color: var(--indigo-orange);
        }
        
        /* Payment Tabs */
        .payment-tabs {
            display: flex;
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
        }
        
        .payment-tab {
            padding: 12px 20px;
            cursor: pointer;
            font-weight: 500;
            color: #666;
            border-bottom: 2px solid transparent;
            transition: all 0.3s ease;
        }
        
        .payment-tab.active {
            color: var(--indigo-blue);
            border-bottom: 2px solid var(--indigo-orange);
        }
        
        /* Payment Methods */
        .payment-method {
            display: none;
        }
        
        .payment-method.active {
            display: block;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--indigo-blue);
        }
        
        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        
        .form-group input:focus {
            border-color: var(--indigo-blue);
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 51, 102, 0.1);
        }
        
        .card-row {
            display: flex;
            gap: 15px;
        }
        
        .card-row .form-group {
            flex: 1;
        }
        
        .upi-qr {
            text-align: center;
            margin: 20px 0;
        }
        
        .upi-qr img {
            max-width: 200px;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 8px;
        }
        
        .upi-confirm {
            display: flex;
            align-items: center;
            margin: 20px 0;
        }
        
        .upi-confirm input {
            margin-right: 10px;
        }
        
        .submit-btn {
            display: block;
            width: 100%;
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
        }
        
        .submit-btn:hover {
            background: #e64a19;
        }
        
        .submit-btn:disabled {
            background: #ccc;
            cursor: not-allowed;
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
    
    <div class="payment-container">
        <div class="payment-header">
            <h1>Complete Your Payment</h1>
            <p>Choose your preferred payment method to confirm your booking</p>
        </div>
        
        <div class="payment-card">
            <div class="payment-amount">
                <div class="payment-amount-label">Total Amount to Pay</div>
                <div class="payment-amount-value">₹<?php echo isset($_POST['amount']) ? $_POST['amount'] : '0'; ?></div>
            </div>
            
            <div class="payment-tabs">
                <div class="payment-tab active" onclick="showPaymentMethod('credit-card')">Credit Card</div>
                <div class="payment-tab" onclick="showPaymentMethod('debit-card')">Debit Card</div>
                <div class="payment-tab" onclick="showPaymentMethod('upi')">UPI</div>
            </div>
            
            <form method="post" action="booking_ticket.php">
                <input type="hidden" name="booking_id" value="<?php echo isset($_POST['booking_id']) ? $_POST['booking_id'] : ''; ?>">
                <input type="hidden" name="amount" value="<?php echo isset($_POST['amount']) ? $_POST['amount'] : '0'; ?>">
                
                <!-- Credit Card Payment -->
                <div id="credit-card" class="payment-method active">
                    <div class="form-group">
                        <label for="credit-card-number">Card Number</label>
                        <input type="text" id="credit-card-number" name="credit_card_number" placeholder="1234 5678 9012 3456" maxlength="16">
                    </div>
                    
                    <div class="card-row">
                        <div class="form-group">
                            <label for="credit-card-expiry">Expiry Date</label>
                            <input type="text" id="credit-card-expiry" name="credit_card_expiry" placeholder="MM/YY">
                        </div>
                        
                        <div class="form-group">
                            <label for="credit-card-cvv">CVV</label>
                            <input type="text" id="credit-card-cvv" name="credit_card_cvv" placeholder="123" maxlength="3">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="credit-card-name">Name on Card</label>
                        <input type="text" id="credit-card-name" name="credit_card_name" placeholder="John Doe">
                    </div>
                </div>
                
                <!-- Debit Card Payment -->
                <div id="debit-card" class="payment-method">
                    <div class="form-group">
                        <label for="debit-card-number">Card Number</label>
                        <input type="text" id="debit-card-number" name="debit_card_number" placeholder="1234 5678 9012 3456" maxlength="16">
                    </div>
                    
                    <div class="card-row">
                        <div class="form-group">
                            <label for="debit-card-expiry">Expiry Date</label>
                            <input type="text" id="debit-card-expiry" name="debit_card_expiry" placeholder="MM/YY">
                        </div>
                        
                        <div class="form-group">
                            <label for="debit-card-cvv">CVV</label>
                            <input type="text" id="debit-card-cvv" name="debit_card_cvv" placeholder="123" maxlength="3">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="debit-card-name">Name on Card</label>
                        <input type="text" id="debit-card-name" name="debit_card_name" placeholder="John Doe">
                    </div>
                </div>
                
                <!-- UPI Payment -->
                <div id="upi" class="payment-method">
                    <div class="upi-qr">
                        <img src="qr2.jpg" alt="UPI QR Code">
                        <p>Scan this QR code to pay via UPI</p>
                    </div>
                    
                    <div class="upi-confirm">
                        <input type="checkbox" id="upi-confirm" name="upi_confirm" onchange="enablePayButton()">
                        <label for="upi-confirm">I have completed the payment</label>
                    </div>
                </div>
                
                <button type="submit" id="pay-now" name="pay_now" class="submit-btn">Pay Now</button>
            </form>
        </div>
    </div>
    
    <script>
        function showPaymentMethod(methodId) {
            // Hide all payment methods
            document.querySelectorAll('.payment-method').forEach(method => {
                method.classList.remove('active');
            });
            
            // Show selected payment method
            document.getElementById(methodId).classList.add('active');
            
            // Update active tab
            document.querySelectorAll('.payment-tab').forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Find the tab that matches our method and activate it
            document.querySelectorAll('.payment-tab').forEach(tab => {
                if (tab.textContent.toLowerCase().includes(methodId.replace('-', ' '))) {
                    tab.classList.add('active');
                }
            });
            
            // Enable/disable pay button for UPI
            if (methodId === 'upi') {
                document.getElementById('pay-now').disabled = true;
            } else {
                document.getElementById('pay-now').disabled = false;
            }
        }
        
        function enablePayButton() {
            const upiConfirm = document.getElementById('upi-confirm');
            const payButton = document.getElementById('pay-now');
            payButton.disabled = !upiConfirm.checked;
        }
        
        // Format credit card number
        document.getElementById('credit-card-number').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\s+/g, '');
            if (value.length > 0) {
                value = value.match(new RegExp('.{1,4}', 'g')).join(' ');
            }
            e.target.value = value;
        });
        
        // Format expiry date
        document.getElementById('credit-card-expiry').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 2) {
                value = value.substring(0, 2) + '/' + value.substring(2, 4);
            }
            e.target.value = value;
        });
    </script>
</body>
</html>