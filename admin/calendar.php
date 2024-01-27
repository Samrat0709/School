<?php include './components/head.php' ?>
<?php include './components/scripts.php' ?>
<?php include './components/styles.php' ?>



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

<style>
      

        form {
            font-family: 'Poppins',sans-serif;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            gap: 1rem
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        #image-preview {
            max-width: 100%;
            max-height: 200px;
            margin-top: 16px;
        }</style>

<div id="container">

    <?php include './components/sidebar.php' ?>
    <div id="calendar">
        <div class="top-text">
            <h2>Calendar</h2>
            <h3>Railway High School Admission Procedure</h3>
        </div>
        <!--<div class="middle-container">-->
        <!--    <div class="box cal-box1">-->
        <!--        <?php include './components/event.php' ?>-->
        <!--    </div>-->
        <!--    <div class=" cal-box2">-->
        <!--        <div class="top"><img src="./src/img/cal.svg" alt=""></div>-->
        <!--        <div class="bottom">-->
        <!--            <h4>Quote of the Day</h4><img src="./src/img/cal-qoute.svg" alt="">-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <div class="onThisDay">
            <h3>On This Day</h3>
            <form action="calender_action.php" method="POST" id="imageForm" enctype="multipart/form-data">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" accept="image/*" onchange="previewImage()">
                
                <label for="Date">Date:</label>
                <input type="date" id="Date" name="dates">
    
                <label for="title">Title:</label>
                <input type="text" id="title" name="title">
                
                <label for="description">Description:</label>
                <input type="text" id="description" name="desc">
    
                <div id="image-preview"></div>
    
                <input type="submit" name="submit" class="btn btn-success" value="Submit"/>
            </form>
        </div>
        <div class="table table-responsive" style="width: 100% ; padding: 1rem">
            <table id="myTable_3" class="table table-bordered  ">
                <thead>
                    <th>#</th>
                    <th>Image</th>
                    <th>Date</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </thead>
                
                <tbody>
                    <?php
                        $ret = mysqli_query($con, "select * from `on_this_day` order by id desc ");
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($ret)) {
                    ?>
                    <tr>
                        <td><?php echo $cnt; ?></td>
                        <td><img src="./<?php echo $row['img'] ?>" /></td>
                        <td><?php echo $row['dates'] ?></td>
                        <td><?php echo $row['title'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                        <td><a href="on_this_day_delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger" >Delete</a></td>
                    </tr>
                    <?php
                        $cnt = $cnt + 1;
                        }
                    ?>
                </tbody>
            </table>
            <script>
                let table_3 = new DataTable('#myTable_3');
            </script>
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
</div>

 <script>
        function previewImage() {
            var input = document.getElementById('image');
            var preview = document.getElementById('image-preview');

            preview.innerHTML = '';

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    var img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '100%';
                    img.style.maxHeight = '200px';
                    preview.appendChild(img);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>








