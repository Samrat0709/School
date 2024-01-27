<?php
     session_start();
     include('../config/db_con.php');
     if(!isset($_SESSION['UID']))
     {
         
        header('location:index.php');
        die();
     }
     $id=$_SESSION['UID'];
     $sql=mysqli_fetch_array(mysqli_query($con,"select * from admin_login where id='$id'"));

?>

<?php include './components/head.php' ?>
<?php include './components/scripts.php' ?>
<?php include './components/styles.php' ?>



<div id="container">

    <?php include './components/sidebar.php' ?>

    <div id="contact">
        <div class="top">
            <img src="./src/img/red.webp" class="red" alt="">
            <h2>CONTACT US</h2>
            <div class="contact-top">
                <div class="map">
                    <form id="upload-form" enctype="multipart/form-data">
                        <div id="upload-container-ach">
                            <label for="image-input4" id="custom-button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" fill="none">
                                    <path d="M16 0.5C7.1635 0.5 0 7.6635 0 16.5C0 25.337 7.1635 32.5 16 32.5C24.837 32.5 32 25.337 32 16.5C32 7.6635 24.837 0.5 16 0.5ZM16 30.5315C8.2805 30.5315 2 24.2195 2 16.4999C2 8.78044 8.2805 2.49994 16 2.49994C23.7195 2.49994 30 8.78047 30 16.4999C30 24.2194 23.7195 30.5315 16 30.5315ZM23 15.5H17V9.5C17 8.948 16.552 8.5 16 8.5C15.448 8.5 15 8.948 15 9.5V15.5H9C8.448 15.5 8 15.948 8 16.5C8 17.052 8.448 17.5 9 17.5H15V23.5C15 24.052 15.448 24.5 16 24.5C16.552 24.5 17 24.052 17 23.5V17.5H23C23.552 17.5 24 17.052 24 16.5C24 15.948 23.552 15.5 23 15.5Z" fill="black" />
                                </svg>
                                Change image
                            </label>
                            <input type="submit" value="Submit" id="submit_btn" class="btn btn-success">
                            <input type="file" id="image-input4" accept="image/*" onchange="previewImage4()" style="opacity: 0;" />
                        </div>
                        <div id="image-preview4">
                            <img id="default-image4" src="./src/img/map.webp" alt="Default Image" style="max-width: 100%; max-height: 100%;" />
                        </div>
                    </form>


                </div>

                <div class="con-text">
                    <form id="con-text">
                        <div class="text-input">
                            <input type="text" id="textInput" onfocus="clearDefaultText()" />
                            <input type="submit" name="" class="btn btn-success"  style="  width: fit-content;  padding: 1rem; border-radius: 14px;">
                        </div>
                        

                    </form>
                    <script>
                        var defaultText = "Alipurduar Rly.Jnc., Chechakhata, West Bengal 736123";

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
        </div>
        <div id="location">

            <div class="details">
                
                
                
                <!--<div class="left">-->
                    
                <!--    <div class="item-left">-->
                <!--        <div class="icon">-->
                <!--            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="location-dot" class="svg-inline--fa fa-location-dot " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">-->
                <!--                <path fill="currentColor" d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"></path>-->
                <!--            </svg>-->
                <!--        </div>-->
                <!--        <h4>ADDRESS</h4>-->
                <!--    </div>-->
                <!--    <div class="item-left">-->
                <!--        <div class="icon">-->
                <!--            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone" class="svg-inline--fa fa-phone " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">-->
                <!--                <path fill="currentColor" d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"></path>-->
                <!--            </svg>-->
                <!--        </div>-->
                <!--        <h4>PHONE NO.</h4>-->
                <!--    </div>-->
                <!--    <div class="item-left">-->
                <!--        <div class="icon"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope" class="svg-inline--fa fa-envelope " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">-->
                <!--                <path fill="currentColor" d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"></path>-->
                <!--            </svg></div>-->
                <!--        <h4>EMAIL</h4>-->
                <!--    </div>-->
                <!--    <div class="item-left">-->
                <!--        <div class="icon"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="whatsapp" class="svg-inline--fa fa-whatsapp " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">-->
                <!--                <path fill="currentColor" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path>-->
                <!--            </svg></div>-->
                <!--        <h4>WHATSAPP</h4>-->
                <!--    </div>-->
                <!--</div>-->
                <div class="right">
                    <form action="contact_action.php" id="loc" method="POST">
                        
                        <div class="item">
                            <div class="item-left">
                                <div class="icon">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="location-dot" class="svg-inline--fa fa-location-dot " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                        <path fill="currentColor" d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"></path>
                                    </svg>
                                </div>
                                <h4>ADDRESS</h4>
                            </div>
                            <div class="add">
                                <!--<label for="address">-->
                                <!--    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">-->
                                <!--        <path d="M6.50195 13.9686L9.99558 13.9568L17.6209 6.40425C17.9202 6.105 18.0848 5.70759 18.0848 5.28484C18.0848 4.86209 17.9202 4.46467 17.6209 4.16542L16.3653 2.90984C15.7668 2.31134 14.7226 2.3145 14.1289 2.90746L6.50195 10.4615V13.9686ZM15.2459 4.02925L16.5039 5.28246L15.2396 6.53488L13.984 5.28009L15.2459 4.02925ZM8.08529 11.1218L12.859 6.39317L14.1146 7.64875L9.34166 12.3758L8.08529 12.3798V11.1218Z" fill="black" />-->
                                <!--        <path d="M4.91829 17.125H16.0016C16.8748 17.125 17.585 16.4149 17.585 15.5417V8.6795L16.0016 10.2628V15.5417H7.41838C7.39779 15.5417 7.37642 15.5496 7.35584 15.5496C7.32971 15.5496 7.30359 15.5425 7.27667 15.5417H4.91829V4.45833H10.3388L11.9222 2.875H4.91829C4.04509 2.875 3.33496 3.58512 3.33496 4.45833V15.5417C3.33496 16.4149 4.04509 17.125 4.91829 17.125Z" fill="black" />-->
                                <!--    </svg>-->
                                <!--    Add address-->
                                <!--</label>-->
                                <textarea name="address" id="address" cols="30" rows="10"><?php echo $sql['address']; ?></textarea>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-left">
                                <div class="icon">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone" class="svg-inline--fa fa-phone " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="currentColor" d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"></path>
                                    </svg>
                                </div>
                                <h4>PHONE NO.</h4>
                            </div>
                            <div class="phn">
                                <input type="number" placeholder="Add official contact no. " name="number1" value="<?php echo $sql['phone']; ?>">
                                <input type="number" placeholder="Add official contact no. (SECURITY)" name="number2" value="<?php echo $sql['official_contact_number_security']; ?>">
                                <input type="number" placeholder="Add official contact no. (ADMINISTRATION)" name="number3" value="<?php echo $sql['official_contact_number_administration']; ?>">
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-left">
                                <div class="icon"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope" class="svg-inline--fa fa-envelope " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="currentColor" d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"></path>
                                    </svg></div>
                                <h4>EMAIL</h4>
                            </div>
                            <div class="email">
                                <input type="text" placeholder="Add official Email" name="email" value="<?php echo $sql['email']; ?>">
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-left">
                                <div class="icon"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="whatsapp" class="svg-inline--fa fa-whatsapp " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path fill="currentColor" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path>
                                    </svg></div>
                                <h4>WHATSAPP</h4>
                            </div>
                            <div class="wp">
                                <input type="text" placeholder="Add official Whatsapp" name="whatsapp" value="<?php echo $sql['whatsapp_number']; ?>">
                            </div>
                        </div>
                        <div class="submit">
                                <input type="submit" value="Submit" class="btn btn-success" id="submit_btn" name="submit">
                        </div>
                        <!--<div class="item">-->
                        <!--    <div class="submit">-->
                        <!--        <input type="submit" value="Submit" id="submit_btn" name="submit">-->
                        <!--    </div>-->
                        <!--</div>-->
                        
                        <!--<div class="add">-->
                        <!--    <label for="address">-->
                        <!--        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">-->
                        <!--            <path d="M6.50195 13.9686L9.99558 13.9568L17.6209 6.40425C17.9202 6.105 18.0848 5.70759 18.0848 5.28484C18.0848 4.86209 17.9202 4.46467 17.6209 4.16542L16.3653 2.90984C15.7668 2.31134 14.7226 2.3145 14.1289 2.90746L6.50195 10.4615V13.9686ZM15.2459 4.02925L16.5039 5.28246L15.2396 6.53488L13.984 5.28009L15.2459 4.02925ZM8.08529 11.1218L12.859 6.39317L14.1146 7.64875L9.34166 12.3758L8.08529 12.3798V11.1218Z" fill="black" />-->
                        <!--            <path d="M4.91829 17.125H16.0016C16.8748 17.125 17.585 16.4149 17.585 15.5417V8.6795L16.0016 10.2628V15.5417H7.41838C7.39779 15.5417 7.37642 15.5496 7.35584 15.5496C7.32971 15.5496 7.30359 15.5425 7.27667 15.5417H4.91829V4.45833H10.3388L11.9222 2.875H4.91829C4.04509 2.875 3.33496 3.58512 3.33496 4.45833V15.5417C3.33496 16.4149 4.04509 17.125 4.91829 17.125Z" fill="black" />-->
                        <!--        </svg>-->
                        <!--        Add address-->
                        <!--    </label>-->
                        <!--    <textarea name="address" id="address" cols="30" rows="10"><?php echo $sql['address']; ?></textarea>-->
                        <!--</div>-->
                        <!--<div class="phn">-->
                        <!--    <input type="number" placeholder="Add official contact no. " name="number1" value="<?php echo $sql['phone']; ?>">-->
                        <!--    <input type="number" placeholder="Add official contact no. (SECURITY)" name="number2" value="<?php echo $sql['official_contact_number_security']; ?>">-->
                        <!--    <input type="number" placeholder="Add official contact no. (ADMINISTRATION)" name="number3" value="<?php echo $sql['official_contact_number_administration']; ?>">-->
                        <!--</div>-->
                        <!--<div class="email">-->
                        <!--    <input type="text" placeholder="Add official Email" name="email" value="<?php echo $sql['email']; ?>">-->
                        <!--</div>-->
                        <!--<div class="wp">-->
                        <!--    <input type="text" placeholder="Add official Whatsapp" name="whatsapp" value="<?php echo $sql['whatsapp_number']; ?>">-->
                        <!--</div>-->
                        <!--<div class="submit">-->
                        <!--    <input type="submit" value="Submit" id="submit_btn" name="submit">-->
                        <!--</div>-->
                    </form>
                </div>
                
            </div>
        </div>
        
        <div class="table" style="width: 100% ; padding: 1rem">
            <h3 id='feedback' >Feedbacks</h3>
            <div class="table-responsive">
                <table id="myTable_2" class="table table-bordered  " style="width: 80%">
                    
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Action</th>
                    </thead>
                    
                    <tbody>
                        <?php
                            $ret = mysqli_query($con, "select * from `feedback` order by id desc ");
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($ret)) {
                        ?>
                        <tr>
                            <td><?php echo $cnt; ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['phone'] ?></td>
                            <td><?php echo $row['subject'] ?></td>
                            <td><?php echo $row['message'] ?></td>
                            <td><a href="delete_feedback.php?id=<?php echo $row['id'] ?>"  class="btn btn-danger" >Delete</a></td>
                        </tr>
                        <?php
                            $cnt = $cnt + 1;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            
            <script>
                let table_2 = new DataTable('#myTable_2');
            </script>
        </div>
        
    </div>

</div>

<script>
    function previewImage4() {
        var input = document.getElementById('image-input4');
        var preview = document.getElementById('image-preview4');
        var defaultImage = document.getElementById('default-image4');

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