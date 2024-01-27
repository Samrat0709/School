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
    $date = $_POST['date'];
    $time = $_POST['time'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $id=$_SESSION['UID'];
    date_default_timezone_set('Asia/Kolkata');
    $dates=date('Y-m-d');

    // Insert data into the database
    $sql = "INSERT INTO `event_notice`(`id`, `school_id`, `event_date`, `event_time`, `event_title`, `event_description`, `register_date`) VALUES ('','$id','$date','$time','$title','$description','$dates')";

    if ($con->query($sql) === TRUE) {
        ?>
           <script>
            // Wait for the document to be fully loaded
            document.addEventListener("DOMContentLoaded", function() {
                // Use SweetAlert for success message
                Swal.fire({
                    icon: "success",
                    title: "Event Add Successful",
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
