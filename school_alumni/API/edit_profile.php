<?php
require("connection.php");

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve POST data
    $user_id = $_POST["user_id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $dob = $_POST['dob'];
    $passout_year = $_POST['passout_year'];
    $verification_document = $_FILES['verification_document']['name'];
    $user_pic = $_FILES['user_pic']['name'];
    $user_name = $_POST['user_name'];
    $bio = $_POST['bio'];

    // Check if the user exists
    $checkUserQuery = "SELECT * FROM user WHERE id='$user_id'";
    $checkQuery = mysqli_query($con, $checkUserQuery);
    $rowcount = mysqli_num_rows($checkQuery);

    if ($rowcount > 0) {
        // Update user profile
        $updateQuery = "UPDATE `user` SET 
            `name`='$name',
            `email`='$email',
            `password`='$password',
            `dob`='$dob',
            `passout_year`='$passout_year',
            `verification_document`='$verification_document',
            `user_pic`='$user_pic',
            `username`='$user_name',
            `bio`='$bio'
            WHERE `id`='$user_id'";

        $result = mysqli_query($con, $updateQuery);

        if ($result) {
            // Move uploaded files
            move_uploaded_file($_FILES['verification_document']['tmp_name'], "./verification_document/" . $verification_document);
            move_uploaded_file($_FILES['user_pic']['tmp_name'], "./user_pic/" . $user_pic);

            $response['message'] = "Profile updated successfully";
        } else {
            $response['message'] = "Failed to update profile";
        }
    } else {
        $response['message'] = "User not found";
    }
} else {
    $response['message'] = "Invalid request method";
}

echo json_encode($response);
?>
