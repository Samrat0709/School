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
    #myTable_1_wrapper{
        width:80%;
    }
</style>

<div id="container">
    <?php include './components/sidebar.php' ?>
    <div id="academic">
        <div id="academicNav">
            <div class="top-text">
                <h2>ACADEMICS</h2>
            </div>
            <div class="banner">
                <ul>
                    <li class="tab" id="subjectTab">Subject Offered</li>
                    <li class="tab" id="questionsTab">Previous Year Questions</li>
                    <li class="tab" id="paperTab">Model Paper</li>
                </ul>
            </div>
        </div>

        <div class="content" id="content">
            <!-- Content for the "Questions" tab will be inserted here -->
        </div>
    </div>
</div>







<script>
    const tabs = document.querySelectorAll('.tab');
    const contentDiv = document.getElementById('content');
    
    
    
    // Event listeners for each tab
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            // Remove active-tab class from all tabs
            tabs.forEach(tab => tab.classList.remove('active-tab'));

            // Add active-tab class to the clicked tab
            tab.classList.add('active-tab');

            // Update content based on the clicked tab
            if (tab.id === 'subjectTab') {
                contentDiv.innerHTML = `
                    <div class="head">
                        <h3>Subject Offered</h3>
                        <form action="subject_list.php" method="POST">
                            <div class="subject">
                                <label for="subjectName" id="nameLabel">Add New Subject</label>
                                <input type="text" id="subjectName" name="subjectName" required onfocus="hideLabel('nameLabel')">
                            </div>
                            

                            <select id="class" name="class" onchange="updateCountryLabel()">
                                <option value="" disabled selected>Select Class</option>
                                <option value="V">V</option>
                                <option value="VI">VI</option>
                                <option value="VII">VII</option>
                                <option value="VIII">VIII</option>
                                <option value="IX">IX</option>
                                <option value="X">X</option>
                                <option value="XI(ARTS)">XI(ARTS)</option>
                                <option value="XI(SCIENCE)">XI(SCIENCE)</option>
                                <option value="XI(COMMERCE)">XI(COMMERCE)</option>
                                <option value="XII(ARTS)">XII(ARTS)</option>
                                <option value="XII(SCIENCE)">XII(SCIENCE)</option>
                                <option value="XII(COMMERCE)">XII(COMMERCE)</option>
                            </select>

                            <input type="submit" id="submit" value="Submit" name="submit">       
                        </form>
                    </div>
                    <div class="container">
                        <?php
                            $result = mysqli_query($con, "SELECT class FROM `subject_list` where school_id='$id' GROUP BY class");
                            // Loop through each class
                            while ($classRow = mysqli_fetch_array($result)) {
                                $class = $classRow['class'];
                            
                                // Retrieve subjects for the current class
                                $subjectsResult = mysqli_query($con, "SELECT subject FROM `subject_list` WHERE class='$class' AND school_id='$id'");
                            
                                // Display the card for each class
                                ?>
                                <div class="box">
                                    <div class="left-text">
                                        <h4>Subjects offered for Class <?php echo $class; ?>:</h4>
                                    </div>
                                    <div class="right-text">
                                        <ol>
                                            <?php
                                            // Loop through subjects for the current class
                                            while ($subjectRow = mysqli_fetch_array($subjectsResult)) {
                                                $subject = $subjectRow['subject'];
                                                ?>
                                                <li><?php echo $subject; ?> <a href="subject_delete.php?id=<?php echo $subjectRow['id'] ?>" >Delete</a> </li>
                                            <?php
                                            }
                                            ?>
                                        </ol>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                    </div>    
                `;
            } else if (tab.id === 'questionsTab') {
                contentDiv.innerHTML = `
                <div class="head">
                    <form action="old_question_paper_action.php" enctype="multipart/form-data" method="POST">
                        <div class="file-container">
                            <label for="pdfFiles" id="fileLabel">Upload PYQ(PDF)</label>
                            <input type="file" id="pdfFiles" name="pdfFiles" accept=".pdf" multiple onchange="updateFileNames()"
                                required style="display: none;">

                            <div class="file-name" id="fileNamesContainer" style="display: none;">
                                <ul id="fileNamesList"></ul>
                                <button type="button" class="remove-button" onclick="removeFiles()">Remove All</button>
                            </div>
                        </div>
                        <div class="class">
                            <select id="class" name="class" >
                                <option value="" disabled selected>Select Class</option>
                                <option value="V">V</option>
                                <option value="VI">VI</option>
                                <option value="VII">VII</option>
                                <option value="VII">VII</option>
                                <option value="IX">IX</option>
                                <option value="X">X</option>
                                <option value="XI(ARTS)">XI(ARTS)</option>
                                <option value="XI(SCIENCE)">XI(SCIENCE)</option>
                                <option value="XI(COMMERCE)">XI(COMMERCE)</option>
                                <option value="XII(ARTS)">XII(ARTS)</option>
                                <option value="XII(SCIENCE)">XII(SCIENCE)</option>
                                <option value="XII(COMMERCE)">XII(COMMERCE)</option>

                            </select>
                        </div>
                        <div class="year">
                            <select id="year" name="year" >
                                <option value="" disabled selected>Select year</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                            </select>
                        </div>


                        <input type="submit" id="submit" value="Submit" name="submit">

                    </form>
                </div>
                <div class="table table-responsive">
                    
                    <table id="myTable-cls" class="table table-bordered " >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Class</th>
                                <th>Year</th>
                                <th>Pdf</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Add your table data rows here -->
                            <?php
                                $ret = mysqli_query($con,"select * from `previous_year_question_paper` where school_id='$id' order by id desc ");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($ret)) {
                            ?>
                                <tr>
                                    <td><?php echo $cnt; ?></td>
                                    <td><?php echo $row['class']; ?></td>
                                    <td><?php echo $row['year']; ?></td>
                                    <td><a href="./uploads_old_question_paper/<?php echo $row['pdf']; ?>" target="_blank">View</a></td>
                                    <td><a href="previous_year_question_delete.php?id=<?php echo $row['id'] ?>">Delete</a></td>
                                </tr>
                            <?php
                                $cnt = $cnt + 1;
                                }
                            ?>
                            
                        </tbody>
                    </table>
                   
                </div>

                     
                `;
            } else if (tab.id === 'paperTab') {
                contentDiv.innerHTML = `
                <div class="head">
                    <h3>Model Paper All Subject Class wise 2022-23</h3>
                    <p>Model Question Papers for Classes X and XII were prepared by NCERT and communicated to CBSE. The question papers are prepared in the light of recommendations of position paper on Examination Reforms and National Curriculum Framework, 2023.</p>
                    <form action="model_question_paper_action.php" enctype="multipart/form-data" method="POST">
                        <div class="file-container">
                            <label for="pdfFiles" id="fileLabel">Upload PYQ(PDF)</label>
                            <input type="file" id="pdfFiles" name="pdfFiles" accept=".pdf" multiple onchange="updateFileNames()"
                                required style="display: none;">

                            <div class="file-name" id="fileNamesContainer" style="display: none;">
                                <ul id="fileNamesList"></ul>
                                <button type="button" class="remove-button" onclick="removeFiles()">Remove All</button>
                            </div>
                        </div>
                        <div class="subject">
                            <label for="subjectName" id="nameLabel">Subject</label>
                            <input type="text" id="subjectName" name="subjectName" required onfocus="hideLabel('nameLabel')">
                        </div>
                        <select id="class" name="class" >
                                <option value="" disabled selected>Select Class</option>
                                <option value="V">V</option>
                                <option value="VI">VI</option>
                                <option value="VII">VII</option>
                                <option value="VIII">VIII</option>
                                <option value="IX">IX</option>
                                <option value="X">X</option>
                                <option value="XI(ARTS)">XI(ARTS)</option>
                                <option value="XI(SCIENCE)">XI(SCIENCE)</option>
                                <option value="XI(COMMERCE)">XI(COMMERCE)</option>
                                <option value="XII(ARTS)">XII(ARTS)</option>
                                <option value="XII(SCIENCE)">XII(SCIENCE)</option>
                                <option value="XII(COMMERCE)">XII(COMMERCE)</option>

                            </select>
                        <div class="year">
                            <select id="year" name="year" >
                                <option value="" disabled selected>Select year</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                            </select>
                        </div>


                        <input type="submit" id="submit" value="Submit" name="submit">

                    </form>
                </div>
                <div class="items">
                            <?php
                               // Retrieve distinct classes from the model_question_paper table
                                $result = mysqli_query($con, "SELECT class FROM `model_question_paper` where school_id='$id' GROUP BY class");
                                
                                // Loop through each class
                                while ($classRow = mysqli_fetch_array($result)) {
                                    $class = $classRow['class'];
                                
                                    // Retrieve subjects for the current class
                                    $subjectsResult = mysqli_query($con, "SELECT subject, pdf FROM `model_question_paper` WHERE class='$class' AND school_id='$id'");
                                
                                    // Display the card for each class
                                    ?>
                                    <div class="item">
                                        <h4>Class <?php echo $class; ?></h4>
                                        <ul>
                                            <?php
                                            // Loop through subjects for the current class
                                            while ($subjectRow = mysqli_fetch_array($subjectsResult)) {
                                                $subject = $subjectRow['subject'];
                                                $pdfPath = $subjectRow['pdf'];
                                                ?>
                                                <li>
                                                
                                                    <a href="./model_question_paper/<?php echo $pdfPath; ?>" style="color: #000;" target="_blank">
                                                        
                                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="hand-point-right" class="svg-inline--fa fa-hand-point-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                <path fill="currentColor" d="M480 96c17.7 0 32 14.3 32 32s-14.3 32-32 32l-208 0 0-64 208 0zM320 288c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0zm64-64c0 17.7-14.3 32-32 32l-48 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l48 0c17.7 0 32 14.3 32 32zM288 384c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0zm-88-96l.6 0c-5.4 9.4-8.6 20.3-8.6 32c0 13.2 4 25.4 10.8 35.6C177.9 364.3 160 388.1 160 416c0 11.7 3.1 22.6 8.6 32l-8.6 0C71.6 448 0 376.4 0 288l0-61.7c0-42.4 16.9-83.1 46.9-113.1l11.6-11.6C82.5 77.5 115.1 64 149 64l27 0c35.3 0 64 28.7 64 64l0 88c0 22.1-17.9 40-40 40s-40-17.9-40-40l0-56c0-8.8-7.2-16-16-16s-16 7.2-16 16l0 56c0 39.8 32.2 72 72 72z"></path>
                                                            </svg>
                                                            <?php echo $subject; ?>
                                                        
                                                        
                                                    </a>
                                                    <a href="model_paper_delete.php?id=<?php echo $classRow['id'] ?>" >Delete</a> 
                                                </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <?php
                                }
                                ?>
                    
                           
                       
                 `;
            }
        });
    });

    // Set "Previous Year Questions" tab as the default active tab
    document.getElementById('questionsTab').click();
</script>

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

    function removeFiles() {
        var fileInput = document.getElementById('pdfFiles');
        var fileNamesContainer = document.getElementById('fileNamesContainer');

        fileInput.value = ''; // Clear the file input
        fileNamesContainer.style.display = 'none';
        document.getElementById('fileLabel').style.display = 'block';
    }
</script>

<script>
    function hideLabel(labelId) {
        document.getElementById(labelId).style.display = 'none';
    }
</script>

 <script>
    let table-scl = new DataTable('#myTable-scl');
</script>



