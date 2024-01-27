<!--php Start-->

<?php
 session_start();
 include('../config/db_con.php');
 if(!isset($_SESSION['UID']))
 {
     
    header('location:index.php');
    die();
 }
 $id=$_SESSION['UID'];
?>

<!--php End-->


<?php include './components/head.php' ?>
<?php include './components/scripts.php' ?>
<?php include './components/styles.php' ?>
<style>
    #image-input6 {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    #custom-button6 {
        border-radius: 12.055px;
        border: 0.753px solid rgba(255, 255, 255, 0.59);
        background: rgba(255, 255, 255, 0.24);
        backdrop-filter: blur(10px);
        color: #FFF;
        font-family: 'Mont-light', sans-serif;
        font-size: 1.1rem;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        text-transform: capitalize;
    }

    .text {
        position: relative;
        height: 150px;
    }

    .text2 {
        height: 75px;
    }

    .text textarea,
    .text input {
        padding: 1rem;
        width: 100%;
        height: 100%;
        border-radius: 16px;
        border: 0.5px solid rgba(0, 0, 0, 0.30);
        background: #FFF;
        box-shadow: 2px 2px 4px 0px rgba(0, 0, 0, 0.25);
        color: #000;
        font-family: 'Poppins', sans-serif;
        font-size: 1.1rem;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .text label {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #000;
        font-family: 'Poppins', sans-serif;
        font-size: 1.1rem;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        text-transform: capitalize;
        display: flex;
        width: max-content;
        gap: 1rem;
        align-items: center;

    }

    .right form {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
    .slides {
        display: flex;
        flex-direction: column;
    }
</style>




<div class="talks">

    <h2>They talk about us</h2>
    <div class="slides">
        <!--<div class="left">-->
        <!--    <form id="upload-form" enctype="multipart/form-data">-->
        <!--        <div id="upload-container">-->
        <!--            <label for="image-input6" id="custom-button6">-->
        <!--                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" fill="none">-->
        <!--                    <path d="M16 0.5C7.1635 0.5 0 7.6635 0 16.5C0 25.337 7.1635 32.5 16 32.5C24.837 32.5 32 25.337 32 16.5C32 7.6635 24.837 0.5 16 0.5ZM16 30.5315C8.2805 30.5315 2 24.2195 2 16.4999C2 8.78044 8.2805 2.49994 16 2.49994C23.7195 2.49994 30 8.78047 30 16.4999C30 24.2194 23.7195 30.5315 16 30.5315ZM23 15.5H17V9.5C17 8.948 16.552 8.5 16 8.5C15.448 8.5 15 8.948 15 9.5V15.5H9C8.448 15.5 8 15.948 8 16.5C8 17.052 8.448 17.5 9 17.5H15V23.5C15 24.052 15.448 24.5 16 24.5C16.552 24.5 17 24.052 17 23.5V17.5H23C23.552 17.5 24 17.052 24 16.5C24 15.948 23.552 15.5 23 15.5Z" fill="white" />-->
        <!--                </svg>-->
        <!--                Change image-->
        <!--            </label>-->
        <!--            <input type="file" id="image-input6" accept="image/*" onchange="previewImage6()" style="opacity: 0;" />-->
        <!--        </div>-->
        <!--        <div class="img-container" id="img-container6">-->
        <!--            <img id="default-image6" src="./src/img/person3.webp" alt="" style="max-width: 100%; max-height: 100%;">-->
        <!--        </div>-->
        <!--    </form>-->
        <!--</div>-->
        <div class="right">
            <form action="reviews_action.php" method="POST" enctype="multipart/form-data">
                <div class="text">
                    <label for="noticeText7">
                        Write Heding of Review or highlight a line as a heading of review
                    </label>
                    <textarea  id="noticeText7" name="heading" rows="5" cols="50" ></textarea>
                </div>
                <div class="text">
                    <label for="noticeText8">
                        Write the Review
                    </label>
                    <textarea id="noticeText8" name="message" rows="5" cols="50" ></textarea>
                </div>
                <div class="text text2">
                    <label for="noticeText9">
                        Write the name of Reviewer
                    </label>
                    <input id="noticeText9" name="user_name" rows="5" cols="50"  />
                </div>
                <div class="text text2">
                    <label for="noticeText10">
                        Write his qualifications
                    </label>
                    <input id="noticeText10" name="qualification" rows="5" cols="50" />
                </div>
                <div class="text text2">
                    <label for="noticeText10">
                        image of the reviewer
                    </label>
                    <input type='file' id="noticeText10" name="image" rows="5" cols="50"  />
                </div>
                
                
                
                <input type="submit"  class=" btn btn-success" name="submit_review" id="submit_btn">
                
            </form>
        </div>
       
        <?php
            $ret = mysqli_query($con,"select * from `reviews` where schol_id='$id' order by id desc ");
            $cnt = 1;
            while ($row = mysqli_fetch_array($ret)) {
        ?>
            <div class="slide">
                            <div class="left">
                                <div class="img-container">
                                    <img src="<?php echo $row['user_image'] ?>" alt="">
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







<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
</script>

<script>
    function previewImage6() {
        var input = document.getElementById('image-input6');
        var preview = document.getElementById('img-container6');
        var defaultImage = document.getElementById('default-image6');

        while (preview.firstChild) {
            preview.removeChild(preview.firstChild);
        }

        var file = input.files[0];
        if (file) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth = '100%';
                img.style.maxHeight = '100%';
                preview.appendChild(img);
            };

            reader.readAsDataURL(file);
        } else {
            // If no file is selected, show the default image
            preview.appendChild(defaultImage.cloneNode(true));
        }
    }
</script>

<script>
    document.getElementById('text-input').addEventListener('focus', function() {
        document.querySelector('label[for="text-input"]').style.display = 'none';
    });

    document.getElementById('text-input').addEventListener('blur', function() {
        if (!this.value.trim()) {
            document.querySelector('label[for="text-input"]').style.display = 'block';
        }
    });
</script>