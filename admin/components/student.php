<?php include './components/head.php' ?>
<?php include './components/scripts.php' ?>
<?php include './components/styles.php' ?>
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
    .text3 {
        position: relative;
        width: 100%;
        display: flex;
        flex-direction: row;
        
    }
    .text3 .img-container{
        position: absolute;
        right: 10%;
    }
    .text3 form {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 1.5rem;
        width:100%;
    }

    .name,
    .percentage,
    .dropdown {
        position: relative;
        width: 60%;
        height: fit-content;
    }
    .drop-img , .sports-extra{
        display: flex;
        justify-content: space-between;
        width: 60%;
        gap: 3rem;
        align-items: flex-end;
    }
    .sports-name , .extra-name{
        width: 45%;
    }
    .text3 input[type="text"] , .text3 input[type="number"] , .text3 input[type="file"] , .text3 select{
        
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
    .pagination{
        gap: 1rem ;
    }
    /*.table{*/
    /*    padding: 3rem;*/
    /*}*/
    .table td,
    .table th{
        text-align: center;
        padding: 0.5rem;
        border: 1px solid #000;
        font-family: 'Poppins', sans-serif;
        font-size: 1rem;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        text-transform: capitalize;
    }
    .table th{
        font-weight: 600;
    }
    .img{
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }
    .img label{
        color: #000;
        font-family: 'Poppins', sans-serif;
        font-size: 1.1rem;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        text-transform: capitalize;
    }
</style>

<div class="student">
    
    <div class="text3">
            <form action="academic_heights.php" method="POST" enctype="multipart/form-data">
                
                <div class="name">
                    <input type="text" id="name" name="name" placeholder="Students Name" required>
                </div>
                
                
            
               <div class="drop-img">
                    <div class="img">
                        <label for="img">Image should be portrait</label>
                        <input id="img" type="file" name="image" placeholder="" onchange="previewImage_std(this)" required/>
                    </div>
                    <div class="dropdown">
                        <select id="batch" name="category" aria-placeholder="Select Batch:" required>
                            <option disabled value="Select" selected>Select a field</option>
                            <option value="academics">Academics</option>
                            <option value="sports">Sports</option>
                            <option value="extra_curricular">Extra curricular</option>
                        </select>
                    </div>
               </div>
                <div class="percentage">
                    <input type="number" id="percentage" name="percentage" placeholder="Write percentage" max="100">
                </div>
                <div class="sports-extra">
                    <div class="sports-name">
                        <input type="text" id="sports-name" name="sports_name" placeholder="Write sport name">
                    </div>
                
                    <div class="extra-name">
                        <input type="text" id="extra-name" name="extra_curricular_name" placeholder="Write extra curricular name">
                    </div>
                </div>
                
            
                <input type="submit" value="Submit" class="btn btn-success" name="submit_academic" id="submit_btn">
            
                <script>
                                        function previewImage_std(input) {
                                            var preview = document.getElementById('imagePreview_std');
                                            var file = input.files[0];
                                            var reader = new FileReader();
                                
                                            reader.onloadend = function () {
                                                preview.src = reader.result;
                                            }
                                
                                            if (file) {
                                                reader.readAsDataURL(file);
                                            } else {
                                                // Set a default image if no file is selected
                                                preview.src = './src/img/person2.webp';
                                            }
                                        }
                                    </script>
            </form>
            
            <!-- Set a default image for the preview -->
            <div class="img-container" style="width:250px; height: 250px;">
                <img id="imagePreview_std" src="./src/img/person2.webp" alt="Image Preview" style="max-width: 100%; max-height: 100%; border-radius: 50%;" />
            </div>
    </div>
    
    

<div class="table table-responsive">
        <table  id="myTable1" class="table table-bordered  " style="padding: 0.5rem">
            <thead>
                <th>#</th>
                <th>Student Name</th>
                <th>Student Image</th>
                <th>Student marks</th>
                <th>Student field</th>
                <th>Sports Name</th>
                <th>Extra curricular Name</th>
                <th>Action</th>
            </thead>
            <tbody>
                
                
                <?php
                    $ret = mysqli_query($con, "select * from `academic_heights` order by id desc ");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($ret)) {
                ?>
                
                <tr>
                    <td><?php echo $cnt; ?></td>
                    <td><?php echo $row['student_name'] ?></td>
                    <td><img src="<?php echo $row['student_image'] ?>" alt="Staff Image" style=" width: 50px; height: 50px;"></td>
                    <td><?php echo $row['percentage'] ?></td>
                    <td><?php echo $row['category'] ?></td>
                    <td><?php echo $row['sports_name'] ?></td>
                    <td><?php echo $row['extra_curricular_name'] ?></td>
                    <td><a href="delete_student.php?id=<?php echo $row['id'] ?>" class="btn btn-danger" >Delete</a></td>
                </tr>
                <?php
                    $cnt = $cnt + 1;
                    }
                ?>
                
            </tbody>
        </table>
        
            <script>
                let table1 = new DataTable('#myTable1');
            </script>
    </div>

</div>

<script>
    function toggleLabelVisibility_std(input) {
        // Get the label element associated with the textarea
        var label = document.querySelector('label[for="studentName"]');

        // Show or hide the label based on whether there is text in the textarea
        label.style.display = input.value.trim() === '' ? 'block' : 'none';
    }

    function toggleLabelVisibility_pct(input) {
        // Get the label element associated with the textarea
        var label = document.querySelector('label[for="percentage"]');

        // Show or hide the label based on whether there is text in the textarea
        label.style.display = input.value.trim() === '' ? 'block' : 'none';
    }

    function toggleLabelVisibility_drop(select) {
        // Get the label element associated with the textarea
        var label = document.querySelector('label[for="batch"]');

        // Show or hide the label based on whether there is text in the textarea
        label.style.display = select.value.trim() === '' ? 'block' : 'none';
    }
</script>