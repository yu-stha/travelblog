<?php
session_start();
require 'config.php'; // Database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Basic validation
    if (empty($email) || empty($password)) {
        $error = "Both fields are required.";
    } else {
        // Fetch user from the database using email
        $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id, $username, $hashed_password);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                // Password is correct, start session
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $username; // Store the username in the session
                header("Location: home.php");
                exit();
            } else {
                $error = "Incorrect password.";
            }
        } else {
            $error = "No user found with that email.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/navigation.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2F4F4F;
            color: #FFFFFF;
            margin: 0;
            padding: 0;
            /* line-height: 1.6; */
        }
        .container{
            display: flex;
            justify-content: space-around;
        }
        
        .containers {
            width: 80%;
            /* height:100%; */
            /* margin: auto; */
            padding: 20px;
        }

/* Center the login form */
.login-section {
    background: #333;
    justify-content: center;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    max-width: 400px;
    width: 100%;
    height: 80%;
    text-align: center;
    margin:10px;
}

.login-section h1 {
    margin-bottom: 20px;
    color: #FFD700; /* Gold color for the heading */
}

.login-form input[type="email"],
.login-form input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
}

.login-form input[type="submit"] {
    width: 100%;
    padding: 10px 20px;
    background-color: #FFD700;
    border: none;
    border-radius: 5px;
    color: #000;
    cursor: pointer;
    transition: all 350ms ease-out 100ms;
}

.login-form input[type="submit"]:hover {
    background-color: #FFA500;
}

.login-section p {
    font-size: 16px;
    margin-top: 20px;
}

.login-section p a {
    color: #FFD700;
    text-decoration: none;
}

.login-section p a:hover {
    color: #FFA500;
}

footer {
    text-align: center;
    padding: 20px;
    background-color: #333;
    color: #FFD700; /* Gold color for footer text */
}

    </style>    
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
    <div class="login-section">
        <h1>Login</h1>
        <?php if (isset($error)): ?>
            <p style="color: red; text-align: center;"><?php echo $error; ?></p>
        <?php endif; ?>
        <form class="login-form" method="POST" action="login.php">
            <input type="email" name="email" id="email" placeholder="Your Email" required>
            <input type="password" name="password" id="password" placeholder="Your Password" required>
            <input type="submit" value="Login">
        </form>
        <p>Don't have an account? <a href="signup.php">Sign up here</a>.</p>
    </div>
</div>


</body>
</html>
