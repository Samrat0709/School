<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php

include('../config/db_con.php');

  $id=$_GET['id'];
  $deletequery="delete from `subject_list` where id='$id'";
  $query=mysqli_query($con,$deletequery);
  
  if($query)
  {
      ?>
         <script>
            // Wait for the document to be fully loaded
            document.addEventListener("DOMContentLoaded", function() {
                // Use SweetAlert for success message
                Swal.fire({
                    icon: "success",
                    title: "Delete Subject Successful",
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = "academic.php";
                });
            });
        </script>
      <?php
  }
  else
  {
      ?>
         <script>
            // Wait for the document to be fully loaded
            document.addEventListener("DOMContentLoaded", function() {
                // Use SweetAlert for success message
                Swal.fire({
                    icon: "error",
                    title: "Banner Subject Failed !!",
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = "academic.php";
                });
            });
        </script>
      <?php
  }
?>