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
if (isset($_POST['submit_faculty'])) {
    // Retrieve form data
    $filename = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = "teacher_image/" . $filename;
    $name = $_POST['name'];
    $qualification = $_POST['qualification'];
    $designation = $_POST['designation'];
    $id=$_SESSION['UID'];


    // Insert data into the database
    $sql = "INSERT INTO `staff_details`(`id`, `school_id`, `teacher_image`, `teacher_name`, `teacher_qualification`, `designation`) VALUES ('','$id','$folder','$name','$qualification','$designation')";

    if ($con->query($sql) === TRUE) {
        move_uploaded_file($tempname, $folder);
        ?>
           <script>
            // Wait for the document to be fully loaded
            document.addEventListener("DOMContentLoaded", function() {
                // Use SweetAlert for success message
                Swal.fire({
                    icon: "success",
                    title: "Staff add Successful",
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = "faculty.php";
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
