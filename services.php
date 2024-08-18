<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=css/navigation.css>
    <title>Our Services</title>
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


        .services-section {
            background: #333;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .services-section h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #FFD700; /* Gold color for the heading */
        }

        .services-section p {
            font-size: 18px;
            text-align: justify;
        }

        .service {
            margin-top: 40px;
        }

        .service h2 {
            margin-bottom: 20px;
            color: #FFD700; /* Gold color for the subheading */
        }

        .service-item {
            background: #444;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .service-item h3 {
            margin-bottom: 10px;
            color: #FFD700; /* Gold color for the service title */
        }

        .service-item p {
            font-size: 16px;
            text-align: justify;
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
        <div class="services-section">
            <h1>Our Services</h1>
            <p>
                At Travel Essentials, we offer a wide range of services to make your travel experience as seamless and enjoyable as possible. Whether you're planning your next adventure or need assistance on the go, our expert team is here to help. Explore our services below to see how we can assist you.
            </p>
        </div>

        <div class="service">
            <h2>What We Offer</h2>

            <div class="service-item">
                <h3>Travel Planning & Consultation</h3>
                <p>
                    Need help planning your next trip? Our experienced travel consultants will work with you to create a personalized itinerary based on your preferences and budget. From selecting the best destinations to booking accommodations and activities, we take care of every detail so you can focus on enjoying your journey.
                </p>
            </div>

            <div class="service-item">
                <h3>Flight & Accommodation Bookings</h3>
                <p>
                    Finding the best deals on flights and accommodations can be time-consuming. Let us handle it for you. We search through multiple platforms to find the best options that fit your needs, whether you're looking for luxury stays or budget-friendly options.
                </p>
            </div>

            <div class="service-item">
                <h3>24/7 Travel Support</h3>
                <p>
                    Our team is available around the clock to assist you with any issues that may arise during your travels. Whether you need help with a last-minute booking change or have questions about your itinerary, we're just a call or message away.
                </p>
            </div>

            <div class="service-item">
                <h3>Custom Travel Guides</h3>
                <p>
                    Explore your destination like a local with our custom travel guides. We provide detailed information on the best attractions, restaurants, and hidden gems, tailored to your interests and preferences. Our guides ensure that you get the most out of your travel experience.
                </p>
            </div>
        </div>
    </div>

    <footer>
        &copy; 2024 Travel Essentials. All Rights Reserved.
    </footer>
</body>
</html>
