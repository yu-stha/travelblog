<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href=css/navigation.css>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2F4F4F;
            color: #FFFFFF;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }
        .container{
            display: flex;
            justify-content: space-around;
        }

        .containers {
            width: 80%;
            margin: auto;
            overflow: hidden;
            padding: 20px;
        }

        .contact-section {
            background: #333;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .contact-section h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #FFD700; /* Gold color for the heading */
        }

        .contact-section p {
            font-size: 18px;
            text-align: center;
        }

        .contact-info {
            margin-top: 40px;
            text-align: center;
        }

        .contact-info h2 {
            margin-bottom: 20px;
            color: #FFD700; /* Gold color for the subheading */
        }

        .contact-info p {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .contact-form {
            margin-top: 40px;
            background: #444;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .contact-form input[type="text"],
        .contact-form input[type="email"],
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .contact-form input[type="submit"] {
            padding: 10px 20px;
            background-color: #FFD700;
            border: none;
            border-radius: 5px;
            color: #000;
            cursor: pointer;
        }

        .contact-form input[type="submit"]:hover {
            background-color: #FFA500;
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
                <a href="signup.php">Sign up</a>
                <a href="login.php">Log in</a>
            </div>                                          
        </header>

    <div class="containers">
        <div class="contact-section">
            <h1>Contact Us</h1>
            <p>
                We'd love to hear from you! Whether you have a question about our content, need assistance, or just want to share your travel experiences, feel free to reach out to us.
            </p>
        </div>

        <div class="contact-info">
            <h2>Get in Touch</h2>
            <p><strong>Email:</strong> contact@travelessentials.com</p>
            <p><strong>Phone:</strong> +977 9803054855</p>
            <p><strong>Address:</strong> Khusibu, Nayabazar, Kathmandu</p>
        </div>

        <div class="contact-form">
            <h2>Send Us a Message</h2>
            <form action="process_contact.php" method="post">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
                <input type="submit" value="Send Message">
            </form>
        </div>
    </div>

    <footer>
        &copy; 2024 Travel Essentials. All Rights Reserved.
    </footer>
</body>
</html>
