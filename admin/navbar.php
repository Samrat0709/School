<?php include './components/head.php' ?>
<?php include './components/scripts.php' ?>
<?php include './components/styles.php' ?>
<?php include '../config/db_con.php' ?>

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
    .navbar-top{
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        gap: 2rem;
        padding: 3rem;
    }
    .navbar-top form{
        display: flex;
        flex-direction: column;
        gap: 1rem;
        width: 100%;
    }
    .scl-name , .scl-logo , .other-logo {
        display: flex;
        flex-direction: column;
        gap: 0.3rem;
    }
    .scl-logo label , .scl-name label , .other-logo label{
        display: flex;
        align-items: center;
        gap: 1rem;
        color: #000;
        font-family: 'Poppins',sans-serif;
        font-size: 1.2rem;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        text-transform: capitalize;
    }
    .scl-logo input[type="file"] , .other-logo input[type="file"] {
        width: fit-content;
    }
    .scl-logo input , .scl-name input, .other-logo input[type="file"] {
        border-radius: 8px;
        padding: 0.8rem;
        font-family: 'Poppins',sans-serif;
        border: 0.5px solid rgba(0, 0, 0, 0.30);
        background: #FFF;
        box-shadow: 2px 2px 4px 0px rgba(0, 0, 0, 0.25);
    }
    #navbar .img-container{
        width: 200px;
        height: 200px;
    }
    .other-logos{
        display: grid;
        grid-template-columns: 1fr 2fr;
    }
    
</style>


