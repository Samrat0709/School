<?php include './components/head.php' ?>
<?php include './components/scripts.php' ?>
<?php include './components/styles.php' ?>
<?php include("./config/db_con.php"); ?>

<?php include './components/navbar.php' ?>

<div id="achievements">
    <div class="upper">
        <div class="text">
            <h2>ACHIEVEMENTS</h2>
            <p>Welcome to Railway HS School's brilliant Minds Dive into the charismatic world of our incredible Students.</p>
        </div>
        <img src="./src/img/achievements.webp" alt="" class="achievement">
    </div>
    <div class="academic">
        <h3>ACADEMIC HEIGHTS</h3>
        <div class="students">
            <div class="swiper mySwiper" id="acaswiper">
                <div class="swiper-wrapper">
                    <?php
                        $ret = mysqli_query($con, "select * from `academic_heights` where category='academics' order by id desc ");
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($ret)) {
                    ?>
                    <div class="swiper-slide">
                        <div class="student">
                            <div class="img-container">
                                <img src="./admin/<?php echo $row['student_image'] ?>" alt="Student Image" style=" width: 100%; height: 100%; border-radius: 50%">
                            </div>
                            <div class="text">
                                <h4><?php echo $row['student_name'] ?></h4>
                                <h5><?php echo $row['percentage']; echo "%";  ?></h5>
                            </div>
                        </div>
                    </div>
                    <?php
                        $cnt = $cnt + 1;
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="numbers">
        <img src="./src/img/dots.webp" alt="" class="dots">
        <img src="./src/img/numbers.webp" alt="" class="circle">
        <div class="number">
            <h3>100+</h3>
            <p>TOP RANKERS</p>
        </div>
        <div class="number">
            <h3>100+</h3>
            <p>OLYMPIADS</p>
        </div>
        <div class="number">
            <h3>100+</h3>
            <p>ALUMNI NETWORK</p>
        </div>
    </div>
    <div class="events-container">
        <div class="sports">
            <h3>SPORTS MAESTRO</h3>
            <div class="students">
                <div class="swiper mySwiper" id="acaswiper">
                    <div class="swiper-wrapper">
                        <?php
                            $ret = mysqli_query($con, "select * from `academic_heights` where category='sports' order by id desc ");
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($ret)) {
                        ?>
                        <div class="swiper-slide">
                                <div class="student">
                                    <div class="img-container">
                                        <img src="./admin/<?php echo $row['student_image'] ?>" alt="Staff Image" style=" width: 100%; height: 100%; border-radius: 50%">
                                    </div>
                                    <div class="text">
                                        <h4><?php echo $row['student_name'] ?></h4>
                                        <h5><?php echo $row['sports_name']; ?></h5>
                                    </div>
                                </div>
                        </div>
                        <?php
                                $cnt = $cnt + 1;
                                }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="extra-curricular">
            <h3>EXTRA CURRICULAR</h3>
            <div class="students" style="width: 100%;">
                <div class="swiper mySwiper" id="acaswiper">
                    <div class="swiper-wrapper">
                            <?php
                                $ret = mysqli_query($con, "select * from `academic_heights` where category='Extra_curricular' order by id desc ");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($ret)) {
                            ?>
                            <div class="swiper-slide">
                                    <div class="student">
                                        <div class="img-container">
                                            <img src="./admin/<?php echo $row['student_image'] ?>" alt="Student Image" style=" width: 100%; height: 100%; border-radius: 50%">
                                        </div>
                                        <div class="text">
                                            <h4><?php echo $row['student_name'] ?></h4>
                                            <h5><?php echo $row['extra_curricular_name'];  ?></h5>
                                        </div>
                                    </div>    
                            </div>
                            
                            <?php
                                $cnt = $cnt + 1;
                                }
                            ?>
                    </div>

                </div>
            </div>
        </div>
        <div class="qoute">
            <div class="text">
                <h2>"</h2>
                <p>Unleash Your Potential: Celebrating Excellence in School Sports!"</p>
            </div>
        </div>
    </div>    
    <div class="sports-container">
        <h3>SPORTS EVENTS</h3>
        <div class="events">
            <div class="event-left">
                
               <?php
                    $ret = mysqli_query($con, "select * from `events` order by id desc limit 1 ");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($ret)) {
                ?>
                
                <div class="event">
                    <img src="./admin/<?php echo $row['event_image'] ?>" alt="Student Image" style=" width: 100%; height: auto;">
                    <div class="text">
                        <h4><?php echo $row['event_name'] ?></h4>
                        <h5><?php echo $row['event_date'] ?></h5>
                    </div>
                </div>
                
                <?php
                    $cnt = $cnt + 1;
                    }
                ?>
                
                
                
            </div>
            <div class="event-right">
                <?php
    $ret = mysqli_query($con, "SELECT * FROM `events` ORDER BY id DESC LIMIT 4 OFFSET 1");
    $cnt = 1;

    while ($row = mysqli_fetch_array($ret)) {
?>
    <div class="event">
        <img src="./admin/<?php echo $row['event_image'] ?>" alt="Event Image" style="width: 100%; height: auto;">
        <div class="text">
            <h4><?php echo $row['event_name'] ?></h4>
            <h5><?php echo $row['event_date'] ?></h5>
        </div>
    </div>
<?php
    $cnt = $cnt + 1;
    }
?>

                
                
            </div>
        </div>
        <h3>SPORTS MOMENTS</h3>
        <div class="moments">
            <div class="top-container">
                <?php
                $ret = mysqli_query($con, "SELECT * FROM `album` ORDER BY id DESC LIMIT 3");
                $cnt = 1;
                while ($row = mysqli_fetch_array($ret)) {
                ?>
                    <div class="col">
                        <img src="./admin/<?php echo $row['album_image'] ?>" alt="Album Image" style="width: 100%; height: auto;">
                    </div>
                <?php
                    $cnt = $cnt + 1;
                }
                ?>
            </div>
            <div class="bottom">
                <div class="events">
                    <div class="event-left">
                        <?php
                        // Fetch only the fourth album for event-left
                        $ret = mysqli_query($con, "SELECT * FROM `album` ORDER BY id DESC LIMIT 1 OFFSET 3");
                        $row = mysqli_fetch_array($ret);
                        ?>
                        <div class="event"><img src="./admin/<?php echo $row['album_image'] ?>" alt="Album Image"></div>
                    </div>
                    <div class="event-right">
                        <?php
                        // Fetch the next set of albums
                        $ret = mysqli_query($con, "SELECT * FROM `album` ORDER BY id DESC LIMIT 4 OFFSET 6");
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($ret)) {
                        ?>
                            <div class="event"><img src="./admin/<?php echo $row['album_image'] ?>" alt="Album Image"></div>
                        <?php
                            $cnt = $cnt + 1;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include './components/footer.php' ?>


<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->

<script>
    var swiper = new Swiper("#acaswiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 40,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 50,
            },
        },
    });
</script>