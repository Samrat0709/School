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
<?php include '../config/db_con.php' ?>

<div id="container">
    <?php include './components/sidebar.php' ?>
    <div id="about">
        <div class="top-text">
            <h2>ABOUT US</h2>
        </div>
        <div class="text">
            <div class="abt_head_text">
                <form action="school_history.php" method="POST" id="abt_head_text">
                    <div class="text-input">
                        <?php
                           $sql_text=mysqli_fetch_array(mysqli_query($con,"select * from about where school_id='$id'"));
                        ?>
                        <!-- <label for="textInput">Enter Text:</label> -->
                        <textarea type="text" id="textInput" name="history" onfocus="clearDefaultText()"><?php echo $sql_text['school_history'] ?></textarea>
                    </div>
                    <input type="submit" id="submit_btn" name="submit" value="Change text"/>

                </form>
                
            </div>
        </div>
        <div class="about-qoute">
            <div class="txt">
                <span>"Exploring Our Legacy:</span>
                <span>Discovering the Rich History of</span>
                <span>Railway Higher Secondary</span>
                <span>School Alipurduar Junction</span>
            </div>
            <form action="school_history.php" method="POST" id="upload-form" enctype="multipart/form-data">
                <div id="upload-container">
                    <label for="image-input" id="custom-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" fill="none">
                            <path d="M16 0.5C7.1635 0.5 0 7.6635 0 16.5C0 25.337 7.1635 32.5 16 32.5C24.837 32.5 32 25.337 32 16.5C32 7.6635 24.837 0.5 16 0.5ZM16 30.5315C8.2805 30.5315 2 24.2195 2 16.4999C2 8.78044 8.2805 2.49994 16 2.49994C23.7195 2.49994 30 8.78047 30 16.4999C30 24.2194 23.7195 30.5315 16 30.5315ZM23 15.5H17V9.5C17 8.948 16.552 8.5 16 8.5C15.448 8.5 15 8.948 15 9.5V15.5H9C8.448 15.5 8 15.948 8 16.5C8 17.052 8.448 17.5 9 17.5H15V23.5C15 24.052 15.448 24.5 16 24.5C16.552 24.5 17 24.052 17 23.5V17.5H23C23.552 17.5 24 17.052 24 16.5C24 15.948 23.552 15.5 23 15.5Z" fill="black" />
                        </svg>
                        Change image
                    </label>
                    <input type="submit" name="submit_img" id="submit_btn">
                    <input type="file" id="image-input" accept="image/*" name="image" onchange="previewImage()" />
                    
                </div>
                <div id="image-preview">
                    <img id="default-image" src="./src/img/about-top.webp" alt="Default Image" style="max-width: 100%; max-height: 100%;" />
                </div>
            </form>

        </div>
        <div class="table " style="width: 100% ; padding: 4rem">
            <table id="myTable8" class="table table-bordered  ">
                <thead>
                    <th>#</th>
                    <th>Image</th>
                </thead>
                
                <tbody>
                    
                    <tr>
                        <td>1</td>
                        <td><img src="<?php echo $sql_text['about_img'] ?>" style="width: 100px" /></td>
                       
                    </tr>
                </tbody>
            </table>
            <script>
                let table8 = new DataTable('#myTable8');
            </script>
        </div>
        <div id="legacy-container">
            <div class="items">
                <div class="item">
                    <div class="img abt_text">
                        <form id="upload-form_abt" action="school_legacy.php" method="POST" enctype="multipart/form-data">
                            
                            <div class="abt_heading">
                                <label for="heading">Heading</label>
                                <input type="text" id="heading" name="heading" required>
                            </div>
                            <div class="date-img">
                                <div class="abt_date ">
                                    <label for="date_abt">Date</label>
                                    <input type="year" id="date_abt" name="year" required>
                                </div>   
                                
                                <div class="abt_img">
                                    <label for="img">School logo</label>
                                    <input id="img" type="file" name="image" placeholder="" onchange="previewImage_abt(this)" required/>
                                </div>
                            </div>
                            
                                
                            <textarea type="text" id="textInput1" name="description"  placeholder="Write about it .... "></textarea>
                                    
                                    
                            <input type="submit" value="Submit" name="submit" class="btn btn-success" id="submit_btn">
                        </form>
                        <div class="img-container">
                            <img id="imagePreview_abt" src="./src/img/scl-found.webp" alt="Image Preview" style="max-width: 100%; max-height: 100%;" />
                        </div>
                        
                        <script>
                            function previewImage_abt(input) {
                                var preview = document.getElementById('imagePreview_abt');
                                var file = input.files[0];
                                var reader = new FileReader();
                    
                                reader.onloadend = function () {
                                    preview.src = reader.result;
                                    preview.style.display = 'block';
                                }
                    
                                if (file) {
                                    reader.readAsDataURL(file);
                                } else {
                                    preview.src = './src/img/scl-found.webp';
                                    preview.style.display = 'none';
                                }
                            }
                        </script>
            
                    </div>
                </div>
            </div>
        </div>
        <div class="table-conatiner">
            <div class="table table-responsive" style="width: 100% ;">
                <table id="myTable7" class="table table-bordered  ">
                    <thead>
                        <th>#</th>
                        <th>Year</th>
                        <th>Heading</th>
                        <th>Text</th>
                        <th>Image</th>
                        <th>Action</th>
                    </thead>
                    
                    <tbody>
                        <?php
                            $ret = mysqli_query($con, "select * from `school_legacy` order by id desc ");
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($ret)) {
                        ?>
                        <tr>
                            <td><?php echo $cnt; ?></td>
                            <td><?php echo $row['year'] ?></td>
                            <td><?php echo $row['heading'] ?></td>
                            <td><?php echo $row['description'] ?></td>
                            <td><img src="./<?php echo $row['upload_img'] ?>"  style="width: 100px" /></td>
                            <td><a href="delete_school_legacy.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                        <?php
                            $cnt = $cnt + 1;
                            }
                        ?>
                    </tbody>
                </table>
                <script>
                    let table7 = new DataTable('#myTable7');
                </script>
            </div>
        </div>
        
        <div class="mission">
            <div class="text">
                <h3>Our Mission statement</h3>
                <div class="min_text">
                    <form action="school_history.php" method="POST" id="min_text">
                        <div class="text-input">
                            <textarea type="text" name="mission" id="mission_text" ><?php echo $sql_text['mission'] ?></textarea>
                        </div>
                        <input type="submit" id="submit_btn" name="submit_mission" value="Change text"/>

                    </form>
                    
                </div>
            </div>
            
        </div>
        <div id="values-container">
            <div class="text">
                <h3>Our Values </h3>
                <div class="val_text">
                    <form action="school_history.php" method="POST" id="val_text">
                        <div class="text-input">
                            
                            <textarea type="text" name="values" id="value_text" ><?php echo $sql_text['s_values'] ?></textarea>
                        </div>
                        <input type="submit" id="submit_btn" name="submit_values" value="Change text"/>
                    </form>
                    
                </div>
            </div>
            
        </div>
        <div id="community-container">
            <div class="text">
                <h3>Managing community</h3>
                <div class="com_text">
                    <form action="school_history.php" method="POST" id="com_text">
                        <div class="text-input">
                            <textarea type="text" name="community" id="community_text" ><?php echo $sql_text['community'] ?></textarea>
                        </div>
                        <input type="submit" id="submit_btn" name="submit_community" value="Change text"/>

                    </form>
                    
                </div>
            </div>
            
        </div>
        
        <div id="staff-details">
            <form action="#" method="POST">
                <div class="staff-drop">
                    <!-- Dropdown with a disabled option selected by default -->
                    <label for="dropdown">Select the staffs </label>
                    <select id="dropdown" name="dropdown" required>
                        <option value="" disabled selected>Select the staffs </option>
                        <option value="option1">Principal</option>
                        <option value="option2">Teachers</option>
                        <option value="option3">Staffs</option>
                        <option value="option4">Others</option>
                    </select>
                </div>
                
                <div class="staff-add">
                    <!-- Input field for address -->
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" required> 
                </div>
        
                <div class="staff-email">
                    <!-- Input field for email -->
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
        
                
        
                <!-- Submit button -->
                <input type="submit" id="submit_btn" class="btn btn-success" value="Submit">
        
            </form>
        </div>
       
        
    </div>
</div>









<script>
    function previewImage() {
        var input = document.getElementById('image-input');
        var preview = document.getElementById('image-preview');
        var defaultImage = document.getElementById('default-image');

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
    function previewImage_1() {
        var input = document.getElementById('image-input_1');
        var preview = document.getElementById('image-preview_1');
        var defaultImage = document.getElementById('default-image_1');

        while (preview.firstChild) {
            preview.removeChild(preview.firstChild);
        }

        var file = input.files[0];
        if (file) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                img.style.width = '400px';
                img.style.height = 'auto';
                preview.appendChild(img);
            };

            reader.readAsDataURL(file);
        } else {
            // If no file is selected, show the default image
            preview.appendChild(defaultImage.cloneNode(true));
        }
    }
</script>