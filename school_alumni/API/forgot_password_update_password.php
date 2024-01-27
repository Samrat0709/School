<?php
include('connection.php');
$response = [];

$email = $_POST["email"];
$password = $_POST["password"];

// Update the user's password in the database
$sql = "UPDATE `user` SET password='$password' WHERE email='$email'";
$res = mysqli_query($con, $sql);

if ($res) {
    $response['success'] = true;
    $response['message'] = "Password updated successfully";
} else {
    $response['success'] = false;
    $response['message'] = "Error updating password";
}

echo json_encode($response);
?>
