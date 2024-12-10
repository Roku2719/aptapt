<?php
// register.php
require 'db_connection.php'; // Include database connection file

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else {
        // Hash the password before saving it to the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the SQL query to insert the new user into the database
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");

        if ($stmt === false) {
            // Prepare statement failed
            die("Error preparing SQL query: " . $conn->error);
        }

        // Bind the parameters to the SQL query
        $stmt->bind_param("ss", $username, $hashed_password);

        // Execute the query
        if ($stmt->execute()) {
            $success = "Account created successfully! You can now <a href='login.php'>log in</a>.";
        } else {
            // Query execution failed
            $error = "Error creating account: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000000;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .register-container {
            border: 2px solid #da00ff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
            background-color: #000000;
        }
        h2 {
            color: #da00ff;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            color: #da00ff;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #da00ff;
            border-radius: 5px;
            outline: none;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #da00ff;
            color: #ffffff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            margin-bottom: 10px;
        }
        input[type="submit"]:hover {
            background-color: #b100cc;
        }
        .error, .success {
            text-align: center;
            margin-bottom: 15px;
        }
        .error {
            color: red;
        }
        .success {
            color: #da00ff;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Create Account</h2>
        <?php if (isset($error)): ?>
            <div class="error"> <?= htmlspecialchars($error) ?> </div>
        <?php elseif (isset($success)): ?>
            <div class="success"> <?= $success ?> </div>
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
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <input type="submit" value="Register">
        </form>
    </div>
</body>
</html>
