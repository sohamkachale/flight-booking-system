<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IndiGo - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --indigo-blue: #003366;
            --indigo-orange: #FF5722;
            --light-gray: #f4f4f4;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: url('airport-bg.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #333;
        }
        
        .login-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 400px;
            overflow: hidden;
        }
        
        .logo-header {
            background: var(--indigo-blue);
            padding: 20px;
            text-align: center;
        }
        
        .logo-header img {
            height: 50px;
        }
        
        .form-container {
            padding: 30px;
        }
        
        .tabs {
            display: flex;
            margin-bottom: 20px;
        }
        
        .tab {
            flex: 1;
            padding: 12px;
            text-align: center;
            cursor: pointer;
            font-weight: 500;
            color: #666;
            border-bottom: 2px solid #ddd;
            transition: all 0.3s ease;
        }
        
        .tab.active {
            color: var(--indigo-blue);
            border-bottom: 2px solid var(--indigo-orange);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }
        
        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            transition: border 0.3s ease;
        }
        
        .form-group input:focus {
            border-color: var(--indigo-blue);
            outline: none;
        }
        
        .submit-btn {
            width: 100%;
            padding: 12px;
            background: var(--indigo-orange);
            color: white;
            border: none;
            border-radius: 6px;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        
        .submit-btn:hover {
            background: #e64a19;
        }
        
        .form-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }
        
        .form-footer a {
            color: var(--indigo-blue);
            text-decoration: none;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo-header">
            <img src="indigo-airlines-group-bookings.png" alt="IndiGo Logo">
        </div>
        
        <div class="form-container">
            <div class="tabs">
                <div class="tab active" onclick="showLogin()">Login</div>
                <div class="tab" onclick="showSignup()">Sign Up</div>
            </div>
            
            <!-- Login Form -->
             <form id="login-form" method="POST" action="process.php">
           
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                <button type="submit" name="login" class="submit-btn">Login</button>
                
                <div class="form-footer">
                    <a href="#">Forgot password?</a>
                </div>
            </form>
            
            <!-- Signup Form -->
            <form id="signup-form" method="POST" action="process.php" style="display: none;">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                <div class="form-group">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" id="confirm-password" name="confirm-password" required>
                </div>
                
                <button type="submit" name="signup" class="submit-btn">Create Account</button>
            </form>
        </div>
    </div>

    <script>
        function showLogin() {
            document.getElementById('login-form').style.display = 'block';
            document.getElementById('signup-form').style.display = 'none';
            document.querySelectorAll('.tab').forEach(tab => tab.classList.remove('active'));
            document.querySelectorAll('.tab')[0].classList.add('active');
        }
        
        function showSignup() {
            document.getElementById('login-form').style.display = 'none';
            document.getElementById('signup-form').style.display = 'block';
            document.querySelectorAll('.tab').forEach(tab => tab.classList.remove('active'));
            document.querySelectorAll('.tab')[1].classList.add('active');
        }
    </script>
</body>
</html>