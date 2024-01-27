<?php
require("connection.php");

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve POST data
    $user_id = $_POST["user_id"];
    $post_id = $_POST["post_id"];

    // Check if the user has already liked the post
    $checkLikeQuery = "SELECT * FROM like_post WHERE user_id='$user_id' AND post_id='$post_id'";
    $checkLikeResult = mysqli_query($con, $checkLikeQuery);
    $likeCount = mysqli_num_rows($checkLikeResult);

    if ($likeCount <= 0) {
        // User has not liked the post, so add a new like
        $insertLikeQuery = "INSERT INTO `like_post`(`user_id`, `post_id`, `like_count`) VALUES ('$user_id', '$post_id', '1')";
        $insertLikeResult = mysqli_query($con, $insertLikeQuery);

        if ($insertLikeResult) {
            // Update total_like in post table
            $updatePostQuery = "UPDATE `post` SET `total_like` = `total_like` + 1 WHERE `id` = '$post_id'";
            $updatePostResult = mysqli_query($con, $updatePostQuery);

            if ($updatePostResult) {
                $response['message'] = "Like added successfully";
            } else {
                $response['message'] = "Failed to update total_like in post table";
            }
        } else {
            $response['message'] = "Failed to add like";
        }
    } else {
        // User has already liked the post
        $response['message'] = "User has already liked the post";
    }
} else {
    $response['message'] = "Invalid request method";
}

echo json_encode($response);
?>
