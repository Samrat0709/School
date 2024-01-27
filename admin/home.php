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
    .add-event label{
        color: #000;
        font-family: 'Poppins', sans-serif;
        font-size: 1.1rem;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        text-transform: capitalize;
    }
    .event{
        display: flex;
        justify-content: center;
    }
    .add-event{
        padding: 2rem;
    }
    .add-event form{
        display: flex;
        flex-direction: column;
        gap: 1.8rem;
        width: 80%;
    }
    .date , .event-time , .event-title , .event-description{
        display: flex;
        flex-direction: column;
        gap: 0.3rem;
    }
    .event input[type="date"] , .event input[type="time"] , .event input[type="text"] , .event textarea{
        gap: 2rem;
        text-transform: uppercase;
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
    .add-event h3{
        color: #000;
        font-family: 'Poppins', sans-serif;
        font-size: 2.3rem;
        font-style: normal;
        font-weight: 800;
        line-height: normal;
        text-transform: capitalize;
    }
    .event-container{
        display: grid;
        grid-template-columns: 1fr 1fr;
    }
    #sig{
        color: #000;
    font-family: 'Poppins', sans-serif;
    font-size: 1.1rem;
    font-style: normal;
    font-weight: 500;
    line-height: normal;
    text-transform: capitalize;
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
    padding: 0.8rem;
    }
    #upload-container_sig{
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 1rem;
    }
</style>

