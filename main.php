<?php
$profpic ="images/bg.jpg";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Essentials</title>
    <link rel="stylesheet" href="css/navigation.css">
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo $profpic;?>');
            background-size: cover;
            background-position: center;
            color: #FFFFFF;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
           
        }

        .container{
            display: flex;
            justify-content: space-around;
        }
        .containers {
            display: flex;
            flex-direction: column;
            width: 100%;
            padding: 0 20px;
            text-align: center;
            justify-content: center;
            align-items: center;
        }

        .home-section {
            max-width: 600px;
            width: 100%;
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1.5s ease-out;
        }

        .home-section h1 {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #FFD700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .home-section p {
            font-size: 20px;
            margin-bottom: 40px;
            color: #E0E0E0;
        }

        .home-section button {
            padding: 12px 30px;
            margin: 10px;
            background-color: #FFD700;
            border: none;
            border-radius: 30px;
            color: #000;
            cursor: pointer;
            transition: transform 0.3s ease, background-color 0.3s ease;
            font-size: 18px;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .home-section button:hover {
            background-color: #FFA500;
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.5);
            color: #FFD700; /* Gold color for footer text */
            width: 100%;
            position: absolute;
            bottom: 0;
            font-size: 14px;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>
    <!-- NAVIGATION SECTION -->
    <header class="container">
        <div class="forms">
            <a href="main.php"><img class="logo" src="images/logo.png" alt="hiking" style="max-width: 100px; border-radius: 25%;"></a>
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
            <a href="signup.php">Sign up</a>
            <a href="login.php">Log in</a>
        </div>
    </header>

    <!-- MAIN CONTENT SECTION -->
<div class="containers"> 
    <div class="home-section">
        <h1>NEVER STOP TRAVELLING.</h1>
        <p>Your adventure starts here. Explore the world with us.</p>
        <button onclick="window.location.href='home.php'">Browse</button>
        <button onclick="window.location.href='services.php'">Services</button>
    </div>
</div>
    <footer>
        &copy; 2024 Travel Essentials. All Rights Reserved.
    </footer>

</body>
</html>
