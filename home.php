<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IndiGo - Book Flights</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
        
        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0, 51, 102, 0.8), rgba(0, 51, 102, 0.8)), 
                        url('flight-hero.jpg') no-repeat center center/cover;
            height: 500px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            padding: 0 20px;
        }
        
        .hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }
        
        .hero p {
            font-size: 20px;
            max-width: 700px;
            margin-bottom: 30px;
        }
        
        .btn {
            display: inline-block;
            background: var(--indigo-orange);
            color: white;
            padding: 12px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn:hover {
            background: #e64a19;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        /* Features Section */
        .features {
            padding: 80px 5%;
            text-align: center;
        }
        
        .features h2 {
            font-size: 36px;
            margin-bottom: 50px;
            color: var(--indigo-blue);
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        
        .feature-card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
        }
        
        .feature-icon {
            font-size: 40px;
            color: var(--indigo-orange);
            margin-bottom: 20px;
        }
        
        .feature-card h3 {
            font-size: 22px;
            margin-bottom: 15px;
            color: var(--indigo-blue);
        }
        
        /* Footer */
        footer {
            background: var(--indigo-blue);
            color: white;
            padding: 50px 5% 20px;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }
        
        .footer-column h3 {
            font-size: 18px;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }
        
        .footer-column h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 2px;
            background: var(--indigo-orange);
        }
        
        .footer-column ul {
            list-style: none;
        }
        
        .footer-column ul li {
            margin-bottom: 10px;
        }
        
        .footer-column ul li a {
            color: #ddd;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-column ul li a:hover {
            color: var(--indigo-orange);
        }
        
        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-links a {
            color: white;
            font-size: 20px;
            transition: color 0.3s ease;
        }
        
        .social-links a:hover {
            color: var(--indigo-orange);
        }
        
        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 14px;
            color: #aaa;
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
    
    <section class="hero">
        <h1>Fly With India's Most Punctual Airline</h1>
        <p>On-time. Hassle-free. Affordable flights to destinations across India and beyond</p>
        <a href="form.php" class="btn">Book Now</a>
    </section>
    
    <section class="features">
        <h2>Why Fly With IndiGo?</h2>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h3>On-time Performance</h3>
                <p>India's most punctual airline with the best on-time performance record.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-rupee-sign"></i>
                </div>
                <h3>Affordable Fares</h3>
                <p>Competitive prices without compromising on quality or service.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Safe Travel</h3>
                <p>Stringent safety measures for your peace of mind.</p>
            </div>
        </div>
    </section>
    
    <footer>
        <div class="footer-content">
            <div class="footer-column">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="booking_ticket.php">My Bookings</a></li>
                    <li><a href="form.php">Book Flight</a></li>
                </ul>
            </div>
            
            <div class="footer-column">
                <h3>Services</h3>
                <ul>
                    <li><a href="#">Flight Status</a></li>
                    <li><a href="#">Web Check-in</a></li>
                    <li><a href="#">Manage Booking</a></li>
                    <li><a href="#">Flight Schedule</a></li>
                </ul>
            </div>
            
            <div class="footer-column">
                <h3>Information</h3>
                <ul>
                    <li><a href="#">About IndiGo</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Media Center</a></li>
                    <li><a href="#">Travel Advisories</a></li>
                </ul>
            </div>
            
            <div class="footer-column">
                <h3>Connect With Us</h3>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        
        <div class="copyright">
            <p>&copy; 2023 IndiGo Airlines. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>