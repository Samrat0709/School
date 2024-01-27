<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<?php
// Assuming you have a database connection file (db_connection.php)
 include('../config/db_con.php');

// Check if the form is submitted for image
if (isset($_POST['submit'])) {
    // Retrieve form data
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $twitter = $_POST['twitter'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $other_link = $_POST['other_link'];


    // Insert data into the database
    $sql = "UPDATE `footer` SET `address`='$address',`email`='$email',`mobile`='$phone',`twitter`='$twitter',`facebook`='$facebook',`instagram`='$instagram',`other_link`='$other_link' WHERE id='1'";

    if ($con->query($sql) === TRUE) {
        move_uploaded_file($tempname, $folder);
        ?>
           <script>
            // Wait for the document to be fully loaded
            document.addEventListener("DOMContentLoaded", function() {
                // Use SweetAlert for success message
                Swal.fire({
                    icon: "success",
                    title: "Footer Details Update Successful.",
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = "footer.php";
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
