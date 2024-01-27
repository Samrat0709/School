<?php
     session_start();
     include('../config/db_con.php');
     if(!isset($_SESSION['UID']))
     {
         
        header('location:index.php');
        die();
     }

?>

<?php include './components/head.php' ?>
<?php include './components/scripts.php' ?>
<?php include './components/styles.php' ?>



<div id="container">
    <?php include './components/sidebar.php' ?>
    <div id="index">
        <div class="index-item">
            <ul>
                <li><a href="#">Edit Website</a></li>
                <li><a href="#">Add notice</a></li>
                <li><a href="#">Add Events</a></li>
                <li><a href="#">Add Events</a></li>
            </ul>
        </div>
    </div>
</div>