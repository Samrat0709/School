<?php include './components/head.php' ?>
<?php include './components/scripts.php' ?>
<?php include './components/styles.php' ?>
<?php include 'C:\xampp\htdocs\projects\school\config\db_con.php' ?>


<!--php End-->


<div class="talks">

    <h2>They talk about us</h2>
    <div class="slider-container-talks">
    <div class="swiper mySwiper" id="talks-slider">
        <div class="swiper-wrapper">
            <?php
            $ret = mysqli_query($con,"select * from `reviews`  order by id desc ");
            $cnt = 1;
            while ($row = mysqli_fetch_array($ret)) {
            ?>
                <div class="swiper-slide">
                    <div class="slide">
                        <div class="left">
                            <div class="img-container">
                                <img src="./admin/<?php echo $row['user_image'] ?>" alt="">
                            </div>
                        </div>
                        <div class="right">
                            <h4><?php echo $row['title'] ?></h4>
                            <p><?php echo $row['review'] ?></p>
                                <div class="name">
                                    <h5><?php echo $row['name_of_reviewer'] ?></h5>
                                    <h6><?php echo $row['qualification'] ?></h6>
                            </div>
                        </div>
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
</div>







<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper("#talks-slider", {
      pagination: {
        el: ".swiper-pagination",
        type: "fraction",
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>