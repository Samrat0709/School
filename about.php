<?php include './components/head.php' ?>
<?php include './components/scripts.php' ?>
<?php include './components/styles.php' ?>
<?php include './config/db_con.php'?>

<?php include './components/navbar.php' ?>


<?php
    $sql_text=mysqli_fetch_array(mysqli_query($con,"select * from about where school_id='1'"));
?>

<div id="about">
    <div class="top-text">
        <h2>ABOUT US</h2>
    </div>
    <div class="text">
        <h3>Our School's History</h3>
        
        <p><?php echo $sql_text['school_history'] ?></p>
    </div>
    <div class="about-qoute">
        <div class="txt">
            <span>"Exploring Our Legacy:</span>
            <span>Discovering the Rich History of</span>
            <span>Railway Higher Secondary</span>
            <span>School Alipurduar Junction</span>
        </div>
        <div class="img-container" style="height: 80vh">
            <img src="./admin/<?php echo $sql_text['about_img'] ?>" style="height: 100%" alt="">
        </div>
        
    </div>
    <div id="legacy-container">
        <div class="items">
            <?php
                $ret = mysqli_query($con, "select * from `school_legacy` order by id desc LIMIT 5 ");
                $cnt = 1;
                while ($row = mysqli_fetch_array($ret)) {
                ?>
                <div class="item">
                    <div class="text"><span><?php echo $row['year'] ?></span>
                        <h4><?php echo $row['heading'] ?></h4>
                        <p><?php echo $row['description'] ?></p>
                    </div>
                    <div class="img">
                        <img src="./admin/<?php echo $row['upload_img'] ?>" alt="">
                    </div>
                </div>
                <?php
                    $cnt = $cnt + 1;
                    }
                ?>
        </div>
        <div class="middle">
            <img src="./src/img/circle-line.svg" alt="">
        </div>
        <div class="banner">
            <img src="./src/img/legacy.svg" alt="">
        </div>
    </div>
    <!--<div class="mission">-->
    <!--    <div class="text">-->
    <!--        <h3>Our Mission statement</h3>-->
    <!--        <p><?php echo $sql_text['mission'] ?></p>-->
    <!--    </div>-->
    <!--    <div class="img-container">-->
    <!--        <img src="./src/img/middle.webp" alt="">-->
    <!--    </div>-->
    <!--</div>-->
    <!--<div id="values-container">-->
    <!--    <div class="text">-->
    <!--        <h3>Our Values </h3>-->
    <!--        <p><?php echo $sql_text['s_values'] ?></p>-->
    <!--    </div>-->
    <!--    <div class="values">-->
    <!--        <div class="value">-->
    <!--            <div class="img-container">-->
    <!--                <img src="./src/img/diagnosis.svg" alt="">-->
    <!--            </div>-->
    <!--            <div class="value-text">-->
    <!--                <h5>Diagnosis</h5>-->
    <!--                <p>About you, your customer &amp; marketplace</p>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="value">-->
    <!--            <div class="img-container">-->
    <!--                <img src="./src/img/research.svg" alt="">-->
    <!--            </div>-->
    <!--            <div class="value-text">-->
    <!--                <h5>Research</h5>-->
    <!--                <p>Competitive analysis and long term goals.</p>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="value">-->
    <!--            <div class="img-container">-->
    <!--                <img src="./src/img/protyping.svg" alt="">-->
    <!--            </div>-->
    <!--            <div class="value-text">-->
    <!--                <h5>Prototyping</h5>-->
    <!--                <p>creating initial idea of brand</p>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="value">-->
    <!--            <div class="img-container">-->
    <!--                <img src="./src/img/design.svg" alt="">-->
    <!--            </div>-->
    <!--            <div class="value-text">-->
    <!--                <h5>Design</h5>-->
    <!--                <p>Designing &amp; Development</p>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="value">-->
    <!--            <div class="img-container">-->
    <!--                <img src="./src/img/evolution.svg" alt="">-->
    <!--            </div>-->
    <!--            <div class="value-text">-->
    <!--                <h5>Evolution</h5>-->
    <!--                <p>feedback &amp; analysis</p>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <div id="community-container">
        <div class="text">
            <h3>Managing community</h3>
            <p><?php echo $sql_text['community'] ?></p>
        </div>
        <div class="community">
            <div class="principle people">
                <div class="txt">
                    <h4>Principal</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, diam eget varius bibendum, velit elit </p>
                    <h5>Contact details : 9234234230 <br> Mail id : xyz@gmail.com</h5>
                </div>
                <?php 
                    $row=mysqli_fetch_array(mysqli_query($con,"select * from `staff_details` where designation='Principal'  order by id desc "));
                ?>
                   
                    <div class="person">
                        <div class="img-container">
                            <img src="./admin/<?php echo $row['teacher_image'] ?>" alt="Staff Image" style=" width: 100%; height: 100%;">
                        </div>
                        <div class="person-text">
                            <h5><?php echo $row['teacher_name'] ?></h5>
                            <h6><?php echo $row['teacher_qualification'] ?></h6>
                        </div>
                    </div>
            </div>
            <div class="teachers people">
                <div class="txt">
                    <h4>Teachers</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, diam eget varius bibendum, velit elit </p>
                    <h5>Contact details : 9234234230 <br> Mail id : xyz@gmail.com</h5>
                </div>


                <div class="slider-container">
                    <div class="swiper mySwiper" id="acaswiper">
                        <div class="swiper-wrapper">
                            <?php
                                $ret = mysqli_query($con, "select * from `staff_details` where designation='teacher'  order by id desc ");
                                                $cnt = 1;
                                                while ($row = mysqli_fetch_array($ret)) {
                            ?>
                            
                            <div class="swiper-slide">
                                <div class="person">
                                    <div class="img-container">
                                        <img src="./admin/<?php echo $row['teacher_image'] ?>" alt="Staff Image" style=" width: 100%; height: 100%;">
                                    </div>
                                    <div class="person-text">
                                        <h5><?php echo $row['teacher_name'] ?></h5>
                                        <h6><?php echo $row['teacher_qualification'] ?></h6>
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
            <div class="staffs people">
                <div class="txt">
                    <h4>Staffs</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, diam eget varius bibendum, velit elit </p>
                    <h5>Contact details : 9234234230 <br> Mail id : xyz@gmail.com</h5>
                </div>
                <div class="slider-container">
                    <div class="swiper mySwiper" id="acaswiper">
                        <div class="swiper-wrapper">
                            <?php
                                $ret = mysqli_query($con, "select * from `staff_details` where designation='Lab_assistants'  order by id desc ");
                                                $cnt = 1;
                                                while ($row = mysqli_fetch_array($ret)) {
                            ?>
                            
                            <div class="swiper-slide">
                                <div class="person">
                                    <div class="img-container" >
                                        <img src="./admin/<?php echo $row['teacher_image'] ?>" alt="Staff Image" style=" width: 100%; height: 100%;">
                                    </div>
                                    <div class="person-text">
                                        <h5><?php echo $row['teacher_name'] ?></h5>
                                        <h6><?php echo $row['teacher_qualification'] ?></h6>
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
            <div class="others people">
                <div class="txt">
                    <h4>Others</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, diam eget varius bibendum, velit elit </p>
                    <h5>Contact details : 9234234230 <br> Mail id : xyz@gmail.com</h5>
                </div>
                <div class="slider-container">
                    <div class="swiper mySwiper" id="acaswiper">
                        <div class="swiper-wrapper">
                             <?php
                                $ret = mysqli_query($con, "select * from `staff_details` where designation='Group_B'  order by id desc ");
                                                $cnt = 1;
                                                while ($row = mysqli_fetch_array($ret)) {
                            ?>
                            
                            <div class="swiper-slide">
                                <div class="person">
                                    <div class="img-container" >
                                        <img src="./admin/<?php echo $row['teacher_image'] ?>" alt="Staff Image" style=" width: 100%; height: 100%;">
                                    </div>
                                    <div class="person-text">
                                        <h5><?php echo $row['teacher_name'] ?></h5>
                                        <h6><?php echo $row['teacher_qualification'] ?></h6>
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
    </div>
    <!--<div id="blue-box">-->
    <!--    <div class="items">-->
    <!--        <div class="item">-->
    <!--            <h4>100+</h4>-->
    <!--            <h6>Number of Community members</h6>-->
    <!--        </div>-->
    <!--        <div class="item">-->
    <!--            <h4>50+</h4>-->
    <!--            <h6>Number of posts by our Community members</h6>-->
    <!--        </div>-->
    <!--        <div class="item">-->
    <!--            <h4>40+</h4>-->
    <!--            <h6>Number of events by our Community members</h6>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    
</div>


<?php include './components/footer.php' ?>



<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->

<script>
    var swiper = new Swiper("#acaswiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
        },
    });
</script>