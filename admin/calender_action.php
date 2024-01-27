<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<?php
// Assuming you have a database connection file (db_connection.php)
 include('../config/db_con.php');

// Check if the form is submitted for image
if (isset($_POST['submit'])) {
    // Retrieve form data
    $filename = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = "special_day/" . $filename;
    $phone = $_POST['phone'];
    $dates = $_POST['dates'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];


    // Insert data into the database
    $sql = "INSERT INTO `on_this_day`(`id`, `img`, `dates`, `title`, `description`) VALUES ('','$folder','$dates','$title','$desc')";

    if ($con->query($sql) === TRUE) {
        move_uploaded_file($tempname, $folder);
        ?>
           <script>
            // Wait for the document to be fully loaded
            document.addEventListener("DOMContentLoaded", function() {
                // Use SweetAlert for success message
                Swal.fire({
                    icon: "success",
                    title: "On this Day Details Update Successful.",
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = "calendar.php";
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
