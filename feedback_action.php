<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<?php
// Assuming you have a database connection file (db_connection.php)
 include('./config/db_con.php');

// Check if the form is submitted for image
if (isset($_POST['submit'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];


    // Insert data into the database
    $sql = "INSERT INTO `feedback`(`id`, `name`, `email`, `phone`, `subject`, `message`) VALUES ('','$name','$email','$phone','$subject','$message')";

    if ($con->query($sql) === TRUE) {
        move_uploaded_file($tempname, $folder);
        ?>
           <script>
            // Wait for the document to be fully loaded
            document.addEventListener("DOMContentLoaded", function() {
                // Use SweetAlert for success message
                Swal.fire({
                    icon: "success",
                    title: "Thank You for Your Valuable Feedback.",
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = "contact.php";
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
