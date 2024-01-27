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
    $address = $_POST['address'];
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    $number3 = $_POST['number3'];
    $email = $_POST['email'];
    $whatsapp = $_POST['whatsapp'];
    $id=$_SESSION['UID'];

    // Insert data into the database
    $sql = "UPDATE `admin_login` SET `phone`='$number1',`email`='$email',`address`='$address',`whatsapp_number`='$whatsapp',`official_contact_number_security`='$number2',`official_contact_number_administration`='$number3' WHERE id='$id'";

    if ($con->query($sql) === TRUE) {
        ?>
           <script>
            // Wait for the document to be fully loaded
            document.addEventListener("DOMContentLoaded", function() {
                // Use SweetAlert for success message
                Swal.fire({
                    icon: "success",
                    title: "Contact details save Successful",
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
