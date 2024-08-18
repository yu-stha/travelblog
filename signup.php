<?php
session_start();
require 'config.php'; // Database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Basic validation
    if (empty($fname) || empty($lname) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = "All fields are required.";
    } elseif ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } elseif (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
        $error = "Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
    } else {
        // Check if username (fname) or email already exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $fname, $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // User already exists
            $error = "Username or email already taken.";
        } else {
            // Hash the password before saving
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            // Insert user into the database
            $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $fname, $email, $hashed_password);

            if ($stmt->execute()) {
                // Registration successful, redirect to login page
                header("Location: login.php");
                exit();
            } else {
                $error = "Failed to register. Please try again.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/navigation.css">
    <title>Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2F4F4F;
            color: #FFFFFF;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            height: 100vh;
        }

        .container {
            display: flex;
            justify-content: space-around;
        }

        .signup-section {
            background: #333;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .signup-section h1 {
            margin-bottom: 20px;
            color: #FFD700; /* Gold color for the heading */
        }

        .signup-form input[type="text"],
        .signup-form input[type="email"],
        .signup-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .signup-form input[type="submit"] {
            width: 100%;
            padding: 10px 20px;
            background-color: #FFD700;
            border: none;
            border-radius: 5px;
            color: #000;
            cursor: pointer;
            transition: all 350ms ease-out 100ms;
        }

        .signup-form input[type="submit"]:hover {
            background-color: #FFA500;
        }

        .signup-section p {
            font-size: 16px;
            margin-top: 20px;
        }

        .signup-section p a {
            color: #FFD700;
            text-decoration: none;
        }

        .signup-section p a:hover {
            color: #FFA500;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #333;
            color: #FFD700; /* Gold color for footer text */
        }
    </style>
    <script>
        function validatePassword() {
            var password = document.getElementById("password").value;
            var confirm_password = document.getElementById("confirm_password").value;
            var error_message = "";

            var strongPasswordRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

            if (!strongPasswordRegex.test(password)) {
                error_message = "Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
            } else if (password !== confirm_password) {
                error_message = "Passwords do not match.";
            }

            if (error_message) {
                document.getElementById("error").innerText = error_message;
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <!-- NAVIGATION SECTION -->
    <header class="container">
        <div class="forms">
            <a href="main.php"><img class="logo" src="images/logo.png" alt="hiking"></a>
        </div>
        <div class="forms">
            <ul class="nav__links">
                <li><a href="services.php">Services</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contacts</a></li>
            </ul>
        </div>
        <div class="forms">
            <a href="home.php">Home</a>
        </div>
    </header>
    
<div class="container">
    <div class="signup-section">
        <h1>Sign Up</h1>
        <?php if (isset($error)): ?>
            <p style="color: red; text-align: center;" id="error"><?php echo $error; ?></p>
        <?php else: ?>
            <p style="color: red; text-align: center;" id="error"></p>
        <?php endif; ?>
        <form class="signup-form" method="POST" action="signup.php" onsubmit="return validatePassword()">
            <input type="text" name="fname" id="fname" placeholder="First Name" required>
            <input type="text" name="lname" id="lname" placeholder="Last Name" required>
            <input type="email" name="email" id="email" placeholder="Your Email" required>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
            <input type="submit" value="Sign Up">
        </form>
        <p>Already have an account? <a href="login.php">Log in here</a>.</p>
    </div>

</div>
</body>
</html>
