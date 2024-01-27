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


// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $subjectName = $_POST['subjectName'];
    $class = $_POST['class'];
    $id=$_SESSION['UID'];

    // Insert data into the database
    $sql = "INSERT INTO `subject_list`(`id`, `class`, `subject`, `school_id`) VALUES ('','$class','$subjectName','$id')";

    if ($con->query($sql) === TRUE) {
        ?>
           <script>
            // Wait for the document to be fully loaded
            document.addEventListener("DOMContentLoaded", function() {
                // Use SweetAlert for success message
                Swal.fire({
                    icon: "success",
                    title: "Subject add Successful",
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = "academic.php";
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
