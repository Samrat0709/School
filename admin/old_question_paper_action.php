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
    $class = $_POST['class'];
    $year = $_POST['year'];
    $id=$_SESSION['UID'];

    // Handle file uploads
    $pdf = $_FILES['pdfFiles']['name'];
    $targetfolder = "uploads_old_question_paper/";
    $targetfolder = $targetfolder . basename($pdf) ;

    // Insert data into the database
    $sql = "INSERT INTO `previous_year_question_paper`(`id`, `pdf`, `class`, `year`, `school_id`) VALUES ('','$pdf','$class','$year','$id')";

    if ($con->query($sql) === TRUE) {
        move_uploaded_file($_FILES['pdfFiles']['tmp_name'], $targetfolder);
        ?>
          <script>
            // Wait for the document to be fully loaded
            document.addEventListener("DOMContentLoaded", function() {
                // Use SweetAlert for success message
                Swal.fire({
                    icon: "success",
                    title: "Delete Notice Successful",
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
