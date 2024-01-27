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
        }
    </style>


<div id="container">
    <?php include './components/sidebar.php' ?>

    <div id="gallery">
        <div class="gal-head">
            <h2>Gallery</h2>
        </div>
        <div class="gallery-input">
            <form action="gallery_action.php" method="POST" enctype="multipart/form-data"  id="imageForm">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" accept="image/*" onchange="previewImage()" required>
    
                <label for="year">Year:</label>
                <input type="text" id="year" name="year" required>
    
                <label for="occasion">Occasion Name:</label>
                <input type="text" id="occasion" name="occation" required>
    
                <div id="image-preview"></div>
    
                <input type="submit" name="submit" value="Submit"/>
            </form>
        </div>
        <div class="table table-responsive" style="width: 100% ; padding: 1rem">
            <table id="myTable_3" class="table table-bordered  ">
                <thead>
                    <th>#</th>
                    <th>Image</th>
                    <th>Year</th>
                    <th>Occasion Name</th>
                    <th>Action</th>
                </thead>
                
                <tbody>
                    <?php
                            $ret = mysqli_query($con,"select * from `gallery` where school_id='$id' order by id desc ");
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($ret)) {
                        ?>
                    <tr>
                        <td><?php echo $cnt; ?></td>
                        <td><img src="<?php echo $row['picture'] ?>" style="width: 100px" /></td>
                        <td><?php echo $row['year'] ?></td>
                        <td><?php echo $row['occation'] ?></td>
                        <td><a href="gallery_delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a></td>
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






