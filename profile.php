<!DOCTYPE html>
<html>

<head>
    <title>User Profile</title>
</head>

<body>
    <?php include 'header.php' ?>
    <div class="edit-profile">
        <h1>Edit Profile</h1>

        <?php
        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Retrieve form data
            $name = $_POST["name"];
            $profilePic = $_FILES["profile_pic"]["name"];
            $profilePicTemp = $_FILES["profile_pic"]["tmp_name"];

            // Validate and save the updated profile
            // Your code for validation and saving goes here

            // Move uploaded profile picture to desired location
            // Replace "uploads/" with the desired directory path
            move_uploaded_file($profilePicTemp, "uploads/" . $profilePic);

            // Update the account div with the new name and profile picture
            echo '<script>
              window.onload = function() {
                var accountDiv = parent.document.querySelector(".header-icons .account");
                accountDiv.innerHTML = \'<img src="uploads/' . $profilePic . '" alt="Profile Picture">\';
                accountDiv.innerHTML += \'<h4>' . $name . '</h4>\';
              }
            </script>';

            // Display success message
            echo "<p>Profile updated successfully!</p>";
        }
        ?>

        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="profile_pic">Profile Picture:</label>
            <input type="file" id="profile_pic" name="profile_pic" required><br>
            <br>
            <input type="submit" value="Update Profile">
        </form>
    </div>

</body>

</html>