<div id="container">
    <?php include './components/sidebar.php' ?>
    <div id="home">
        <!--<a href="index.php" class="navbar-brand">-->
        <!--    <img src="./src/img/logo.webp" class="logo" alt="">-->
        <!--    <h1>Railway Higher Secondary School <br> Alipurduar Junction</h1>-->
        <!--    <img src="./src/img/logo2.png" class="logo2" alt="">-->
        <!--</a>-->
        <div class="top-img">
            <form action="banner_action.php" method="POST" id="upload-form" enctype="multipart/form-data" >
                <div id="upload-container">
                    <label for="image-input" id="custom-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" fill="none">
                            <path d="M16 0.5C7.1635 0.5 0 7.6635 0 16.5C0 25.337 7.1635 32.5 16 32.5C24.837 32.5 32 25.337 32 16.5C32 7.6635 24.837 0.5 16 0.5ZM16 30.5315C8.2805 30.5315 2 24.2195 2 16.4999C2 8.78044 8.2805 2.49994 16 2.49994C23.7195 2.49994 30 8.78047 30 16.4999C30 24.2194 23.7195 30.5315 16 30.5315ZM23 15.5H17V9.5C17 8.948 16.552 8.5 16 8.5C15.448 8.5 15 8.948 15 9.5V15.5H9C8.448 15.5 8 15.948 8 16.5C8 17.052 8.448 17.5 9 17.5H15V23.5C15 24.052 15.448 24.5 16 24.5C16.552 24.5 17 24.052 17 23.5V17.5H23C23.552 17.5 24 17.052 24 16.5C24 15.948 23.552 15.5 23 15.5Z" fill="black" />
                        </svg>
                        Add image
                    </label>
                    <input type="submit" value="Submit" class="btn btn-success" id="submit_btn" name="submit" style="">
                    <input type="file" id="image-input" accept="image/*" name="image" style="display: none" onchange="previewImage()" />
                    
                </div>
                <div id="image-preview">
                    <img id="default-image" src="./src/img/top.webp" alt="Default Image" style="max-width: 100%; max-height: 100%;" />
                </div>
            </form>

        </div>
        <div class="table table-responsive" style="width: 100%">
            <table id="myTable3" class="table table-bordered  ">
                <thead>
                    <th>#</th>
                    <th>Banner image</th>
                    <th>Action</th>
                </thead>
                
                <tbody>
                     <?php
                            $ret = mysqli_query($con,"select * from `banner` where school_id='$id' order by id desc ");
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($ret)) {
                        ?>
                    
                    <tr>
                        <td><?php echo $cnt; ?></td>
                        <td><img src="<?php echo $row['banner'] ?>" style="width: 100px" /></td>
                        <td><a href="banner_delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                    <?php
                        $cnt = $cnt + 1;
                        }
                    ?>
                </tbody>
            </table>
            <script>
                let table = new DataTable('#myTable3');
            </script>
        </div>
        <div class="box-container">
            <div class="box">
                <div class="head">
                    <h4>Notice</h4>
                </div>
                <div class="line"></div>
                <div class="content">
                    <?php
                                $ret = mysqli_query($con,"select * from `notice` where school_id='$id' order by id desc LIMIT 4  ");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($ret)) {
                            ?>
                                <div class="item">
                                        <div class="left">
                                            <p><?php echo $row['notice_text'] ?> </p>
                                            <div class="download">
                                                <a href="./notice/<?php echo $row['notice_pdf']; ?>" target="_blank" style="text-decoration: none">
                                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="download" class="svg-inline--fa fa-download " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                    <path fill="currentColor" d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"></path>
                                                    </svg>
                                                    <h5>Download now</h5>
                                                </a>
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="right">
                                            <div class="line-h"></div>
                                            <form action="" >
                                                <!--<div class="edit">-->
                                                <!--    <input type="submit" name="edit" id="editButton" style="display: none;"> -->
                                                <!--    <label for="editButton">-->
                                                <!--        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">-->
                                                <!--            <path d="M9.97635 23.1668H22.1668M19.1192 6.40493L20.643 7.92874M21.4049 2.59541C21.7051 2.89554 21.9433 3.25188 22.1058 3.64406C22.2683 4.03625 22.3519 4.45661 22.3519 4.88112C22.3519 5.30564 22.2683 5.72599 22.1058 6.11818C21.9433 6.51037 21.7051 6.86671 21.4049 7.16684L6.92873 21.643L0.833496 23.1668L2.35731 17.1569L16.8396 2.6015C17.4104 2.0279 18.1761 1.68991 18.9845 1.65462C19.793 1.61933 20.5852 1.88934 21.2038 2.41103L21.4049 2.59541Z" stroke="#545454" stroke-width="1.52381" stroke-linecap="round" stroke-linejoin="round" />-->
                                                <!--        </svg>-->
                                                <!--    </label>-->
                                                <!--</div>-->
                                                <div class="delete">
                                                    <a href="delete_notice.php?id=<?php echo $row['id'] ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33" fill="none">
                                                            <path d="M14.5 6.50006H18.5C18.5 5.96963 18.2893 5.46092 17.9142 5.08585C17.5391 4.71077 17.0304 4.50006 16.5 4.50006C15.9696 4.50006 15.4609 4.71077 15.0858 5.08585C14.7107 5.46092 14.5 5.96963 14.5 6.50006ZM12.5 6.50006C12.5 5.4392 12.9214 4.42178 13.6716 3.67163C14.4217 2.92149 15.4391 2.50006 16.5 2.50006C17.5609 2.50006 18.5783 2.92149 19.3284 3.67163C20.0786 4.42178 20.5 5.4392 20.5 6.50006H28.5C28.7652 6.50006 29.0196 6.60542 29.2071 6.79295C29.3946 6.98049 29.5 7.23484 29.5 7.50006C29.5 7.76528 29.3946 8.01963 29.2071 8.20717C29.0196 8.3947 28.7652 8.50006 28.5 8.50006H27.372L24.962 26.1761C24.7985 27.3739 24.2066 28.472 23.2958 29.267C22.385 30.062 21.217 30.5 20.008 30.5001H12.992C11.783 30.5 10.615 30.062 9.7042 29.267C8.79338 28.472 8.20145 27.3739 8.038 26.1761L5.628 8.50006H4.5C4.23478 8.50006 3.98043 8.3947 3.79289 8.20717C3.60536 8.01963 3.5 7.76528 3.5 7.50006C3.5 7.23484 3.60536 6.98049 3.79289 6.79295C3.98043 6.60542 4.23478 6.50006 4.5 6.50006H12.5ZM14.5 13.5001C14.5 13.2348 14.3946 12.9805 14.2071 12.793C14.0196 12.6054 13.7652 12.5001 13.5 12.5001C13.2348 12.5001 12.9804 12.6054 12.7929 12.793C12.6054 12.9805 12.5 13.2348 12.5 13.5001V23.5001C12.5 23.7653 12.6054 24.0196 12.7929 24.2072C12.9804 24.3947 13.2348 24.5001 13.5 24.5001C13.7652 24.5001 14.0196 24.3947 14.2071 24.2072C14.3946 24.0196 14.5 23.7653 14.5 23.5001V13.5001ZM19.5 12.5001C19.7652 12.5001 20.0196 12.6054 20.2071 12.793C20.3946 12.9805 20.5 13.2348 20.5 13.5001V23.5001C20.5 23.7653 20.3946 24.0196 20.2071 24.2072C20.0196 24.3947 19.7652 24.5001 19.5 24.5001C19.2348 24.5001 18.9804 24.3947 18.7929 24.2072C18.6054 24.0196 18.5 23.7653 18.5 23.5001V13.5001C18.5 13.2348 18.6054 12.9805 18.7929 12.793C18.9804 12.6054 19.2348 12.5001 19.5 12.5001ZM10.02 25.9061C10.1182 26.6246 10.4733 27.2833 11.0197 27.7602C11.5661 28.2371 12.2667 28.5 12.992 28.5001H20.008C20.7336 28.5004 21.4347 28.2378 21.9816 27.7609C22.5284 27.2839 22.8838 26.625 22.982 25.9061L25.354 8.50006H7.646L10.02 25.9061Z" fill="#545454" />
                                                        </svg>
                                                    </a>
                                                    
                                                </div>
                
                                            </form>
                                        </div>
                
                                    </div>
                                    <hr>
                            <?php
                                $cnt = $cnt + 1;
                                }
                            ?>
                    
                    

                </div>
            </div>
            <div class="left-box">
                <form action="notice_action.php" method="POST" enctype="multipart/form-data">
                    <div class="text">
                        <label for="noticeText">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" fill="none">
                                <path d="M14.4764 27.1668H26.6668M23.6192 10.4049L25.143 11.9287M25.9049 6.59535C26.2051 6.89548 26.4433 7.25182 26.6058 7.644C26.7683 8.03619 26.8519 8.45655 26.8519 8.88106C26.8519 9.30558 26.7683 9.72593 26.6058 10.1181C26.4433 10.5103 26.2051 10.8666 25.9049 11.1668L11.4287 25.643L5.3335 27.1668L6.85731 21.1569L21.3396 6.60144C21.9104 6.02784 22.6761 5.68984 23.4845 5.65456C24.293 5.61927 25.0852 5.88928 25.7038 6.41097L25.9049 6.59535Z" stroke="#545454" stroke-width="1.52381" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            Write a new Notice
                        </label>
                        <textarea id="noticeText" name="noticeText" rows="5" cols="50" oninput="toggleLabelVisibility(this)"></textarea>
                    </div>


                    <!-- Custom file input container -->
                    <div class="file-input-container">
                        <label for="pdfFiles" id="fileLabel" class="file-input-button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                                <g clip-path="url(#clip0_747_5321)">
                                    <path d="M1.6333 0.75V8.7C1.6333 9.6371 2.00556 10.5358 2.66819 11.1984C3.33082 11.8611 4.22954 12.2333 5.16663 12.2333C6.10373 12.2333 7.00245 11.8611 7.66508 11.1984C8.32771 10.5358 8.69997 9.6371 8.69997 8.7V3.4C8.69997 2.93145 8.51384 2.48209 8.18252 2.15078C7.85121 1.81946 7.40185 1.63333 6.9333 1.63333C6.46475 1.63333 6.01539 1.81946 5.68408 2.15078C5.35276 2.48209 5.16663 2.93145 5.16663 3.4V9.58333M11.35 1.63333H22.8333C23.3018 1.63333 23.7512 1.81946 24.0825 2.15078C24.4138 2.48209 24.6 2.93145 24.6 3.4V24.6C24.6 25.0685 24.4138 25.5179 24.0825 25.8492C23.7512 26.1805 23.3018 26.3667 22.8333 26.3667H5.16663C4.69808 26.3667 4.24873 26.1805 3.91741 25.8492C3.5861 25.5179 3.39997 25.0685 3.39997 24.6V14.8833M20.1833 8.7H13.1166M20.1833 14H13.1166M20.1833 19.3H7.81663" stroke="#545454" stroke-width="1.76667" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_747_5321">
                                        <rect width="26.5" height="26.5" fill="white" transform="translate(0.75 0.75)" />
                                    </clipPath>
                                </defs>
                            </svg>
                            Add An attachment
                        </label>
                        <input type="file" id="pdfFiles" name="attachment" accept=".pdf" multiple onchange="updateFileNames()" required style="display: none;">

                        <div class="file-name" id="fileNamesContainer" style="display: none;">
                            <ul id="fileNamesList"></ul>
    
                        </div>


                        <script>
                            function updateFileNames() {
                                var fileInput = document.getElementById('pdfFiles');
                                var fileNamesContainer = document.getElementById('fileNamesContainer');
                                var fileNamesList = document.getElementById('fileNamesList');

                                fileNamesList.innerHTML = ''; // Clear previous list

                                for (var i = 0; i < fileInput.files.length; i++) {
                                    var fileName = fileInput.files[i].name;
                                    var listItem = document.createElement('li');
                                    listItem.textContent = fileName;
                                    fileNamesList.appendChild(listItem);
                                }

                                fileNamesContainer.style.display = 'block';
                                document.getElementById('fileLabel').style.display = 'none';
                            }

                        </script>
                    </div>

                    <div class="notice-publish">
                        <input type="submit" value="Publish" name="submit">
                    </div>


                    <script>
                        function displayFileName(input) {
                            // Get the file input and file name display elements
                            var fileNameDisplay = document.getElementById('fileName');

                            // Update the file name display with the selected file name
                            fileNameDisplay.textContent = input.files[0] ? input.files[0].name : '';

                            // Show or hide the file name display based on whether a file is chosen
                            fileNameDisplay.style.display = input.files[0] ? 'block' : 'none';

                        }

                        function toggleLabelVisibility(textarea) {
                            // Get the label element associated with the textarea
                            var label = document.querySelector('label[for="noticeText"]');

                            // Show or hide the label based on whether there is text in the textarea
                            label.style.display = textarea.value.trim() === '' ? 'block' : 'none';
                        }
                    </script>
                </form>
            </div>
        </div>
        <div class="add-event">
            <h3>Add event</h3>
            <div class="event-container">
                <div class="event">
                <form action="notice_add_action.php" method="POST">
                    
                    <div class="event-title">
                      <!-- Title Input -->
                      <label for="eventTitle">Title:</label>
                      <input type="text" id="eventTitle" name="title" required>
                    </div>
                    
                    <div class="date-time">
                        <div class="date">
                          <!-- Date Input -->
                          <label for="eventDate">Date:</label>
                          <input type="date" id="eventDate" name="date" required>
                        </div>
                        <div class="event-time">
                          <!-- Time Input -->
                          <label for="eventTime">Time:</label>
                          <input type="time" id="eventTime" name="time"  required>
                        </div>
                    </div>
                    
                    
                
                    <div class="event-description">
                      <!-- Description Input -->
                      <label for="eventDescription">Description:</label>
                      <textarea id="eventDescription" name="description" rows="4" required></textarea>
                    </div>
                
                    <!-- Submit Button -->
                    <input type="submit" id="submit_btn" class=" btn btn-success"  name="submit">
                 </form>
            </div>
                <div class="table-responsive" style="width: 100%">
                    <table id="myTable5" class="table table-bordered  " style="padding:0.5rem">
                        <thead>
                            <th>#</th>
                            <th>Event-title</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Description</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                                $ret = mysqli_query($con,"select * from `event_notice` where school_id='$id' order by id desc ");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($ret)) {
                            ?>
                            <tr>
                                <td><?php echo $cnt; ?></td>
                                <td><?php echo $row['event_title'] ?></td>
                                <td><?php echo $row['event_date'] ?></td>
                                <td><?php echo $row['event_time'] ?></td>
                                <td><?php echo $row['event_description'] ?></td>
                                <td><a href="notice_event_delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger" >Delete</a></td>
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
        <div id="professor">
            <div class="left">
                <form id="upload-form" enctype="multipart/form-data" action="principal_details.php" method="POST">
                    <div id="upload-container">
                        <label for="image-input1" id="custom-button1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" fill="none">
                                <path d="M16 0.5C7.1635 0.5 0 7.6635 0 16.5C0 25.337 7.1635 32.5 16 32.5C24.837 32.5 32 25.337 32 16.5C32 7.6635 24.837 0.5 16 0.5ZM16 30.5315C8.2805 30.5315 2 24.2195 2 16.4999C2 8.78044 8.2805 2.49994 16 2.49994C23.7195 2.49994 30 8.78047 30 16.4999C30 24.2194 23.7195 30.5315 16 30.5315ZM23 15.5H17V9.5C17 8.948 16.552 8.5 16 8.5C15.448 8.5 15 8.948 15 9.5V15.5H9C8.448 15.5 8 15.948 8 16.5C8 17.052 8.448 17.5 9 17.5H15V23.5C15 24.052 15.448 24.5 16 24.5C16.552 24.5 17 24.052 17 23.5V17.5H23C23.552 17.5 24 17.052 24 16.5C24 15.948 23.552 15.5 23 15.5Z" fill="white" />
                            </svg>
                            Change image
                        </label>
                        
                        <input type="file" id="image-input1" accept="image/*" onchange="previewImage1()" name="image"/>

                    </div>
                        <?php 
                           $sql_img=mysqli_fetch_array(mysqli_query($con,"select * from principal where school_id='$id'"));
                        ?>
                        <div class="img-container" id="img-container1">
                            <img id="default-image1" src="<?php echo $sql_img['principal_image'] ?>" alt="" style="width: 100%; aspect-ratio: 1/1 ; border-radius: 50%;">
                        </div>
                    <!--image fetch-->

                    <input type="submit" value="Submit" id="submit_btn" class=" btn btn-success" name="submit_image">

                </form>
            </div>
            <div class="right">
                <?php 
                   $sql_text=mysqli_fetch_array(mysqli_query($con,"select * from principal where school_id='$id'"));
                ?>
                <form action="principal_details.php" method="POST" enctype="multipart/form-data">
                    <div class="text text2">
                        <label for="noticeText2">
                            Write the name of Principle
                        </label>
                        <input id="noticeText2" name="noticeText2" rows="5" cols="50" style="width: 50%"  value="<?php echo $sql_text['principal_name'] ?>"/>
                    </div>
                    <div class="text text2">
                        <label for="noticeText3">
                            Write his qualifications
                        </label>
                        <input id="noticeText3" name="noticeText3" rows="5" cols="50" style="width: 50%"  value="<?php echo $sql_text['qualification'] ?>"/>
                    </div>
                    <div class="text">
                        <label for="noticeText1">
                            Add massage of principle
                        </label>
                        <textarea id="noticeText1" name="noticeText1" rows="5" cols="50" ><?php echo $sql_text['message'] ?></textarea>
                    </div>
                    <!-- Custom file input container -->
                    

                    
                    
                    <div class="text">
                        <label for="noticeText4">
                            Write about the history of the school in brief
                        </label>
                        <textarea id="noticeText4" name="noticeText4" rows="5" cols="50" ><?php echo $sql_text['school_history'] ?></textarea>
                        
                    </div>
                    
                    <input type="submit" value="Submit" id="submit_btn" class=" btn btn-success" name="submit_details">



                    <script>
                        function displayFileName(input) {
                            // Get the file input and file name display elements
                            var fileNameDisplay = document.getElementById('fileName1');

                            // Update the file name display with the selected file name
                            fileNameDisplay.textContent = input.files[0] ? input.files[0].name : '';

                            // Show or hide the file name display based on whether a file is chosen
                            fileNameDisplay.style.display = input.files[0] ? 'block' : 'none';

                        }

                    </script>
                </form>
                
            </div>
        </div>
        <div class="about-scl">
            <div class="left">
                <form id="upload-form1" method="POST" enctype="multipart/form-data" action="principal_details.php">
                    <div id="upload-container_sig">
                        <label for="image-input9" id="sig">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" fill="none">
                                <path d="M16 0.5C7.1635 0.5 0 7.6635 0 16.5C0 25.337 7.1635 32.5 16 32.5C24.837 32.5 32 25.337 32 16.5C32 7.6635 24.837 0.5 16 0.5ZM16 30.5315C8.2805 30.5315 2 24.2195 2 16.4999C2 8.78044 8.2805 2.49994 16 2.49994C23.7195 2.49994 30 8.78047 30 16.4999C30 24.2194 23.7195 30.5315 16 30.5315ZM23 15.5H17V9.5C17 8.948 16.552 8.5 16 8.5C15.448 8.5 15 8.948 15 9.5V15.5H9C8.448 15.5 8 15.948 8 16.5C8 17.052 8.448 17.5 9 17.5H15V23.5C15 24.052 15.448 24.5 16 24.5C16.552 24.5 17 24.052 17 23.5V17.5H23C23.552 17.5 24 17.052 24 16.5C24 15.948 23.552 15.5 23 15.5Z" fill="white" />
                            </svg>
                            Add image of principle’s signature
                        </label>
                        <input type="submit" value="Submit" name="submit_sign" class=" btn btn-success" id="submit_btn">
                        <input type="file" id="image-input9" accept="image/*" onchange="previewImage9()" style="display: none " name="image" />
                    </div>
                    <?php 
                           $sql_sign=mysqli_fetch_array(mysqli_query($con,"select * from principal where school_id='$id'"));
                        ?>
                    <div class="img-container" id="img-container9" style="width: 50% ; height: 60px">
                        <img id="default-image9" src="<?php echo $sql_sign['sign'] ?>" alt="" style="max-width: 100%; max-height: 100%;">
                    </div>


                    <script>
                        function previewImage9() {
                            var input = document.getElementById('image-input9');
                            var preview = document.getElementById('img-container9');
                            var defaultImage = document.getElementById('default-image9');

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
                </form>

                
                </h4>
            </div>
            <div class="right">
                <form id="upload-form" method="POST" action="principal_details.php" enctype="multipart/form-data">
                    <div id="upload-container">
                        <label for="image-input2" id="custom-button2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" fill="none">
                                <path d="M16 0.5C7.1635 0.5 0 7.6635 0 16.5C0 25.337 7.1635 32.5 16 32.5C24.837 32.5 32 25.337 32 16.5C32 7.6635 24.837 0.5 16 0.5ZM16 30.5315C8.2805 30.5315 2 24.2195 2 16.4999C2 8.78044 8.2805 2.49994 16 2.49994C23.7195 2.49994 30 8.78047 30 16.4999C30 24.2194 23.7195 30.5315 16 30.5315ZM23 15.5H17V9.5C17 8.948 16.552 8.5 16 8.5C15.448 8.5 15 8.948 15 9.5V15.5H9C8.448 15.5 8 15.948 8 16.5C8 17.052 8.448 17.5 9 17.5H15V23.5C15 24.052 15.448 24.5 16 24.5C16.552 24.5 17 24.052 17 23.5V17.5H23C23.552 17.5 24 17.052 24 16.5C24 15.948 23.552 15.5 23 15.5Z" fill="white" />
                            </svg>
                            Change image
                        </label>
                        <input type="submit" value="Submit" class=" btn btn-success" name="submit_school_image" id="submit_btn">
                        <input type="file" name="image" id="image-input2" accept="image/*" onchange="previewImage2()" />
                    </div>
                    <?php 
                           $sql_school_image=mysqli_fetch_array(mysqli_query($con,"select * from principal where school_id='$id'"));
                        ?>
                    <div class="img-container" id="img-container2">
                        <img id="default-image2" src="<?php echo  $sql_school_image['school_image'] ?>" alt="" style="max-width: 100%; max-height: 100%;">
                    </div>


                    ` <script>
                        function previewImage2() {
                            var input = document.getElementById('image-input2');
                            var preview = document.getElementById('img-container2');
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
                </form>
            </div>
        </div>
        <div class="academic">
            <h3>Add Students</h3>
            <div class="students">
                <?php include './components/student.php' ?>
            </div>
        </div>
        <div class="talks">
            <h2>They talk about us</h2>
            <div class="slides">
                <div class="right">
                   
                    <form action="reviews_action.php" method="POST" enctype="multipart/form-data">
                        <div class="text">
                            <label for="noticeText7">
                                Write Heading of Review or highlight a line as a heading of review
                            </label>
                            <textarea id="noticeText7" name="heading" rows="2" cols="40" ></textarea>
                        </div>
                        
                        <div class="text text2">
                            <label for="noticeText9">
                                Write the name of Reviewer
                            </label>
                            <input id="noticeText9" name="user_name" rows="5" cols="50" style="width:50%" />
                        </div>
                        <div class="text text2">
                            <label for="noticeText10">
                                Write his qualifications
                            </label>
                            <input id="noticeText10" name="qualification" rows="5" cols="50" style="width:50%" />
                        </div>
                        <div class="text text2">
                            <label for="imageInput">
                                Image of the reviewer
                            </label>
                            <input type='file' id="imageInput" name="image" onchange="previewImage_rev(this)" style="width:50%" />
                            
                            
                        </div>
                        <div class="text">
                            <label for="noticeText8">
                                Write the Review
                            </label>
                            <textarea id="noticeText8" name="message" rows="5" cols="50" ></textarea>
                        </div>
                        
                        <input type="submit" value="Submit" class=" btn btn-success" name="submit_review" id="submit_btn">
                        
                        <script>
                            function previewImage_rev(input) {
                                var preview = document.getElementById('imagePreview_rev');
                                var file = input.files[0];
                                var reader = new FileReader();
                    
                                reader.onloadend = function () {
                                    preview.src = reader.result;
                                }
                    
                                if (file) {
                                    reader.readAsDataURL(file);
                                } else {
                                    // Set a default image if no file is selected
                                    preview.src = './src/img/person3.webp';
                                }
                            }
                        </script>
                    </form>
                    
                    
                     <!-- Set a default image for the preview -->
                    <div class="img-container" style="width:250px; height: 250px;">
                        <img id="imagePreview_rev" src="./src/img/person3.webp" alt="Image Preview" style="max-width: 100%; max-height: 100%; border-radius: 50%;" />
                    </div>
                </div>
            </div>    
        </div>
        <div class="table table-responsive" style="width: 100%">
            <table id="myTable_rev" class="table table-bordered  ">
                <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Review</th>
                    <th>Reviewer</th>
                    <th>Image</th>
                    <th>Qualification</th>
                    <th>Action</th>
                </thead>
                <tbody>
                        <?php
                            $ret = mysqli_query($con,"select * from `reviews` where schol_id='$id' order by id desc ");
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($ret)) {
                        ?>
                    
                    <tr >
                        <td><?php echo $cnt; ?></td>
                        <td><?php echo $row['title'] ?></td>
                        <td style="font-size: 0.8rem;"><?php echo $row['review'] ?></td>
                        <td><?php echo $row['name_of_reviewer'] ?></td>
                        <td><img src="<?php echo $row['user_image'] ?>" alt="" style = "width: 60px ; aspect-ratio:1/1;"></td>
                        <td><?php echo $row['qualification'] ?></td>
                        <td><a href="review_delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger" >Delete</a></td>
                    </tr>
                    <?php
                        $cnt = $cnt + 1;
                        }
                    ?>
                    
                </tbody>
            </table>
            
            <script>
                let table_rev = new DataTable('#myTable_rev');
            </script>
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
    function previewImage1() {
        var input = document.getElementById('image-input1');
        var preview = document.getElementById('img-container1');
        var defaultImage = document.getElementById('default-image1');

        while (preview.firstChild) {
            preview.removeChild(preview.firstChild);
        }

        var file = input.files[0];
        if (file) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                // img.style.width = '400px';
                // img.style.height = '400px';
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
    // Get the list items and content div
    const listItems = document.querySelectorAll('.head ul li');
    const contentItems = document.querySelectorAll('.event');

    listItems[1].classList.add('active');
    // Add click event listeners to list items
    listItems.forEach((item, index) => {
        item.addEventListener('click', () => {
            // Hide all content items
            contentItems.forEach(contentItem => {
                contentItem.style.display = 'none';
            });

            // Show the corresponding content item
            contentItems[index].style.display = 'block';

            // Remove active class from all list items
            listItems.forEach(li => {
                li.classList.remove('active');
            });

            // Add active class to the clicked list item
            item.classList.add('active');

            event.preventDefault();
        });
    });
</script>



