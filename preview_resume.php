<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $education = nl2br(htmlspecialchars($_POST['education']));
    $experience = nl2br(htmlspecialchars($_POST['experience']));
    $address = htmlspecialchars($_POST['address']);
    $skills = nl2br(htmlspecialchars($_POST['skills']));

    // Handle image upload
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
        $image_name = $_FILES['profile_image']['name'];
        $image_tmp_name = $_FILES['profile_image']['tmp_name'];
        $image_upload_dir = 'uploads/';
        $image_path = $image_upload_dir . basename($image_name);

        // Check if the file is an image
        if (getimagesize($image_tmp_name)) {
            // Move the uploaded image to the server folder
            if (move_uploaded_file($image_tmp_name, $image_path)) {
                $image_url = $image_path; // Image uploaded successfully
            } else {
                $image_url = null;
                echo "Error: Failed to upload image.";
            }
        } else {
            $image_url = null;
            echo "Error: The uploaded file is not an image.";
        }
    } else {
        $image_url = null; // No image uploaded or upload error
        echo "Error: No image uploaded or there was an upload error.";
    }
} else {
    echo "No data submitted!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Preview</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .resume-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            border: 3px solid #9b4dff; /* Neon purple border */
            box-shadow: 0 0 15px rgba(155, 77, 255, 0.5); /* Neon purple shadow */
            width: 80%;
            max-width: 600px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .section-title {
            color: #9b4dff; /* Neon purple text */
            font-weight: bold;
            font-size: 18px;
            margin-top: 20px;
        }

        .section-content {
            font-size: 16px;
            color: #333;
        }

        .buttons {
            text-align: center;
            margin-top: 20px;
        }

        .buttons button {
            background-color: #9b4dff; /* Neon purple button */
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .buttons button:hover {
            background-color: #8a3eff; /* Lighter neon purple on hover */
        }

        .buttons form {
            display: inline;
        }

        .image-preview {
            max-width: 150px;
            height: auto;
            border-radius: 50%;
            margin: 10px 0;
        }
    </style>
</head>
<body>

    <div class="resume-container">
        <h2>Resume Preview</h2>
        
        <!-- Display Profile Image -->
        <?php if (isset($image_url) && $image_url): ?>
            <div class="section-title">Profile Picture:</div>
            <img src="<?php echo $image_url; ?>" alt="Profile Picture" class="image-preview">
        <?php else: ?>
            <div class="section-title">Profile Picture:</div>
            <div class="section-content">No image uploaded</div>
        <?php endif; ?>
        
        <div class="section-title">Full Name:</div>
        <div class="section-content"><?php echo $name; ?></div>
        
        <div class="section-title">Email:</div>
        <div class="section-content"><?php echo $email; ?></div>
        
        <div class="section-title">Phone Number:</div>
        <div class="section-content"><?php echo $phone ? $phone : 'Not provided'; ?></div>
        
        <div class="section-title">Address:</div>
        <div class="section-content"><?php echo $address ? $address : 'Not provided'; ?></div>
        
        <div class="section-title">Skills:</div>
        <div class="section-content"><?php echo $skills ? $skills : 'Not provided'; ?></div>
        
        <div class="section-title">Education:</div>
        <div class="section-content"><?php echo $education; ?></div>
        
        <div class="section-title">Work Experience:</div>
        <div class="section-content"><?php echo $experience; ?></div>

        <div class="buttons">
            <!-- Edit Button: goes back to the form page -->
            <button onclick="window.history.back();">Edit Resume</button>

            <!-- Submit Button: sends the form data (optional) -->
            <form action="submit_resume.php" method="POST">
                <input type="hidden" name="name" value="<?php echo $name; ?>">
                <input type="hidden" name="email" value="<?php echo $email; ?>">
                <input type="hidden" name="phone" value="<?php echo $phone; ?>">
                <input type="hidden" name="education" value="<?php echo $education; ?>">
                <input type="hidden" name="experience" value="<?php echo $experience; ?>">
                <input type="hidden" name="address" value="<?php echo $address; ?>">
                <input type="hidden" name="skills" value="<?php echo $skills; ?>">
                <input type="hidden" name="profile_image" value="<?php echo $image_url; ?>">
                <button type="submit">Submit Resume</button>
            </form>
        </div>
    </div>

</body>
</html>
