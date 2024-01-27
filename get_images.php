<?php
// get_images.php

// Include your database connection code here (e.g., include('../admin/config/dbcon.php'))
include('config/db_con.php');

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$occasion = isset($_POST['occasion']) ? mysqli_real_escape_string($con, $_POST['occasion']) : null;
$year = isset($_POST['year']) ? mysqli_real_escape_string($con, $_POST['year']) : null;

$query = "SELECT * FROM `gallery` WHERE year='$year' AND occation='$occasion'";
$result = mysqli_query($con, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        echo '<div class="swiper mySwiper">';
        echo '<div class="swiper-wrapper">';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="swiper-slide">';
            echo '<img src="/admin/' . $row['picture'] . '" alt="">';
            echo '</div>';
        }
        echo '</div>';
        echo '<div class="swiper-button-next"></div>';
        echo '<div class="swiper-button-prev"></div>';
        echo '</div>';
    } else {
        echo "No images found for the specified occasion and year.";
    }
} else {
    echo "Error in executing query: " . mysqli_error($con);
}

mysqli_close($con);
?>
