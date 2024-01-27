<?php
include('connection.php');

$response = array(); // Initialize an empty array for the response

// Check if email and OTP are set in the POST request
if (isset($_POST['email']) && isset($_POST['otp'])) {
    $email = $_POST['email'];
    $otp = $_POST['otp'];

    // Check if the email exists in the user table
    $checkEmailQuery = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($con, $checkEmailQuery);

    if (mysqli_num_rows($result) > 0) {
        // Email exists, proceed with sending OTP
        $from = "";
        $to = "$email";
        $subject = "OTP";
        $message = "Here Is your OTP for Forgot Password " . $otp;
        $headers = "FROM:" . $from;

        if (mail($to, $subject, $message, $headers)) {
            $response['success'] = true;
            $response['message'] = "OTP Sent Successfully";
        } else {
            $response['success'] = false;
            $response['message'] = "OTP Sent Failed";
        }
    } else {
        // Email does not exist in the user table
        $response['success'] = false;
        $response['message'] = "Email not found in the user database";
    }
} else {
    $response['success'] = false;
    $response['message'] = "Email and OTP not provided in the request";
}

// Output the JSON response
echo json_encode($response);
?>
