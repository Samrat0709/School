<?php include './components/head.php' ?>
<?php include './components/scripts.php' ?>
<?php include './components/styles.php' ?>

<?php include './config/db_con.php'?>
<?php include './components/navbar.php' ?>



<div id="faculty">
    <div class="top">
        <div class="text">
            <h2>FACULTIES</h2>
            <p>Welcome to Railway HS School's brilliant faculty members! Dive into the charismatic world of our incredible educators and staff. Feel the passion and dedication they share with the students!</p>
        </div>
        <div class="img">
            <img src="./src/img/Vector.svg" alt="">
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
    <div class="teachers-container">
        <div class="teacher-top">
            <h4>PRINCIPAL</h4>
            <h6>Our exceptional teachers ignite the spark of learning and inspire our students to explore, learn, and succeed.</h6>
        </div>
        <div class="teachers">
            <img src="./src/img/box.webp" alt="" class="square">
            <div class="slider-container">
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
        </div>
    </div>
    <div class="teachers-container">
        <div class="teacher-top">
            <h4>TEACHERS</h4>
            <h6>Our exceptional teachers ignite the spark of learning and inspire our students to explore, learn, and succeed.</h6>
        </div>
        <div class="teachers">
            <img src="./src/img/box.webp" alt="" class="square">
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
    </div>
    <div class="lab-container">
        <div class="lab-top">
            <h4>LAB ASSISTANTS</h4>
            <h6>Our skilled and attentive lab assistants play a key role in helping students discover the fascinating world of science through hands-on experiments.</h6>
        </div>
        <div class="lab">
        <img src="./src/img/box.webp" alt="" class="square">
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
    </div>
    <div class="group-container">
        <div class="group-top">
            <h4>GROUP B STAFFS</h4>
            <h6>These dedicated and hardworking staff members are the heart and soul of our school, ensuring a clean, safe, and comfortable environment for all students.</h6>
        </div>
        <div class="group">
        <img src="./src/img/box.webp" alt="" class="square">
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
                slidesPerView: 4,
                spaceBetween: 40,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 50,
            },
        },
    });
</script>