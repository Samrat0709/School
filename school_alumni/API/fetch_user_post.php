<?php
include('connection.php');
$msg = '';
$arra = [];
$response = [];

$user_id = $_POST["user_id"];

$sql = "SELECT * FROM post WHERE user_id='$user_id'";
$res = mysqli_query($con, $sql);
$count = mysqli_num_rows($res);

if ($count > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        // Fetch all fields for each post
        $arra[] = $row;
    }
    $response['message'] = "Posts fetched successfully";
    $response['posts'] = $arra;
} else {
    $response['message'] = "No posts found for the user";
}

echo json_encode($response);
?>
