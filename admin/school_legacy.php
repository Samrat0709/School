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
if (isset($_POST['submit'])) {
    // Retrieve form data
    $filename = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = "school_logo/" . $filename;
    $heading=$_POST['heading'];
    $year=$_POST['year'];
    $description=$_POST['description'];
    $id=$_SESSION['UID'];


    // Insert data into the database
    $sql = "INSERT INTO `school_legacy`(`id`, `school_id`, `heading`, `year`, `upload_img`, `description`) VALUES ('','$id','$heading','$year','$folder','$description')";

    if ($con->query($sql) === TRUE) {
        move_uploaded_file($tempname, $folder);
        ?>
           <script>
            // Wait for the document to be fully loaded
            document.addEventListener("DOMContentLoaded", function() {
                // Use SweetAlert for success message
                Swal.fire({
                    icon: "success",
                    title: "School Legacy added Successful",
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = "about.php";
                });
            });
        </script>
        <?php
        
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    // Close the database connection
    $conn->close();
    
}


?>
