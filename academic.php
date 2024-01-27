<!--php Start-->

<?php
 include('./config/db_con.php');
 
?>



<!--php End-->

<?php include './components/head.php' ?>
<?php include './components/scripts.php' ?>
<?php include './components/styles.php' ?>


<?php include './components/navbar.php' ?>





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


<?php include './components/footer.php' ?>

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
                    </div>
                    <div class="container">
                        <?php
                            $result = mysqli_query($con, "SELECT class FROM `subject_list`  GROUP BY class");
                            // Loop through each class
                            while ($classRow = mysqli_fetch_array($result)) {
                                $class = $classRow['class'];
                            
                                // Retrieve subjects for the current class
                                $subjectsResult = mysqli_query($con, "SELECT subject FROM `subject_list` WHERE class='$class' ");
                            
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
                                                <li><?php echo $subject; ?></li>
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

                <div class="class">
                    
                    <table id="myTable_3" class="table table-bordered  ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Class</th>
                                <th>Year</th>
                                <th>Pdf</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Add your table data rows here -->
                            <?php
                                $ret = mysqli_query($con,"select * from `previous_year_question_paper`  order by id desc ");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($ret)) {
                            ?>
                                <tr>
                                    <td><?php echo $cnt; ?></td>
                                    <td><?php echo $row['class']; ?></td>
                                    <td><?php echo $row['year']; ?></td>
                                    <td><a href="./admin/uploads_old_question_paper/<?php echo $row['pdf']; ?>" target="_blank">View</a></td>
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
                </div>
                <div class="items">
                    <?php
                               // Retrieve distinct classes from the model_question_paper table
                                $result = mysqli_query($con, "SELECT class FROM `model_question_paper`  GROUP BY class");
                                
                                // Loop through each class
                                while ($classRow = mysqli_fetch_array($result)) {
                                    $class = $classRow['class'];
                                
                                    // Retrieve subjects for the current class
                                    $subjectsResult = mysqli_query($con, "SELECT subject, pdf FROM `model_question_paper` WHERE class='$class' ");
                                
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
                                                <a href="./admin/model_question_paper/<?php echo $pdfPath; ?>" target="_blank">
                                                    <li>
                                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="hand-point-right" class="svg-inline--fa fa-hand-point-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="currentColor" d="M480 96c17.7 0 32 14.3 32 32s-14.3 32-32 32l-208 0 0-64 208 0zM320 288c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0zm64-64c0 17.7-14.3 32-32 32l-48 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l48 0c17.7 0 32 14.3 32 32zM288 384c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0zm-88-96l.6 0c-5.4 9.4-8.6 20.3-8.6 32c0 13.2 4 25.4 10.8 35.6C177.9 364.3 160 388.1 160 416c0 11.7 3.1 22.6 8.6 32l-8.6 0C71.6 448 0 376.4 0 288l0-61.7c0-42.4 16.9-83.1 46.9-113.1l11.6-11.6C82.5 77.5 115.1 64 149 64l27 0c35.3 0 64 28.7 64 64l0 88c0 22.1-17.9 40-40 40s-40-17.9-40-40l0-56c0-8.8-7.2-16-16-16s-16 7.2-16 16l0 56c0 39.8 32.2 72 72 72z"></path>
                                                        </svg>
                                                        <?php echo $subject; ?>
                                                    </li>
                                                </a>
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
                let table_3 = new DataTable('#myTable_3');
            </script>