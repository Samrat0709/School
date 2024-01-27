<?php include './components/head.php' ?>
<?php include './components/scripts.php' ?>
<?php include './components/styles.php' ?>
<?php include("./config/db_con.php"); ?>



<?php include './components/navbar.php' ?>

<div id="home">
   <div class="top-img">
        <div class="swiper mySwiper" id="top">
            <div class="swiper-wrapper">
                        <?php
                            $ret = mysqli_query($con,"select * from `banner`  order by id desc ");
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($ret)) {
                        ?>
                            <div class="swiper-slide">
                                <div class="img-container">
                                    <img src="./admin/<?php echo $row['banner'] ?>" alt="">
                                </div>
                            </div>
                 
                        <?php
                            $cnt = $cnt + 1;
                            }
                        ?>
                
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
        
    </div>
    <div class="box-container">
        <div class="box">
            <?php include './components/event.php' ?>
        </div>
        <div class="box">
                <div class="head">
                    <h4>Notice</h4>
                </div>
                <div class="line"></div>
                <div class="content">
                    <?php
                                $ret = mysqli_query($con,"select * from `notice`  order by id desc LIMIT 4");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($ret)) {
                            ?>
                                <div class="item">
                                        <div class="left">
                                            <p><?php echo $row['notice_text'] ?> </p>
                                            <div class="download">
                                                <a href="./admin/notice/<?php echo $row['notice_pdf']; ?>" target="_blank">
                                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="download" class="svg-inline--fa fa-download " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                    <path fill="currentColor" d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"></path>
                                                    </svg>
                                                    <h5>Download now</h5>
                                                </a>
                                                
                                            </div>
                                        </div>
                                        
                                       
                
                                    </div>
                                    <hr>
                            <?php
                                $cnt = $cnt + 1;
                                }
                            ?>
                    
                    

                </div>
            </div>
    </div>
    <div id="professor">
         <?php 
                   $sql_text=mysqli_fetch_array(mysqli_query($con,"select * from principal where school_id='1'"));
                ?>
        <img src="./src/img/yellow_box.webp" alt="" class="yellow">
        <div class="left">
            <div class="img-container">
                <img src="./admin/<?php echo $sql_text['principal_image'] ?>" alt="">
            </div>
        </div>
        <div class="right">
            <div class="icons">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="70" viewBox="0 0 36 70" fill="none">
                    <path d="M35.2653 14.1484C30.3673 14.1484 26.6939 15.8333 24.2449 19.2033C21.9592 22.5733 20.8163 27.9652 20.8163 35.3791H36V69.5H0V42.456C0 27.9652 2.69388 17.3498 8.08163 10.6099C13.6327 3.86996 22.6939 0.5 35.2653 0.5V14.1484Z" fill="#001FC1"></path>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="70" viewBox="0 0 36 70" fill="none">
                    <path opacity="0.2" d="M35.2653 14.1484C30.3673 14.1484 26.6939 15.8333 24.2449 19.2033C21.9592 22.5733 20.8163 27.9652 20.8163 35.3791H36V69.5H0V42.456C0 27.9652 2.69388 17.3498 8.08163 10.6099C13.6327 3.86997 22.6939 0.5 35.2653 0.5V14.1484Z" fill="#0F27FF"></path>
                </svg>
            </div>
            <div class="para">
                <p><?php echo $sql_text['message'] ?></p>
            </div>
            <div class="details">
                <div class="img-container" style="width: 40%">
                    <img src="./admin/<?php echo $sql_text['sign'] ?>" alt="" >
                </div>
                
                <h3><?php echo $sql_text['principal_name'] ?></h3>
                <h5><?php echo $sql_text['qualification'] ?></h5>
            </div>
        </div>
    </div>
    <div class="about-scl">
        <img src="./src/img/blue_box.webp" alt="" class="blue">
        <div class="left">
            <h3>Our School's History</h3>
            <p><?php echo $sql_text['school_history'] ?></p>
            <a href="https://drive.google.com/file/d/13gmkY3FmcV45C3rnfCAvqys3RzQcAUO3/view" target="_blank">Read more
                <span>
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-up-right-from-square" class="svg-inline--fa fa-arrow-up-right-from-square " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32h82.7L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3V192c0 17.7 14.3 32 32 32s32-14.3 32-32V32c0-17.7-14.3-32-32-32H320zM80 32C35.8 32 0 67.8 0 112V432c0 44.2 35.8 80 80 80H400c44.2 0 80-35.8 80-80V320c0-17.7-14.3-32-32-32s-32 14.3-32 32V432c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16H192c17.7 0 32-14.3 32-32s-14.3-32-32-32H80z"></path>
                    </svg>
                </span>
            </a>
        </div>
        <div class="right">
            <div class="img-container">
                <img src="./admin/<?php echo $sql_text['school_image'] ?>" alt="">
            </div>
        </div>
    </div>
    <!--<div class="numbers">-->
    <!--    <img src="./src/img/dots.webp" alt="" class="dots">-->
    <!--    <img src="./src/img/numbers.webp" alt="" class="circle">-->
    <!--    <div class="number">-->
    <!--        <h3>100+</h3>-->
    <!--        <p>TOP RANKERS</p>-->
    <!--    </div>-->
    <!--    <div class="number">-->
    <!--        <h3>100+</h3>-->
    <!--        <p>OLYMPIADS</p>-->
    <!--    </div>-->
    <!--    <div class="number">-->
    <!--        <h3>100+</h3>-->
    <!--        <p>ALUMNI NETWORK</p>-->
    <!--    </div>-->
    <!--</div>-->
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
                                    <img src="./admin/<?php echo $row['student_image'] ?>" alt="Student Image" style=" width: 100%; height: 100%; border-radius: 50% ;">
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
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 40,
            },
        },
    });
</script>



<script>
    var swiper = new Swiper("#top", {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
        dynamicBullets: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>