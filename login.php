<?php
// login.php
session_start();
require 'db_connection.php'; // Include database connection file

// Check if the user is already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: main.php"); // Redirect to main page if logged in
    exit();
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if both username and password are entered
    if (empty($username) || empty($password)) {
        $error = "Both fields are required!";
    } else {
        // Query to find user
        $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($hashed_password);
            $stmt->fetch();

            // Verify password
            if (password_verify($password, $hashed_password)) {
                $_SESSION['loggedin'] = true; // Set session variable to true
                $_SESSION['username'] = $username; // Store username in session
                header("Location: main.php"); // Redirect to main page
                exit();
            } else {
                $error = "Invalid username or password"; // Incorrect password
            }
        } else {
            $error = "Invalid username or password"; // Username not found
        }
        $stmt->close(); // Close the prepared statement
    }
}
$conn->close(); // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            height: 100vh;
            background-color: white; /* Changed to plain white */
            color: #333; /* Adjusted text color for contrast on a white background */
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .overlay {
            display: none; /* Removed the overlay since it's unnecessary for a white background */
        }

        .login-container {
            position: relative;
            z-index: 2;
            border: 2px solid #da00ff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.9); /* Light background for form */
        }

        h2 {
            color: #da00ff;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            display: block;
            color: #da00ff;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="password"] {
            width: calc(100% - 20px);
            padding: 8px 10px;
            border: 1px solid #da00ff;
            border-radius: 5px;
            outline: none;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #da00ff;
            color: #ffffff;
            border: none;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #b100cc;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }

        .create-account {
            margin-top: 20px;
            color: #da00ff;
        }

        .create-account a {
            color: #da00ff;
            text-decoration: none;
            font-weight: bold;
        }

        .create-account a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php if (isset($error)): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form method="post" action="">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <input type="submit" value="Login">
        </form>
        <div class="create-account">
            <p>Don't have an account? <a href="register.php">Create Account</a></p>
        </div>
    </div>
</body>
</html>
