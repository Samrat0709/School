<?php include './components/head.php' ?>
<?php include './components/scripts.php' ?>
<?php include './components/styles.php' ?>


<div id="container">
    <?php include './components/sidebar.php' ?>
    <div id="achievements">
        <div class="upper">
            <form id="upload-form" method="POST" action="" enctype="multipart/form-data">
                <div id="upload-container-fac">
                    <label for="image-input" id="custom-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" fill="none">
                            <path d="M16 0.5C7.1635 0.5 0 7.6635 0 16.5C0 25.337 7.1635 32.5 16 32.5C24.837 32.5 32 25.337 32 16.5C32 7.6635 24.837 0.5 16 0.5ZM16 30.5315C8.2805 30.5315 2 24.2195 2 16.4999C2 8.78044 8.2805 2.49994 16 2.49994C23.7195 2.49994 30 8.78047 30 16.4999C30 24.2194 23.7195 30.5315 16 30.5315ZM23 15.5H17V9.5C17 8.948 16.552 8.5 16 8.5C15.448 8.5 15 8.948 15 9.5V15.5H9C8.448 15.5 8 15.948 8 16.5C8 17.052 8.448 17.5 9 17.5H15V23.5C15 24.052 15.448 24.5 16 24.5C16.552 24.5 17 24.052 17 23.5V17.5H23C23.552 17.5 24 17.052 24 16.5C24 15.948 23.552 15.5 23 15.5Z" fill="black" />
                        </svg>
                        Change image
                    </label>
                    <input type="file" id="image-input" accept="image/*" onchange="previewImage()" />
                </div>
                <div id="image-preview">
                    <img id="default-image" src="./src/img/top.webp" alt="Default Image" style="max-width: 100%; max-height: 100%;" />
                </div>
            </form>

            <div class="fac_text">
                <form id="fac_text" method="POST" action="">
                    <div class="text-input">
                        <!-- <label for="textInput">Enter Text:</label> -->
                        <textarea type="text" id="textInput" onfocus="clearDefaultText()"></textarea>
                    </div>
                    <div class="chng-btn">
                        <button type="button" onclick="changeDefaultText()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="19" viewBox="0 0 20 19" fill="none">
                                <path d="M6.0415 13.4686L9.53513 13.4567L17.1605 5.90425C17.4597 5.605 17.6244 5.20758 17.6244 4.78483C17.6244 4.36208 17.4597 3.96467 17.1605 3.66542L15.9049 2.40983C15.3064 1.81133 14.2622 1.8145 13.6684 2.40746L6.0415 9.96154V13.4686ZM14.7855 3.52925L16.0434 4.78246L14.7791 6.03488L13.5235 4.78008L14.7855 3.52925ZM7.62484 10.6218L12.3986 5.89317L13.6542 7.14875L8.88121 11.8758L7.62484 11.8798V10.6218Z" fill="black" />
                                <path d="M4.45833 16.625H15.5417C16.4149 16.625 17.125 15.9149 17.125 15.0417V8.1795L15.5417 9.76283V15.0417H6.95842C6.93783 15.0417 6.91646 15.0496 6.89588 15.0496C6.86975 15.0496 6.84363 15.0425 6.81671 15.0417H4.45833V3.95833H9.87888L11.4622 2.375H4.45833C3.58512 2.375 2.875 3.08512 2.875 3.95833V15.0417C2.875 15.9149 3.58512 16.625 4.45833 16.625Z" fill="black" />
                            </svg>
                            Change Text
                        </button>
                    </div>

                </form>
                <script>
                    var defaultText = "Welcome to Railway HS School's brilliant Minds Dive into the charismatic world of our incredible Students.";


                    window.onload = function() {
                        var input = document.getElementById("textInput");
                        input.value = defaultText;
                    };

                    function clearDefaultText() {
                        var input = document.getElementById("textInput");
                        if (input.value === defaultText) {
                            input.value = "";
                        }
                    }

                    function changeDefaultText() {
                        var input = document.getElementById("textInput");
                        if (input.value === "") {
                            input.value = defaultText;
                        }
                    }
                </script>
            </div>
        </div>
        <div class="academic">
            <h3>ACADEMIC HEIGHTS</h3>
            <div class="students">
                <?php include './components/student.php' ?>
            </div>
        </div>
        <div class="sports-container">
            <h3>SPORTS EVENTS</h3>
            <div class="events">
                <div class="event">
                    <div class="top">
                        <form id="upload-form" method="POST" action="insert_event.php" enctype="multipart/form-data">
                            <div id="upload-container-ach">
                                <label for="image-input2" id="custom-button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" fill="none">
                                        <path d="M16 0.5C7.1635 0.5 0 7.6635 0 16.5C0 25.337 7.1635 32.5 16 32.5C24.837 32.5 32 25.337 32 16.5C32 7.6635 24.837 0.5 16 0.5ZM16 30.5315C8.2805 30.5315 2 24.2195 2 16.4999C2 8.78044 8.2805 2.49994 16 2.49994C23.7195 2.49994 30 8.78047 30 16.4999C30 24.2194 23.7195 30.5315 16 30.5315ZM23 15.5H17V9.5C17 8.948 16.552 8.5 16 8.5C15.448 8.5 15 8.948 15 9.5V15.5H9C8.448 15.5 8 15.948 8 16.5C8 17.052 8.448 17.5 9 17.5H15V23.5C15 24.052 15.448 24.5 16 24.5C16.552 24.5 17 24.052 17 23.5V17.5H23C23.552 17.5 24 17.052 24 16.5C24 15.948 23.552 15.5 23 15.5Z" fill="black" />
                                    </svg>
                                    Change image
                                </label>
                                <input type="file" id="image-input2" accept="image/*" name="image" onchange="previewImage2()" required/>
                            </div>
                            <div id="image-preview2" style="width: 800px; height: 800px;">
                                <img id="default-image2" src="./src/img/sport1.webp" alt="Default Image" style="max-width: 100%;aspect-ratio: 1/1;" />
                            </div>
                            <div class="text-event">
                                
                                    
                                    <input type="text" id="event" name="name" placeholder="Write Events name" required>
                                    <input type="date" id="date" name="date" placeholder="Write date" required>
                                    <input type="submit" value="Submit" class="btn btn-success" name="submit_event" id="submit_btn" required>
        
        
                                
                            </div>
                        </form>
                    </div>
                    <div class="table-container">
                        <div class="table table-responsive" style="width: 100%">
                        <table id="myTable5" class="table table-bordered  ">
                            <thead>
                                <th>#</th>
                                <th>Event name</th>
                                <th>Event Image</th>
                                <th>Event date</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                    $ret = mysqli_query($con, "select * from `events` order by id desc ");
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($ret)) {
                                ?>
                                
                                <tr>
                                    <td><?php echo $cnt; ?></td>
                                    <td><?php echo $row['event_name'] ?></td>
                                    <td><img src="<?php echo $row['event_image'] ?>" alt="Staff Image" style=" width: 50px; height: 50px;"></td>
                                    <td><?php echo $row['event_date'] ?></td>
                                    <td><a href="event_delete.php?id=<?php echo $row['id'] ?>">Delete</a></td>
                                </tr>
                                <?php
                                    $cnt = $cnt + 1;
                                    }
                                ?>
                            </tbody>
                        </table>
                            <script>
                                let table5 = new DataTable('#myTable5');
                            </script>
                    </div>
                    </div>
                    

                </div>
            </div>
            <h3>SPORTS MOMENTS</h3>
            <div class="moments">
                <div class="event">
                    <form id="upload-form" method="POST" action="album_action.php" enctype="multipart/form-data">
                        <div id="upload-container-ach">
                            <label for="image-input3" id="custom-button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" fill="none">
                                    <path d="M16 0.5C7.1635 0.5 0 7.6635 0 16.5C0 25.337 7.1635 32.5 16 32.5C24.837 32.5 32 25.337 32 16.5C32 7.6635 24.837 0.5 16 0.5ZM16 30.5315C8.2805 30.5315 2 24.2195 2 16.4999C2 8.78044 8.2805 2.49994 16 2.49994C23.7195 2.49994 30 8.78047 30 16.4999C30 24.2194 23.7195 30.5315 16 30.5315ZM23 15.5H17V9.5C17 8.948 16.552 8.5 16 8.5C15.448 8.5 15 8.948 15 9.5V15.5H9C8.448 15.5 8 15.948 8 16.5C8 17.052 8.448 17.5 9 17.5H15V23.5C15 24.052 15.448 24.5 16 24.5C16.552 24.5 17 24.052 17 23.5V17.5H23C23.552 17.5 24 17.052 24 16.5C24 15.948 23.552 15.5 23 15.5Z" fill="black" />
                                </svg>
                                Add multiple image to create a collage album
                            </label>
                            <input type="file" id="image-input3" accept="image/*" name="image" multiple onchange="previewImage3()" style="opacity: 0;" required />
                            <input type="submit" value="Submit" name="submit_album" class="btn btn-success" id="submit_btn" required>
                        </div>
                        <div id="image-preview3" style="width: 800px; height: 800px;">
                            <img id="default-image3" src="./src/img/sport1.webp" alt="Default Image" style="max-width: 100%; aspect-ratio: 1/1;" />
                        </div>
                        
                    </form>
                </div>
                <div class="table table-responsive" style="width: 100%">
                    <table id="myTable6" class="table table-bordered  ">
                        <thead>
                            <th>#</th>
                            <th>Image</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                                $ret = mysqli_query($con, "select * from `album` order by id desc ");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($ret)) {
                            ?>
                            
                            <tr>
                                <td><?php echo $cnt; ?></td>
                                <td><img src="<?php echo $row['album_image'] ?>" alt="moment Image" style=" width: 70px; aspect-ratio: 1/1;"></td>
                                <td><a href="delete_album.php?id=<?php echo $row['id']?>" class="btn btn-danger">Delete</a></td>
                            </tr>
                            <?php
                                $cnt = $cnt + 1;
                                }
                            ?>
                        </tbody>
                    </table>
                    <script>
                        let table6 = new DataTable('#myTable6');
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>





<script>
    function previewImage2() {
        var input = document.getElementById('image-input2');
        var preview = document.getElementById('image-preview2');
        var defaultImage = document.getElementById('default-image2');

        while (preview.firstChild) {
            preview.removeChild(preview.firstChild);
        }

        var file = input.files[0];
        if (file) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                img.style.width = '100%';
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
    function previewImage3() {
        var input = document.getElementById('image-input3');
        var preview = document.getElementById('image-preview3');
        var defaultImage = document.getElementById('default-image3');

        while (preview.firstChild) {
            preview.removeChild(preview.firstChild);
        }

        var file = input.files[0];
        if (file) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                img.style.width = '100%';
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