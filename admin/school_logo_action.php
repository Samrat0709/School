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
    $id=$_SESSION['UID'];


    // Insert data into the database
    $sql = "UPDATE `school_details` SET `school_logo`='$folder' where school_id='$id'";

    if ($con->query($sql) === TRUE) {
        move_uploaded_file($tempname, $folder);
        ?>
           <script>
            // Wait for the document to be fully loaded
            document.addEventListener("DOMContentLoaded", function() {
                // Use SweetAlert for success message
                Swal.fire({
                    icon: "success",
                    title: "School Logo Update Successful",
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = "navbar.php";
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


if (isset($_POST['submit1'])) {
    // Retrieve form data
    $filename = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = "school_logo/" . $filename;
    $id=$_SESSION['UID'];


    // Insert data into the database
    $sql = "UPDATE `school_details` SET `school_logo_two`='$folder' where school_id='$id'";

    if ($con->query($sql) === TRUE) {
        move_uploaded_file($tempname, $folder);
        ?>
           <script>
            // Wait for the document to be fully loaded
            document.addEventListener("DOMContentLoaded", function() {
                // Use SweetAlert for success message
                Swal.fire({
                    icon: "success",
                    title: "School Logo Update Successful",
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = "navbar.php";
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



if (isset($_POST['submit3'])) {
    // Retrieve form data
    $name=$_POST['name'];
    $id=$_SESSION['UID'];


    // Insert data into the database
    $sql = "UPDATE `school_details` SET `school_name`='$name' where school_id='$id'";

    if ($con->query($sql) === TRUE) {
        ?>
           <script>
            // Wait for the document to be fully loaded
            document.addEventListener("DOMContentLoaded", function() {
                // Use SweetAlert for success message
                Swal.fire({
                    icon: "success",
                    title: "School Name Update Successful",
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = "navbar.php";
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