<div id="container">
    <?php include './components/sidebar.php' ?>
    <div id="navbar">
        <div class="navbar-top">
            <div class="logo1 w-100">
                <form action="school_logo_action.php" method="POST" enctype="multipart/form-data">
                <div class="scl-logo">
                    <label for="img">School logo 1</label>
                    <input id="img" type="file" name="image" placeholder="" onchange="previewImage_scl(this)" required/>
                    
                </div>
                
                <input type="submit" id="submit_btn" name="submit" class="btn btn-success" />
                
            </form>
                <div class="img-container">
                    <?php
                       $logo1=mysqli_fetch_array(mysqli_query($con,"select * from school_details where school_id='$id'"))
                    ?>
                    <img id="imagePreview_scl" src="<?php echo $logo1['school_logo'] ?>" alt="Image Preview" style="max-width: 100%; max-height: 100%; border-radius: 50%;" />
                </div>
            
                <script>
                    function previewImage_scl(input) {
                        var preview = document.getElementById('imagePreview_scl');
                        var file = input.files[0];
                        var reader = new FileReader();
            
                        reader.onloadend = function () {
                            preview.src = reader.result;
                            preview.style.display = 'block';
                        }
            
                        if (file) {
                            reader.readAsDataURL(file);
                        } else {
                            preview.src = './src/img/logo.webp';
                            preview.style.display = 'none';
                        }
                    }
                </script>
            </div>
            
            <div class="logo2 w-100">
                <form action="school_logo_action.php" method="POST" enctype="multipart/form-data">
                    <div class="scl-logo">
                        <label for="img">School logo 2</label>
                        <input id="img" type="file" name="image" placeholder="" onchange="previewImage_scl_2(this)" required/>
                        
                    </div>
                    
                    <input type="submit" id="submit_btn" name="submit1" class="btn btn-success" />
                    
                </form>
                <div class="img-container">
                    <?php
                       $logo2=mysqli_fetch_array(mysqli_query($con,"select * from school_details where school_id='$id'"))
                    ?>
                    <img id="imagePreview_scl_2" src="<?php echo $logo2['school_logo_two'] ?>" alt="Image Preview" style="max-width: 100%; max-height: 100%; border-radius: 50%;" />
                </div>
            
                <script>
                    function previewImage_scl_2(input) {
                        var preview = document.getElementById('imagePreview_scl_2');
                        var file = input.files[0];
                        var reader = new FileReader();
            
                        reader.onloadend = function () {
                            preview.src = reader.result;
                            preview.style.display = 'block';
                        }
            
                        if (file) {
                            reader.readAsDataURL(file);
                        } else {
                            preview.src = './src/img/logo.webp';
                            preview.style.display = 'none';
                        }
                    }
                </script>
            </div>
            
            <div class="name">
                <form action="school_logo_action.php" method="POST" enctype="multipart/form-data">
                
                    <div class="scl-name">
                        <label for="scl-name" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="43" height="35" viewBox="0 0 43 35" fill="none">
                              <g clip-path="url(#clip0_7_419)">
                                <path d="M0 15.3125V33.9063C0 34.5106 0.481063 35 1.075 35H6.45V13.125H2.15C0.962797 13.125 0 14.1046 0 15.3125ZM24.1875 12.0313H22.575V9.29688C22.575 8.99473 22.3345 8.75001 22.0375 8.75001H20.9625C20.6655 8.75001 20.425 8.99473 20.425 9.29688V13.6719C20.425 13.974 20.6655 14.2188 20.9625 14.2188H24.1875C24.4845 14.2188 24.725 13.974 24.725 13.6719V12.5781C24.725 12.276 24.4845 12.0313 24.1875 12.0313ZM33.4426 7.65899L22.6926 0.367096C22.3393 0.127723 21.9244 0 21.5 0C21.0756 0 20.6607 0.127723 20.3074 0.367096L9.55742 7.65899C9.26297 7.85872 9.02153 8.12931 8.85452 8.44675C8.6875 8.76418 8.60008 9.11866 8.6 9.47872V35H17.2V25.1563C17.2 24.552 17.6811 24.0625 18.275 24.0625H24.725C25.3189 24.0625 25.8 24.552 25.8 25.1563V35H34.4V9.4794C34.4 8.74796 34.0406 8.06436 33.4426 7.65899ZM21.5 17.5C18.5317 17.5 16.125 15.0514 16.125 12.0313C16.125 9.01114 18.5317 6.56251 21.5 6.56251C24.4683 6.56251 26.875 9.01114 26.875 12.0313C26.875 15.0514 24.4683 17.5 21.5 17.5ZM40.85 13.125H36.55V35H41.925C42.5189 35 43 34.5106 43 33.9063V15.3125C43 14.1046 42.0372 13.125 40.85 13.125Z" fill="black"/>
                              </g>
                              <defs>
                                <clipPath id="clip0_7_419">
                                  <rect width="43" height="35" fill="white"/>
                                </clipPath>
                              </defs>
                            </svg>
                            <span>Change School Name</span>
                        </label>
                        <?php
                           $name=mysqli_fetch_array(mysqli_query($con,"select * from school_details where school_id='$id'"))
                        ?>
                        <input id="scl-name" type="text" name="name" value="<?php echo $name['school_name'] ?>"/>
                    </div>
                
                    <input type="submit" id="submit_btn" name="submit3" class="btn btn-success" />
                
                </form>
            </div>
        </div>
        <!--<div class="table table-responsive" style="width: 100%; padding: 0 4rem;">-->
        <!--    <table id="myTable_school" class="table table-bordered  ">-->
        <!--        <thead>-->
        <!--            <th>#</th>-->
        <!--            <th>School Logo</th>-->
        <!--            <th>School Name</th>-->
        <!--            <th>Action</th>-->
        <!--        </thead>-->
                
        <!--        <tbody>-->
        <!--            <?php-->
        <!--                $ret = mysqli_query($con, "select * from `school_details` order by id desc ");-->
        <!--                $cnt = 1;-->
        <!--                while ($row = mysqli_fetch_array($ret)) {-->
        <!--            ?>-->
        <!--            <tr>-->
        <!--                <td><?php echo $cnt; ?></td>-->
        <!--                <td><img src="./<?php echo $row['school_logo'] ?> " style="width: 100px; aspect-ratio: 1/1;" /></td>-->
        <!--                <td><?php echo $row['school_name'] ?></td>-->
        <!--                <td><a href="delete_school_logo.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a></td>-->
        <!--            </tr>-->
        <!--            <?php-->
        <!--                $cnt = $cnt + 1;-->
        <!--                }-->
        <!--            ?>-->
        <!--        </tbody>-->
        <!--    </table>-->
        <!--    <script>-->
        <!--        let table_school = new DataTable('#myTable_school');-->
        <!--    </script>-->
        <!--</div>-->
        <div class="other-logos">
            <form action="other_logo_action.php" method="POST" enctype="multipart/form-data" style="    padding: 3rem; display: flex; flex-direction: column; gap: 2rem;">
                <div class="other-logo">
                    <label for="img">Others logo</label>
                    <input id="img" type="file" name="image" placeholder="" onchange="previewImage_oth(this)" required/>
                    <input type="submit" name="submit" id="submit_btn" class="btn btn-success" />
                </div>
                <div class="img-container">
                    <img id="imagePreview_oth" src="./src/img/logo.webp" alt="Image Preview" style="max-width: 100%; max-height: 100%; border-radius: 50%;" />
                </div>
            </form>
            <div class="table table-responsive" style="width: 100%;padding: 0 4rem;">
                <table id="myTable_oth" class="table table-bordered  ">
                    <thead>
                        <th>#</th>
                        <th>Other Logo</th>
                        <th>Action</th>
                    </thead>
                    
                    <tbody>
                        <?php
                            $ret = mysqli_query($con, "select * from `other_logo` order by id desc ");
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($ret)) {
                        ?>
                        <tr>
                            <td><?php echo $cnt; ?></td>
                            <td><img src="./<?php echo $row['others_logo'] ?>" style="width: 100px;aspect-ratio: 1/1;" /></td>
                            <td><a href="delete_other_logo.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                        <?php
                            $cnt = $cnt + 1;
                            }
                        ?>
                    </tbody>
                </table>
                <script>
                    let table_oth = new DataTable('#myTable_oth');
                </script>
            </div>
            <script>
                function previewImage_oth(input) {
                    var preview = document.getElementById('imagePreview_oth');
                    var file = input.files[0];
                    var reader = new FileReader();
        
                    reader.onloadend = function () {
                        preview.src = reader.result;
                        preview.style.display = 'block';
                    }
        
                    if (file) {
                        reader.readAsDataURL(file);
                    } else {
                        preview.src = './src/img/logo.webp';
                        preview.style.display = 'none';
                    }
                }
            </script>
        </div>
    </div>
</div>
