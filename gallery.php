<?php include './components/head.php' ?>
<?php include './components/scripts.php' ?>
<?php include './components/styles.php' ?>
<?php include './config/db_con.php'?>
<?php include './components/navbar.php' ?>

<div id="gallery">
    <div class="gal-head">
        <h2>Gallery</h2>
    </div>
    <div id="gallery-img">
        <div class="frame1">
            <?php
            $ret = mysqli_query($con, "SELECT * FROM `gallery` ORDER BY id DESC LIMIT 2 ");
            while ($row = mysqli_fetch_array($ret)) {
                ?>
                <div class="img-container">
                    <img src="./admin/<?php echo $row['picture'] ?>" />
                </div>
            <?php
            }
            ?>
        </div>
        <div class="frame2">
            <?php
            $ret = mysqli_query($con, "SELECT * FROM `gallery` ORDER BY id DESC LIMIT 1 OFFSET 2 ");
            while ($row = mysqli_fetch_array($ret)) {
                ?>
                <div class="img-container">
                    <img src="./admin/<?php echo $row['picture'] ?>" />
                </div>
            <?php
            }
            ?>
        </div>
        <div class="frame3">
            <?php
            $ret = mysqli_query($con, "SELECT * FROM `gallery` ORDER BY id DESC LIMIT 4 OFFSET 3 ");
            while ($row = mysqli_fetch_array($ret)) {
                ?>
                <div class="img-container">
                    <img src="./admin/<?php echo $row['picture'] ?>" />
                </div>
            <?php
            }
            ?>
        </div>
        <div class="frame4">
            <?php
            $ret = mysqli_query($con, "SELECT * FROM `gallery` ORDER BY id DESC LIMIT 2 OFFSET 7 ");
            while ($row = mysqli_fetch_array($ret)) {
                ?>
                <div class="img-container">
                    <img src="./admin/<?php echo $row['picture'] ?>" />
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="event-buttons">
        <form action="#" method="POST">
            <div class="gal-drop">
                <label for="year_drop">Select Year:</label>
                <select id="year_drop" name="year">
                    <option>Select Year</option>
                    <?php
                        $ret = mysqli_query($con, "SELECT * FROM `gallery` GROUP BY `year` ORDER BY `id` DESC;");
                        while ($row = mysqli_fetch_array($ret)) {
                    ?>
                        <option value="<?php echo $row['year'] ?>"><?php echo $row['year'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            
            <div class="gal-drop">
                <label for="occasion">Select Occasion:</label>
                <select id="occasion" name="occasion">
                    <option>Select Occasion</option>
                   <?php
                        $ret = mysqli_query($con, "SELECT * FROM `gallery` GROUP BY `occation` ORDER BY `id` DESC;");
                        while ($row = mysqli_fetch_array($ret)) {
                    ?> 
                    <option value="<?php echo $row['occation'] ?>"><?php echo $row['occation'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <input type="submit" class=" btn btn-success" value="Search" name="submit">
        </form>
    </div>
    
    <div class="event-slider">
        <div class="text">
            
            <h3><?php echo $row['occation'] ?></h3>
        </div>
        <div id="image-container" style="width: 100%">
             <div class="swiper mySwiper" id="gal-swiper">
                <div class="swiper-wrapper">
                    <?php
                        // Assuming $con is your database connection
                        
                        if (isset($_POST['submit'])) {
                            $selectedYear = $_POST['year'];
                            $selectedOccasion = $_POST['occasion'];
                        
                            $query = "SELECT * FROM `gallery` WHERE `year` = '$selectedYear' AND `occation` = '$selectedOccasion' ORDER BY `id` DESC;";
                            $result = mysqli_query($con, $query);
                        
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    // Display images in a loop
                                    echo '<div class="swiper-slide">';
                                   echo '<img src="./admin/' . $row['picture'] . '" alt="">';
                                    echo '</div>';
                                }
                            } else {
                                // Display a message if no images found
                                echo '<p>No images found for the selected criteria.</p>';
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include './components/footer.php' ?>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->

<script>
    var swiper = new Swiper("#gal-swiper", {
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
</script>

<script>
    // Function to change the style of the clicked button
    function changeStyle(clickedButton) {
        var buttons = document.querySelectorAll('.default-button');
        buttons.forEach(function (button) {
            button.classList.remove('active-button');
        });
        clickedButton.classList.add('active-button');

        // Load images based on the selected occasion and year
        var occasion = document.querySelector('.default-button1.active-button1');
        var year = clickedButton.textContent;
        loadImages(occasion, year);
    }
</script>

<script>
    // Function to change the style of the clicked button
    function changeStyle1(clickedButton) {
        var buttons = document.querySelectorAll('.default-button1');
        buttons.forEach(function (button) {
            button.classList.remove('active-button1');
        });
        clickedButton.classList.add('active-button1');

        // Load images based on the selected occasion and year
        var occasion = clickedButton.textContent;
        var year = document.querySelector('.default-button.active-button');
        loadImages(occasion, year);
    }
</script>



<script>
    // Function to change the style of the clicked button
    function changeStyle(clickedButton) {
        var buttons = document.querySelectorAll('.default-button');
        buttons.forEach(function (button) {
            button.classList.remove('active-button');
        });
        clickedButton.classList.add('active-button');

        // Load images based on the selected occasion and year
        var occasion = getActiveButton('.default-button1');
        var year = clickedButton.textContent;
        loadImages(occasion, year);
    }

    // Function to change the style of the clicked button
    function changeStyle1(clickedButton) {
        var buttons = document.querySelectorAll('.default-button1');
        buttons.forEach(function (button) {
            button.classList.remove('active-button1');
        });
        clickedButton.classList.add('active-button1');

        // Load images based on the selected occasion and year
        var occasion = clickedButton.textContent;
        var year = getActiveButton('.default-button').textContent;
        loadImages(occasion, year);
    }

    // Helper function to get the active button
    function getActiveButton(selector) {
        var activeButton = document.querySelector(selector + '.active-button1');
        return activeButton || document.querySelector(selector + '.active-button');
    }
</script>



</body>

</html>
