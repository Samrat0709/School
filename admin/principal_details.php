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
if (isset($_POST['submit_image'])) {
    // Retrieve form data
    $filename = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = "principle/" . $filename;
    $id=$_SESSION['UID'];


    // Insert data into the database
    $sql = "UPDATE `principal` SET `principal_image`='$folder' where school_id='$id'";

    if ($con->query($sql) === TRUE) {
        move_uploaded_file($tempname, $folder);
        ?>
           <script>
            // Wait for the document to be fully loaded
            document.addEventListener("DOMContentLoaded", function() {
                // Use SweetAlert for success message
                Swal.fire({
                    icon: "success",
                    title: "Image add Successful",
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

// Check if the form is submitted for all text field
if (isset($_POST['submit_details'])) {
    // Retrieve form data
    $noticeText1 = $_POST['noticeText1'];
    $noticeText2 = $_POST['noticeText2'];
    $noticeText3 = $_POST['noticeText3'];
    $noticeText4 = $_POST['noticeText4'];
    $id=$_SESSION['UID'];


    // Insert data into the database
    $sql = "UPDATE `principal` SET `principal_name`='$noticeText2',`message`='$noticeText1',`qualification`='$noticeText3',`school_history`='$noticeText4' where school_id='$id'";

    if ($con->query($sql) === TRUE) {
        ?>
           <script>
            // Wait for the document to be fully loaded
            document.addEventListener("DOMContentLoaded", function() {
                // Use SweetAlert for success message
                Swal.fire({
                    icon: "success",
                    title: "Data add Successful",
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

// Check if the form is submitted for signature
if (isset($_POST['submit_sign'])) {
    // Retrieve form data
    $filename = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = "principle/" . $filename;
    $id=$_SESSION['UID'];


    // Insert data into the database
    $sql = "UPDATE `principal` SET `sign`='$folder' where school_id='$id'";

    if ($con->query($sql) === TRUE) {
        move_uploaded_file($tempname, $folder);
        ?>
           <script>
            // Wait for the document to be fully loaded
            document.addEventListener("DOMContentLoaded", function() {
                // Use SweetAlert for success message
                Swal.fire({
                    icon: "success",
                    title: "Sign add Successful",
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



// Check if the form is submitted for School Image
if (isset($_POST['submit_school_image'])) {
    // Retrieve form data
    $filename = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = "principle/" . $filename;
    $id=$_SESSION['UID'];


    // Insert data into the database
    $sql = "UPDATE `principal` SET `school_image`='$folder' where school_id='$id'";

    if ($con->query($sql) === TRUE) {
        move_uploaded_file($tempname, $folder);
        ?>
          <script>
              alert("School Image Saved Successfully");
          </script>
        <?php
        $URL="home.php";
        echo '<META HTTP-EQUIV="refresh" content="0;URL='.$URL.'">';
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
    
}

















?>
