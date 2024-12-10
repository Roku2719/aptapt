<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Builder</title>
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

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            border: 3px solid #9b4dff; /* Neon purple border */
            box-shadow: 0 0 15px rgba(155, 77, 255, 0.5); /* Neon purple shadow */
            width: 80%;
            max-width: 700px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            color: #333;
        }

        .form-group input[type="text"], .form-group input[type="email"], .form-group textarea, .form-group input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 2px solid #9b4dff;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .form-group input[type="text"]:focus, .form-group input[type="email"]:focus, .form-group textarea:focus, .form-group input[type="file"]:focus {
            border-color: #8a3eff;
            outline: none;
        }

        .form-group .half-width {
            display: inline-block;
            width: 48%;
            margin-right: 4%;
        }

        .form-group .half-width:last-child {
            margin-right: 0;
        }

        .form-group .form-row {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        input[type="submit"], button {
            background-color: #9b4dff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }

        input[type="submit"]:hover, button:hover {
            background-color: #8a3eff;
        }

    </style>
</head>
<body>

    <form action="preview_resume.php" method="POST" enctype="multipart/form-data">
        <h2>Resume Builder</h2>

        <div class="form-group">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group form-row">
            <div class="half-width">
                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="phone">
            </div>
            <div class="half-width">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address">
            </div>
        </div>

        <div class="form-group">
            <label for="education">Education:</label>
            <textarea id="education" name="education" required></textarea>
        </div>

        <div class="form-group">
            <label for="experience">Work Experience:</label>
            <textarea id="experience" name="experience" required></textarea>
        </div>

        <div class="form-group">
            <label for="skills">Skills:</label>
            <textarea id="skills" name="skills"></textarea>
        </div>

        <div class="form-group">
            <label for="photo">Upload Photo:</label>
            <input type="file" id="photo" name="photo" accept="image/*">
        </div>

        <button type="submit">Preview Resume</button>
    </form>

</body>
</html>
