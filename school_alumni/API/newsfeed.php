<?php
include('connection.php');
$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM post order by id desc";
    $res = mysqli_query($con, $sql);
    $count = mysqli_num_rows($res);

    if ($count > 0) {
        $arra = array();
        while ($row = mysqli_fetch_assoc($res)) {
            // Fetch all fields for each post
            $arra[] = $row;
        }
        $response['message'] = "Posts fetched successfully";
        $response['posts'] = $arra;
    } else {
        $response['message'] = "No posts found";
    }
} else {
    $response['message'] = "Invalid request method";
}

echo json_encode($response);
?>
