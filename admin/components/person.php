<!--php Start-->

<?php
//  session_start();
 include('../config/db_con.php');
//  if(!isset($_SESSION['UID']))
//  {
     
//     header('location:index.php');
//     die();
//  }
//  $id=$_SESSION['UID'];
?>

<!--php End-->



<style>
    #image-input5 {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    label {
        width: max-content;
    }
    .staff-img {
    display: flex;
    position: relative;
    align-items: center;
    justify-content: center;
    }
    #custom-button5 {
        color: #000;
        font-family: 'Mont-light', sans-serif;
        font-size: 1rem;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        text-transform: capitalize;
        border-radius: 8.245px;
        background: rgba(255, 255, 255, 0.40);
        box-shadow: 1.03067px 1.03067px 10.30672px 0px rgba(0, 0, 0, 0.25);
    }

    .person form {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1.5rem;
        width: 60%;
    }
    .name-qua{
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        justify-content: space-between;
        width: 100%;
        align-items: flex-end;
    }
    
    .name,
    .qualification,
    .dropdown {
        display: flex;
        flex-direction: column;
        gap: 0.3rem;

    }

    

    .name label,
    .qualification label ,
    .dropdown select{
        color: #000;
        font-family: 'Poppins', sans-serif;
        font-size: 1.2rem;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        text-transform: capitalize;
    }
    .name-qua input , .person select{
        padding: 0.5rem 1rem;
        border-radius: 10px;
        border: 0.5px solid #9D9D9D;
        background: #FFF;
        box-shadow: 2px 2px 4px 0px rgba(0, 0, 0, 0.25);
    }
    
    .person_container{
        justify-content: space-between;
        display: flex;
        flex-direction: column;
        gap: 2rem
        align-items: center;
        
    }
    @media only screen and (max-width: 900px){
        .person_container{
            flex-direction: column;
        }
        .slider-container {
            width: 100%;
        }
        
    }
</style>

<div class="person_container">
    <div class="person">
        <form action="staff_action.php" method="POST" enctype="multipart/form-data">
                <div class="staff-img">
                    <div id="upload-container">
                        <label for="image-input5" id="custom-button5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" fill="none">
                                <path d="M16 0.5C7.1635 0.5 0 7.6635 0 16.5C0 25.337 7.1635 32.5 16 32.5C24.837 32.5 32 25.337 32 16.5C32 7.6635 24.837 0.5 16 0.5ZM16 30.5315C8.2805 30.5315 2 24.2195 2 16.4999C2 8.78044 8.2805 2.49994 16 2.49994C23.7195 2.49994 30 8.78047 30 16.4999C30 24.2194 23.7195 30.5315 16 30.5315ZM23 15.5H17V9.5C17 8.948 16.552 8.5 16 8.5C15.448 8.5 15 8.948 15 9.5V15.5H9C8.448 15.5 8 15.948 8 16.5C8 17.052 8.448 17.5 9 17.5H15V23.5C15 24.052 15.448 24.5 16 24.5C16.552 24.5 17 24.052 17 23.5V17.5H23C23.552 17.5 24 17.052 24 16.5C24 15.948 23.552 15.5 23 15.5Z" fill="white" />
                            </svg>
                            Change image
                        </label>
                        <input type="file" id="image-input5" accept="image/*" onchange="previewImage5()" name="image" style="opacity: 0;" />
                    </div>
                <div class="img-container" id="img-container5">
                    <img id="default-image5" src="./src/img/teacher.webp" alt="">
                </div>
                </div>
                
                
                <script>
                function previewImage5() {
                    var input = document.getElementById('image-input5');
                    var preview = document.getElementById('img-container5');
                    var defaultImage = document.getElementById('default-image5');
    
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
                <div class="name-qua">
                    <div class="name">
                        <label for="teacherName">Staff Name</label>
                        <input type="text" id="teacherName" name="name" required>
                    </div>
    
                    <div class="qualification">
                        <label for="qualification">Write his qualifications</label>
                        <input type="text" id="qualification" name="qualification"  required>
                    </div>
                </div>
                <!-- Student Name Input -->
                
                <div class="dropdown">
                    <!--<label for="designation">Write his designation</label>-->
                    <!--<input type="text" id="designation" name="designation" oninput="toggleLabelVisibility_degi(this)" required>-->
                    <select id="designation" name="designation" >
                        <option value="" disabled selected>Select the designation</option>
                        <option value="Principal" >Principal</option>
                        <option value="Teacher">Teacher</option>
                        <option value="Lab_assistants">Lab assistants</option>
                        <option value="Group_B">Group B</option>
                    </select>
                </div>
                
                <!-- Percentage Input -->
                
                <div class="add-teacher">
                    <input type="submit" name="submit_faculty" value="Add new staff">
                </div>

                
            </form>
    </div>
    <div class="table table-responsive" style="    padding: 5rem;">
        <table id="myTable9" class="table table-bordered  ">
            <thead>
                <th>#</th>
                <th>Staff Name</th>
                <th>Staff Image</th>
                <th>Staff Qualification</th>
                <th>Staff Designation</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                    $ret = mysqli_query($con, "select * from `staff_details` order by id desc ");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($ret)) {
                ?>
                
                <tr>
                    <td><?php echo $cnt; ?></td>
                    <td><?php echo $row['teacher_name'] ?></td>
                    <td><img src="<?php echo $row['teacher_image'] ?>" alt="Staff Image" style=" width: 50px; height: 50px;"></td>
                    <td><?php echo $row['teacher_qualification'] ?></td>
                    <td><?php echo $row['designation'] ?></td>
                    <td><a href="delete_person.php?id=<?php echo $row['id'] ?>" class="btn btn-danger" >Delete</a></td>
                </tr>
                <?php
                    $cnt = $cnt + 1;
                    }
                ?>
            </tbody>
        </table>
        <script>
                let table9 = new DataTable('#myTable9');
        </script>
    </div>

</div>
    





















