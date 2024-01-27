<?php
require("connection.php");

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve POST data
    $user_id = $_POST["user_id"];
    $post_id = $_POST["post_id"];
    $comment = $_POST["comment"];
    date_default_timezone_set('Asia/Kolkata');
    $date=date('Y-m-d');

    // Add a new comment
    $insertCommentQuery = "INSERT INTO `comment_post`(`user_id`, `post_id`, `comment`, `created_at`) VALUES ('$user_id', '$post_id', '$comment', '$date')";
    $insertCommentResult = mysqli_query($con, $insertCommentQuery);

    if ($insertCommentResult) {
        // Update total_comment in post table
        $updatePostQuery = "UPDATE `post` SET `total_comment` = `total_comment` + 1 WHERE `id` = '$post_id'";
        $updatePostResult = mysqli_query($con, $updatePostQuery);

        if ($updatePostResult) {
            $response['message'] = "Comment added successfully";
        } else {
            $response['message'] = "Failed to update total_comment in post table";
        }
    } else {
        $response['message'] = "Failed to add comment";
    }
} else {
    $response['message'] = "Invalid request method";
}

echo json_encode($response);
?>
