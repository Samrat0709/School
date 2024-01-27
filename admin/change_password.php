<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<?php
// Assuming you have a database connection file (db_connection.php)
session_start();
include('../config/db_con.php');

if (!isset($_SESSION['UID'])) {
    header('location:index.php');
    die();
}

if (isset($_POST['submit'])) {
    $uid = $_SESSION['UID'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    // Check if the password fields are not empty and match
    if (!empty($newPassword) && $newPassword == $confirmPassword) {

        // Update admin password
        $updatePassword = "UPDATE `admin_login` SET `password`='$confirmPassword' WHERE id='$uid'";
        $resultPassword = mysqli_query($con, $updatePassword);

        if ($resultPassword) {
            echo '<script>
                // Wait for the document to be fully loaded
                document.addEventListener("DOMContentLoaded", function() {
                    // Use SweetAlert for success message
                    Swal.fire({
                        icon: "success",
                        title: "Password Change Successful",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        window.location.href = "change_password.php";
                    });
                });
            </script>';
        } else {
            echo '<script>
                // Wait for the document to be fully loaded
                document.addEventListener("DOMContentLoaded", function() {
                    // Use SweetAlert for error message
                    Swal.fire({
                        icon: "error",
                        title: "Password Change Failed",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        window.location.href = "change_password.php";
                    });
                });
            </script>';
        }
    }
}
?>

 
 <?php include './components/head.php' ?>
<?php include './components/scripts.php' ?>
<?php include './components/styles.php' ?>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .change-password-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        label {
            display: block;
            font-family: 'Poppins',sans-serif;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            padding: 10px;
            border: none;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .change-password-form {
            width: calc(100vw - 200px);
            height: 100vh;
            overflow: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            flex-direction: column;
            gap: 1rem;
            font-family: 'Poppins',sans-serif;
            
        }
        .change-password-form form{
            display: flex;
            flex-direction: column;
            gap: 1rem;
            width: 40%;
            
        }
            </style>
    <title>Change Password</title>
</head>
<body>
    
    <div id="container">
        <?php include './components/sidebar.php' ?>
        <div class="change-password-form">
        <h2>Change Password</h2>
        <form action="" method="POST">
            <label for="newPassword">New Password:</label>
            <input type="password" id="newPassword" name="newPassword" required>

            <label for="confirmPassword">Confirm Password:</label>
            <input type="text" id="confirmPassword" name="confirmPassword" required>

            <input type="submit" value="Change password" name="submit">
        </form>
    </div>
    </div>
    
</body>
</html>
