<?php
require("connection.php");

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve POST data
    $user_id = $_POST["user_id"];
    $content_heading = $_POST["content_heading"];

    // File upload
    $content = $_FILES['content']['name'];
    $imagePaths = "./content/" . $content;

    // Set timezone
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d');

    // Insert new post
    $insertQuery = "INSERT INTO `post`(`user_id`, `content_heading`, `content`, `created_at`) 
                    VALUES ('$user_id','$content_heading','$content','$date')";
    $result = mysqli_query($con, $insertQuery);

    if ($result) {
        // Move uploaded file
        move_uploaded_file($_FILES['content']['tmp_name'], $imagePaths);
        $response['message'] = "Post created successfully";
    } else {
        $response['message'] = "Post creation failed!";
    }
} else {
    $response['message'] = "Invalid request method";
}

echo json_encode($response);
?>
