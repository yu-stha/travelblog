<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href=css/navigation.css>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
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

        .about-section {
            background: #333;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .about-section h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #FFD700; /* Gold color for the heading */
        }

        .about-section p {
            font-size: 18px;
            text-align: justify;
        }

        .team {
            margin-top: 40px;
        }

        .team h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #FFD700; /* Gold color for the subheading */
        }

        .team-member {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .team-member img {
            width: 150px; /* Set width to ensure a circle */
            height: 100px; /* Set height to ensure a circle */
            border-radius: 250px; 
            margin-right: 20px;
            object-fit: cover; /* Ensure the image covers the area without distortion */
        }

        .team-member p {
            font-size: 18px;
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
                <a href="signup.php">Sign up</a>
                <a href="login.php">Log in</a>
            </div>                                          
        </header>


    <div class="containers">
        <div class="about-section">
            <h1>About Us</h1>
            <p>
                Welcome to Travel Essentials, your go-to platform for all things travel. Whether you're looking for
                inspiration for your next trip or practical advice to make your journey smoother, we've got you covered.
                Our mission is to make travel accessible, enjoyable, and memorable for everyone. We believe that the
                world is full of amazing places and experiences, and it's our goal to help you discover them.
            </p>
            <p>
                At Travel Essentials, we provide comprehensive guides, tips, and recommendations to ensure that every
                aspect of your travel is taken care of. From choosing the right destination to finding the best
                accommodations and activities, we are here to assist you every step of the way.
            </p>
            <p>
                Our team consists of passionate travelers who have explored various corners of the world. We bring you
                first-hand experiences and insights, so you can make informed decisions and travel with confidence.
            </p>
        </div>

        <div class="team">
            <h2>Meet Our Team</h2>
            <div class="team-member">
                <img src="images/team-member-1.jpg" alt="Yubin Shrestha">
                <p>
                    <strong>Yubin Shrestha</strong> - Founder
                    <br>
                    Yubin is the visionary behind Travel Essentials. With a deep love for travel and a wealth of experience
                    in the industry, he founded this platform to share his passion and help others explore the world in a
                    meaningful way.
                </p>
            </div>
            <div class="team-member">
                <img src="images/team-member-2.jpg" alt="Anish Pudasaini">
                <p>
                    <strong>Varun Gautam</strong> - CEO
                    <br>
                    Varun leads the team at Travel Essentials with a focus on innovation and customer satisfaction. His
                    leadership and strategic vision are instrumental in driving the success and growth of the company.
                </p>
            </div>
            <div class="team-member">
                <img src="images/team-member-3.jpg" alt="Varun Gautam">
                <p>
                    <strong>Anish Pudasaini</strong> - Senior Executive
                    <br>
                    Anish is a key figure at Travel Essentials, overseeing operations and ensuring that our mission is
                    reflected in every aspect of our service. His dedication and expertise make him an invaluable part of
                    the team.
                </p>
            </div>
        </div>
    </div>

    <footer>
        &copy; 2024 Travel Essentials. All Rights Reserved.
    </footer>
</body>
</html>
