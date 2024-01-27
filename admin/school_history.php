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
    $history = mysqli_real_escape_string($con,$_POST['history']);
    $id=$_SESSION['UID'];


    // Insert data into the database
    $sql = "UPDATE `about` SET `school_history`='$history' WHERE school_id='$id'";

    if ($con->query($sql) === TRUE) {
        ?>
          <script>
            // Wait for the document to be fully loaded
            document.addEventListener("DOMContentLoaded", function() {
                // Use SweetAlert for success message
                Swal.fire({
                    icon: "success",
                    title: "History Details Saved Successful",
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = "about.php";
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




// mission
if (isset($_POST['submit_mission'])) {
    // Retrieve form data
    $mission = mysqli_real_escape_string($con,$_POST['mission']);
    $id=$_SESSION['UID'];


    // Insert data into the database
    $sql = "UPDATE `about` SET `mission`='$mission' WHERE school_id='$id'";

    if ($con->query($sql) === TRUE) {
        ?>
          <script>
            // Wait for the document to be fully loaded
            document.addEventListener("DOMContentLoaded", function() {
                // Use SweetAlert for success message
                Swal.fire({
                    icon: "success",
                    title: "School Mission Details Saved Successful",
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = "about.php";
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




// values
if (isset($_POST['submit_values'])) {
    // Retrieve form data
    $values = mysqli_real_escape_string($con,$_POST['values']);
    $id=$_SESSION['UID'];


    // Insert data into the database
    $sql = "UPDATE `about` SET `s_values`='$values' WHERE school_id='$id'";

    if ($con->query($sql) === TRUE) {
        ?>
          <script>
            // Wait for the document to be fully loaded
            document.addEventListener("DOMContentLoaded", function() {
                // Use SweetAlert for success message
                Swal.fire({
                    icon: "success",
                    title: "School Values Details Saved Successful",
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = "about.php";
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



// Community
if (isset($_POST['submit_community'])) {
    // Retrieve form data
    $community = mysqli_real_escape_string($con,$_POST['community']);
    $id=$_SESSION['UID'];


    // Insert data into the database
    $sql = "UPDATE `about` SET `community`='$community' WHERE school_id='$id'";

    if ($con->query($sql) === TRUE) {
        ?>
          <script>
            // Wait for the document to be fully loaded
            document.addEventListener("DOMContentLoaded", function() {
                // Use SweetAlert for success message
                Swal.fire({
                    icon: "success",
                    title: "School community Details Saved Successful",
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = "about.php";
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



// img
if (isset($_POST['submit_img'])) {
    // Retrieve form data
    $filename = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = "about_img/" . $filename;
    $id=$_SESSION['UID'];


    // Insert data into the database
    $sql = "UPDATE `about` SET `about_img`='$folder' WHERE school_id='$id'";

    if ($con->query($sql) === TRUE) {
        move_uploaded_file($tempname, $folder);
        ?>
          <script>
            // Wait for the document to be fully loaded
            document.addEventListener("DOMContentLoaded", function() {
                // Use SweetAlert for success message
                Swal.fire({
                    icon: "success",
                    title: "School About Image Saved Successful",
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = "about.php";
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
