<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<?php
// Assuming you have a database connection file (db_connection.php)
 session_start();
 include('../config/db_con.php');
 if(!isset($_SESSION['UID']))
 {
     
    header('location:index.php');
    die();
 }


// Check if the form is submitted for image
if (isset($_POST['submit_review'])) {
    // Retrieve form data
    $filename = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = "review_user_image/" . $filename;
    $heading = mysqli_real_escape_string($con,$_POST['heading']);
    $message = mysqli_real_escape_string($con,$_POST['message']);
    $user_name = mysqli_real_escape_string($con,$_POST['user_name']);
    $qualification = mysqli_real_escape_string($con,$_POST['qualification']);
    $id=$_SESSION['UID'];


    // Insert data into the database
    $sql = "INSERT INTO `reviews`(`id`, `title`, `review`, `name_of_reviewer`, `qualification`, `user_image`, `schol_id`) VALUES ('','$heading','$message','$user_name','$qualification','$folder','$id')";

    if ($con->query($sql) === TRUE) {
        move_uploaded_file($tempname, $folder);
        ?>
           <script>
            // Wait for the document to be fully loaded
            document.addEventListener("DOMContentLoaded", function() {
                // Use SweetAlert for success message
                Swal.fire({
                    icon: "success",
                    title: "Review add Successful",
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = "home.php";
                });
            });
        </script>
        <?php
       
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
    
}


?>
