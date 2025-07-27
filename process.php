<?php
include('db_con_tickets.php');


// Signup process
if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $confirm = $_POST['confirm-password'];

    if ($pass !== $confirm) {
        echo "Passwords do not match.";
        exit();
    }

    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (full_name, username, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $user, $hashed_pass);

    if ($stmt->execute()) {
        echo "Account created successfully. <a href='index.html'>Login here</a>";
        header("Location: index.php");
exit();
    } else {
        echo "Signup failed: " . $stmt->error;
        header("Location: index.php");
exit();
    }

    $stmt->close();
}

// Login process
if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($hashed_pass);
        $stmt->fetch();

        if (password_verify($pass, $hashed_pass)) {
            echo "Login successful! Welcome, $user.";
            header("Location: home.php");
exit();
        } else {
            echo "Invalid credentials.";
            header("Location: index.php");
exit();
        }
    } else {
        echo "User not found.";
    }

    $stmt->close();
}

$conn->close();
?>
