<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    $not_logged_in = true;
} else {
    $not_logged_in = false;
}

// Handle blog post submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$not_logged_in) {
    $username = $_SESSION['username'];
    $blogContent = trim($_POST['blog_content']);
    $timestamp = date("Y-m-d");

    if (!empty($blogContent)) {
        $file = 'blogs.txt';

        // Format: Username | Timestamp | Blog Content
        $newEntry = $username . " | " . $timestamp . " | " . htmlspecialchars($blogContent) . "\n---\n";
        $currentContent = file_get_contents($file);
        
        // Append new content to the top of the file
        $currentContent = trim($currentContent);
        $newContent = $newEntry . $currentContent;

        file_put_contents($file, $newContent);
    }
}

// Load the blog posts
$blogs = file_exists('blogs.txt') ? file_get_contents('blogs.txt') : '';
?>

<html>
<head>
    <title>Travel Essentials</title>
    <link rel="stylesheet" href="css/home.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        textarea{
            border: 2px solid #E0E0E0; /* Light grey border */
            /* width: 100%; */
            border-radius: 5px; /* Rounded corners */
            background-color: #2F4F4F; /* Dark Slate Grey background */
            color: #FFF; /* White text */
            box-sizing: border-box; /*Ensure padding is included in the width/height */
            resize: none; /* Disable resizing */
            margin: 10px;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.6); /* Semi-transparent black background for contrast */
            color: #FFF; /* White text */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); /* Adds a subtle shadow for depth */
        }

        textarea:focus {
            border-color: #FFD700; /* Gold border on focus */
            outline: none; /* Remove default outline */
        }
        .blog_box{
            width: 100%;
            height: 100px; /* Initial height */
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box;
            transition: height 0.3s ease-in-out;
        }
        .blog_box:focus {
            height: 300px; /* Height when focused */
        }
        .post-blog-btn {
            background-color: #ff6f61; /* A warm, inviting color */
            color: white; /* White text for contrast */
            padding: 12px 24px; /* Padding for a larger clickable area */
            margin:10px;
            font-size: 18px; /* Larger font for better readability */
            font-weight: bold; /* Bold text to make it stand out */
            border: none; /* Remove default borders */
            border-radius: 8px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor on hover */
            transition: background-color 0.3s ease, transform 0.3s ease; /* Smooth transitions */
        }

        .post-blog-btn:hover {
            background-color: #ff4a3d; /* Slightly darker color on hover */
            transform: scale(1.05); /* Slightly enlarge the button on hover */
        }

        .post-blog-btn:active {
            background-color: #e64535; /* Darker color when the button is clicked */
            transform: scale(1); /* Reset scale when the button is clicked */
        }

        /* Main container for recent blogs */
        .posted_blogs {
            margin-top: 20px;
            padding: 20px;
            font-size: x-large;
            background-color: rgba(0, 0, 0, 0.6); /* Semi-transparent black background for contrast */
            color: #FFF; /* White text */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); /* Adds a subtle shadow for depth */
        }

        /* Heading for recent blogs */
        .recent_blogs_heading {
            margin-bottom: 30px;
            font-size: xx-large; /* Increase font size */
            text-align: center;
            color: #FFD700; /* Gold color for the heading */
        }

        /* Container for each individual blog post */
        .posted_blog {
            margin-bottom: 20px; /* Space between each blog post */
            padding: 20px;
            background-color: rgba(47, 79, 79, 0.8); /* Semi-transparent background for each post */
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3); /* Subtle shadow for individual posts */
        }

        /* Adds some space around the entire blog section */
        .blog_content {
            margin-bottom: 30px; /* Space between the blog content and the heading */
            padding-top: 10px;
        }

        /* General styling to ensure the background image is visible */
        .containers {
            margin: 20px auto;
            padding: 20px;
            max-width: 60%; /* Constrain the width for better readability */
            background-color: transparent; /* Ensure the background is transparent to show the image */
        }

        .blog h2{
            color:rgb(59, 103, 51);
        }

        .profile_icon {
            display: flex;
            border-radius: 100%;
            height: 50px;
            width: 50px;
            cursor: pointer;
            transition: all 350ms ease-out 100ms;
        }

        .profile_icon:hover{
            border-radius:50%;
            padding: 10px;
        }

        /* Additional style for the login required message */
        .login-required {
            text-align: center;
            background-color:#2F4F4F;
            color: #FFD700;
            padding: 15px;
            margin-top: 20px;
            border-radius: 8px;
        }

        /* Footer styling */
        footer {
            text-align: center;
            background-color:#2F4F4F;
            color: #FFD700;
            padding: 15px;
            margin-top: 20px;
            border-radius: 8px;
            position: relative;
            bottom: 0;
            width: 100%;
        }

    </style>
</head>
<body bgcolor="001A1A">

    <!-- NAVIGATION SECTION -->
        <header class="container">
            <nav class="navigation">
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
                    <a href="profile.php"><img class="profile_icon" src="images/profile_icon.png" alt="profile"></a>
                    <!-- <a href="logout.php">Log out</a> -->
                </div>      
            </nav>                              
        </header>

    <!-- LOGIN REQUIRED MESSAGE -->
    <?php if ($not_logged_in): ?>
        <div class="login-required">
            <h2>You must be logged in to access this page.</h2>
            <p><a href="login.php" style="color: #FFD700; text-decoration: underline;">Click here to log in</a></p>
        </div>
    <?php endif; ?>

    <?php if (!$not_logged_in): ?>
        <div class="containers">
            <div class="blog">
                <h2>Write a Blog?</h2>
                <form method="POST" action="home.php">
                    <textarea class="blog_box" name="blog_content" placeholder="Share your personal travel stories....."></textarea>
                    <div><input type="submit" value="Post Blog" class=post-blog-btn ></div>
                </form>
            </div>
        </div>

        <div class="containers">
            <div class="posted_blogs">
                <h2 class="recent_blogs_heading">Recent Blogs</h2>
                <?php if (!empty($blogs)): ?>
                    <div class="blog_content">
                        <?php
                        $posts = explode('---', $blogs);
                        foreach ($posts as $post): ?>
                            <div class="posted_blog">
                                <?php echo nl2br($post); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p>No blogs posted yet.</p>
                <?php endif; ?>
            </div>
        </div>
        <footer>
        <p>Travel Essentials &copy; 2024. All Rights Reserved.</p>
    </footer>
    <?php endif; ?>

   

</body>
</html>
