<?php include './components/head.php' ?>
<?php include './components/scripts.php' ?>
<?php include './components/styles.php' ?>
<?php include("./config/db_con.php"); ?>

<?php include './components/navbar.php' ?>

<?php

// API endpoint URL
$apiEndpoint = "https://api.quotable.io/random";

// Make an HTTP request to the API
$response = file_get_contents($apiEndpoint);

// Check if the request was successful
if ($response === FALSE) {
    die('Error fetching data from the API');
}

// Decode the JSON response
$data = json_decode($response, true);

// Check if the decoding was successful
if ($data === NULL) {
    die('Error decoding JSON');
}

// Get the quote text
$quoteText = $data['content'];

// Output the quote
// echo $quoteText;

?>


<div id="calendar">
    <div class="top-text">
        <h2>Calendar</h2>
        <h3>Railway High School Admission Procedure</h3>
    </div>
    <div class="middle-container">
        <div class="box cal-box1">
            <?php include './components/event.php' ?>
        </div>
        <div class=" cal-box2">
            <!--<div class="top"><img src="./src/img/cal.svg" alt=""></div>-->
            <div class="bottom">
                <h4>Quote of the Day</h4>
                <div class="qoute-container">
                    <h5><?php echo $quoteText; ?></h5>
                    <img src="./src/img/bg.png" alt="">
                </div>
                
            </div>
        </div>
    </div>
    <div class="onThisDay">
        <h3>On This Day</h3>
        <div class="event-conatiner">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php
                        $ret = mysqli_query($con, "select * from `on_this_day` order by id desc ");
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($ret)) {
                    ?>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-top">
                                <div class="top-left">
                                <span>
                                    <?php
                                        $dateString = $row['dates'];
                                        
                                        // Convert the date string to a DateTime object
                                        $date = new DateTime($dateString);
                                        
                                        // Extract the month name and date
                                        $monthName = $date->format('F'); // 'F' format specifier returns the full month name
                                        $day = $date->format('j');       // 'j' format specifier returns the day of the month without leading zeros
                                        
                                        // Output the month name and date
                                       echo $monthName . ' ' . $day;
                                    ?>

                                </span>
                                <span>
                                    <?php
                                        $dateString = $row['dates'];
                                        
                                        // Convert the date string to a DateTime object
                                        $date = new DateTime($dateString);
                                        
                                        // Extract the year from the DateTime object
                                        $year = $date->format('Y');
                                        
                                        // Output the year
                                        echo $year;
                                    ?>
                                </span></div>
                                <!--<div class="top-right">-->
                                <!--    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" class="svg-inline--fa fa-heart " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">-->
                                <!--        <path fill="currentColor" d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"></path>-->
                                <!--    </svg><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="share-nodes" class="svg-inline--fa fa-share-nodes " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">-->
                                <!--        <path fill="currentColor" d="M352 224c53 0 96-43 96-96s-43-96-96-96s-96 43-96 96c0 4 .2 8 .7 11.9l-94.1 47C145.4 170.2 121.9 160 96 160c-53 0-96 43-96 96s43 96 96 96c25.9 0 49.4-10.2 66.6-26.9l94.1 47c-.5 3.9-.7 7.8-.7 11.9c0 53 43 96 96 96s96-43 96-96s-43-96-96-96c-25.9 0-49.4 10.2-66.6 26.9l-94.1-47c.5-3.9 .7-7.8 .7-11.9s-.2-8-.7-11.9l94.1-47C302.6 213.8 326.1 224 352 224z"></path>-->
                                <!--    </svg>-->
                                <!--</div>-->
                            </div>
                            <div class="card-bottom">
                                <div class="img-container">
                                    <img src="./admin/<?php echo $row['img'] ?>" />
                                </div>
                                <div class="text">
                                    <h4><?php echo $row['title'] ?></h4>
                                    <p><?php echo $row['description'] ?></p>
                                </div>
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
    <!--<div class="birthday">-->
    <!--    <h3>Birthdays</h3>-->
    <!--    <div class="birthday-container">-->
    <!--        <div class="swiper mySwiper">-->
    <!--            <div class="swiper-wrapper">-->
    <!--                <div class="swiper-slide">-->
    <!--                    <div class="birthday-card">-->
    <!--                        <div class="img-container"><img src="./src/img/student.webp" alt=""></div>-->
    <!--                        <div class="b-card">-->
    <!--                            <div class="name">-->
    <!--                                <h5>Subhranil Maity</h5><span>4th July,1999</span>-->
    <!--                            </div>-->
    <!--                            <div class="wish">-->
    <!--                                <p>Happy birthday! I wanted to take this opportunity to congratulate you on all your hard work and dedication. You are a shining star in our school community, and we are so proud of you.</p>-->
    <!--                                <p>I know that you have a bright future ahead of you, and I can't wait to see what you accomplish. Wishing you all the best on your birthday!</p>-->
    <!--                            </div>-->
    <!--                            <div class="share-icons"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" class="svg-inline--fa fa-heart " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">-->
    <!--                                    <path fill="currentColor" d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"></path>-->
    <!--                                </svg><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="share-nodes" class="svg-inline--fa fa-share-nodes " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">-->
    <!--                                    <path fill="currentColor" d="M352 224c53 0 96-43 96-96s-43-96-96-96s-96 43-96 96c0 4 .2 8 .7 11.9l-94.1 47C145.4 170.2 121.9 160 96 160c-53 0-96 43-96 96s43 96 96 96c25.9 0 49.4-10.2 66.6-26.9l94.1 47c-.5 3.9-.7 7.8-.7 11.9c0 53 43 96 96 96s96-43 96-96s-43-96-96-96c-25.9 0-49.4 10.2-66.6 26.9l-94.1-47c.5-3.9 .7-7.8 .7-11.9s-.2-8-.7-11.9l94.1-47C302.6 213.8 326.1 224 352 224z"></path>-->
    <!--                                </svg></div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="send-buttons">-->
    <!--                        <button class="msg-btn">Send messege</button>-->
    <!--                        <button class="gift">Send a gift</button>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="swiper-slide">-->
    <!--                    <div class="birthday-card">-->
    <!--                        <div class="img-container"><img src="./src/img/student.webp" alt=""></div>-->
    <!--                        <div class="b-card">-->
    <!--                            <div class="name">-->
    <!--                                <h5>Subhranil Maity</h5><span>4th July,1999</span>-->
    <!--                            </div>-->
    <!--                            <div class="wish">-->
    <!--                                <p>Happy birthday! I wanted to take this opportunity to congratulate you on all your hard work and dedication. You are a shining star in our school community, and we are so proud of you.</p>-->
    <!--                                <p>I know that you have a bright future ahead of you, and I can't wait to see what you accomplish. Wishing you all the best on your birthday!</p>-->
    <!--                            </div>-->
    <!--                            <div class="share-icons"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" class="svg-inline--fa fa-heart " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">-->
    <!--                                    <path fill="currentColor" d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"></path>-->
    <!--                                </svg><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="share-nodes" class="svg-inline--fa fa-share-nodes " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">-->
    <!--                                    <path fill="currentColor" d="M352 224c53 0 96-43 96-96s-43-96-96-96s-96 43-96 96c0 4 .2 8 .7 11.9l-94.1 47C145.4 170.2 121.9 160 96 160c-53 0-96 43-96 96s43 96 96 96c25.9 0 49.4-10.2 66.6-26.9l94.1 47c-.5 3.9-.7 7.8-.7 11.9c0 53 43 96 96 96s96-43 96-96s-43-96-96-96c-25.9 0-49.4 10.2-66.6 26.9l-94.1-47c.5-3.9 .7-7.8 .7-11.9s-.2-8-.7-11.9l94.1-47C302.6 213.8 326.1 224 352 224z"></path>-->
    <!--                                </svg></div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="send-buttons">-->
    <!--                        <button class="msg-btn">Send messege</button>-->
    <!--                        <button class="gift">Send a gift</button>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="swiper-slide">-->
    <!--                    <div class="birthday-card">-->
    <!--                        <div class="img-container"><img src="./src/img/student.webp" alt=""></div>-->
    <!--                        <div class="b-card">-->
    <!--                            <div class="name">-->
    <!--                                <h5>Subhranil Maity</h5><span>4th July,1999</span>-->
    <!--                            </div>-->
    <!--                            <div class="wish">-->
    <!--                                <p>Happy birthday! I wanted to take this opportunity to congratulate you on all your hard work and dedication. You are a shining star in our school community, and we are so proud of you.</p>-->
    <!--                                <p>I know that you have a bright future ahead of you, and I can't wait to see what you accomplish. Wishing you all the best on your birthday!</p>-->
    <!--                            </div>-->
    <!--                            <div class="share-icons"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" class="svg-inline--fa fa-heart " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">-->
    <!--                                    <path fill="currentColor" d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"></path>-->
    <!--                                </svg><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="share-nodes" class="svg-inline--fa fa-share-nodes " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">-->
    <!--                                    <path fill="currentColor" d="M352 224c53 0 96-43 96-96s-43-96-96-96s-96 43-96 96c0 4 .2 8 .7 11.9l-94.1 47C145.4 170.2 121.9 160 96 160c-53 0-96 43-96 96s43 96 96 96c25.9 0 49.4-10.2 66.6-26.9l94.1 47c-.5 3.9-.7 7.8-.7 11.9c0 53 43 96 96 96s96-43 96-96s-43-96-96-96c-25.9 0-49.4 10.2-66.6 26.9l-94.1-47c.5-3.9 .7-7.8 .7-11.9s-.2-8-.7-11.9l94.1-47C302.6 213.8 326.1 224 352 224z"></path>-->
    <!--                                </svg></div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="send-buttons">-->
    <!--                        <button class="msg-btn">Send messege</button>-->
    <!--                        <button class="gift">Send a gift</button>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="swiper-slide">-->
    <!--                    <div class="birthday-card">-->
    <!--                        <div class="img-container"><img src="./src/img/student.webp" alt=""></div>-->
    <!--                        <div class="b-card">-->
    <!--                            <div class="name">-->
    <!--                                <h5>Subhranil Maity</h5><span>4th July,1999</span>-->
    <!--                            </div>-->
    <!--                            <div class="wish">-->
    <!--                                <p>Happy birthday! I wanted to take this opportunity to congratulate you on all your hard work and dedication. You are a shining star in our school community, and we are so proud of you.</p>-->
    <!--                                <p>I know that you have a bright future ahead of you, and I can't wait to see what you accomplish. Wishing you all the best on your birthday!</p>-->
    <!--                            </div>-->
    <!--                            <div class="share-icons"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" class="svg-inline--fa fa-heart " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">-->
    <!--                                    <path fill="currentColor" d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"></path>-->
    <!--                                </svg><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="share-nodes" class="svg-inline--fa fa-share-nodes " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">-->
    <!--                                    <path fill="currentColor" d="M352 224c53 0 96-43 96-96s-43-96-96-96s-96 43-96 96c0 4 .2 8 .7 11.9l-94.1 47C145.4 170.2 121.9 160 96 160c-53 0-96 43-96 96s43 96 96 96c25.9 0 49.4-10.2 66.6-26.9l94.1 47c-.5 3.9-.7 7.8-.7 11.9c0 53 43 96 96 96s96-43 96-96s-43-96-96-96c-25.9 0-49.4 10.2-66.6 26.9l-94.1-47c.5-3.9 .7-7.8 .7-11.9s-.2-8-.7-11.9l94.1-47C302.6 213.8 326.1 224 352 224z"></path>-->
    <!--                                </svg></div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="send-buttons">-->
    <!--                        <button class="msg-btn">Send messege</button>-->
    <!--                        <button class="gift">Send a gift</button>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="swiper-slide">-->
    <!--                    <div class="birthday-card">-->
    <!--                        <div class="img-container"><img src="./src/img/student.webp" alt=""></div>-->
    <!--                        <div class="b-card">-->
    <!--                            <div class="name">-->
    <!--                                <h5>Subhranil Maity</h5><span>4th July,1999</span>-->
    <!--                            </div>-->
    <!--                            <div class="wish">-->
    <!--                                <p>Happy birthday! I wanted to take this opportunity to congratulate you on all your hard work and dedication. You are a shining star in our school community, and we are so proud of you.</p>-->
    <!--                                <p>I know that you have a bright future ahead of you, and I can't wait to see what you accomplish. Wishing you all the best on your birthday!</p>-->
    <!--                            </div>-->
    <!--                            <div class="share-icons"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" class="svg-inline--fa fa-heart " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">-->
    <!--                                    <path fill="currentColor" d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"></path>-->
    <!--                                </svg><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="share-nodes" class="svg-inline--fa fa-share-nodes " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">-->
    <!--                                    <path fill="currentColor" d="M352 224c53 0 96-43 96-96s-43-96-96-96s-96 43-96 96c0 4 .2 8 .7 11.9l-94.1 47C145.4 170.2 121.9 160 96 160c-53 0-96 43-96 96s43 96 96 96c25.9 0 49.4-10.2 66.6-26.9l94.1 47c-.5 3.9-.7 7.8-.7 11.9c0 53 43 96 96 96s96-43 96-96s-43-96-96-96c-25.9 0-49.4 10.2-66.6 26.9l-94.1-47c.5-3.9 .7-7.8 .7-11.9s-.2-8-.7-11.9l94.1-47C302.6 213.8 326.1 224 352 224z"></path>-->
    <!--                                </svg></div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="send-buttons">-->
    <!--                        <button class="msg-btn">Send messege</button>-->
    <!--                        <button class="gift">Send a gift</button>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
</div>




<?php include './components/footer.php' ?>



<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 40,
            },
            1024: {
                slidesPerView: 2,
                spaceBetween: 50,
            },
        },
    });
</script>