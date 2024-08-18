<?php
session_start();
require 'config.php'; // Database connection file

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch user data from the database
$user_id = $_SESSION['user_id'];
$query = $conn->prepare("SELECT username, email, profile_pic, bio FROM users WHERE id = ?");
$query->bind_param("i", $user_id);
$query->execute();
$query->bind_result($username, $email, $profile_pic, $bio);
$query->fetch();
$query->close();

// Handle profile update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_bio = trim($_POST['bio']);
    
    // Handle profile picture upload
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['profile_pic']['tmp_name'];
        $file_name = basename($_FILES['profile_pic']['name']);
        $upload_dir = 'uploads/profile_pics/';
        $target_file = $upload_dir . $file_name;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($file_tmp, $target_file)) {
            $profile_pic = $target_file;

            // Update session with new profile pic path
            $_SESSION['profile_pic'] = $profile_pic;
        }
    }

    // Update the database with new bio and profile picture
    $update_query = $conn->prepare("UPDATE users SET bio = ?, profile_pic = ? WHERE id = ?");
    $update_query->bind_param("ssi", $new_bio, $profile_pic, $user_id);
    if ($update_query->execute()) {
        header("Location: profile.php");
        exit();
    } else {
        $error = "Failed to update profile.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/home.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        /* Add your CSS here */
        
        .profile-container {
            width: 50%;
            margin: 0 auto;
            background-color: rgba(47, 79, 79, 0.8);
            padding: 20px;
            border-radius: 8px;
            color: #FFF;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
        .profile-pic {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
            object-fit: cover; /* Ensure image fits within the circle */
        }
        .profile-info {
            margin-bottom: 20px;
        }
        .profile-info label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .profile-info textarea, .profile-info input[type="file"] {
            width: 95%;
            resize: none;
            padding: 10px;
            margin-bottom: 20px;
        }
        .profile-info input[type="submit"] {
            padding: 10px 20px;
            background-color: #FFD700;
            border: none;
            border-radius: 5px;
            color: #000;
            cursor: pointer;
        }
        .profile-info input[type="submit"]:hover {
            background-color: #FFA500;
        }

        .profile-info p {
            color: black;
        }
        .logout {
            display: flex;
            justify-content: center;
        }

        .logout a {
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-decoration: none;
            padding: 10px;
            border: none;
            cursor: pointer;
            transition: all 350ms ease-out 100ms;
        }

        .logout a:hover {
            padding: 12px;;
            color: green;
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
                    <a href="home.php">Home</a>
                </div>      
            </nav>                              
        </header>

    <div class="profile-container">
        <h2>Your Profile</h2>
        <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
        <form method="POST" action="profile.php" enctype="multipart/form-data">
            <div class="profile-info">
                <img src="<?php echo htmlspecialchars($profile_pic); ?>" alt="Profile Picture" class="profile-pic">
                <label for="profile_pic">Change Profile Picture:</label>
                <input type="file" name="profile_pic" id="profile_pic">
            </div>
            <div class="profile-info">
                <label for="username">Username:</label>
                <p><?php echo htmlspecialchars($username); ?></p>
            </div>
            <div class="profile-info">
                <label for="email">Email:</label>
                <p><?php echo htmlspecialchars($email); ?></p>
            </div>
            <div class="profile-info">
                <label for="bio">Bio:</label>
                <textarea name="bio" id="bio" rows="5"><?php echo htmlspecialchars($bio); ?></textarea>
            </div>
            <div class="profile-info">
                <input type="submit" value="Update Profile">
            </div>
        </form>
        
        <div class="logout">
            <h4><a href="logout.php">Log out</a></h4>
        </div>
    </div>
</body>
</html>
