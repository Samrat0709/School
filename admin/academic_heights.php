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
if (isset($_POST['submit_academic'])) {
    // Retrieve form data
    $filename = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = "student_image/" . $filename;
    $name = $_POST['name'];
    $percentage = $_POST['percentage'];
    $category = $_POST['category'];
    $sports_name = $_POST['sports_name'];
    $extra_curricular_name = $_POST['extra_curricular_name'];
    $id=$_SESSION['UID'];


    // Insert data into the database
    $sql = "INSERT INTO `academic_heights`(`id`, `student_image`, `student_name`, `percentage`, `category`, `school_id`,`sports_name`,`extra_curricular_name`) VALUES ('','$folder','$name','$percentage','$category','$id','$sports_name','$extra_curricular_name')";

    if ($con->query($sql) === TRUE) {
        move_uploaded_file($tempname, $folder);
        ?>
          <script>
            // Wait for the document to be fully loaded
            document.addEventListener("DOMContentLoaded", function() {
                // Use SweetAlert for success message
                Swal.fire({
                    icon: "success",
                    title: "Details Saved Successful",
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
