<?php
include('connection.php');
$msg = '';
$arra = [];
$response = [];

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM user WHERE (email='$username' OR username='$username') AND password='$password'";
$res = mysqli_query($con, $sql);
$count = mysqli_num_rows($res);

if ($count > 0) {
    $row = mysqli_fetch_assoc($res);
    if ($row['status'] == 'Approved') {
        // Fetch all fields for the user
        $arra = $row;
        $response['message'] = "Login successful";
        $response['user'] = $arra;
    } else {
        $response['message'] = "Account Verification is Still Pending";
    }
} else {
    $response['message'] = "Invalid username and password";
}

echo json_encode($response);
?>
