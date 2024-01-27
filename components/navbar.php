<?php include './components/head.php' ?>
<?php include './components/scripts.php' ?>
<?php include './components/styles.php' ?>


<style>
    /*.navbar-brand{*/
    /*    display: grid !important;*/
    /*    grid-template-columns: 1.8fr 1fr;*/
    /*}*/
    .nav-left{
        padding: 0 2rem;
        padding-right: 0;
        display: flex;
        align-items: center;
        gap: 2rem;
    }
    .nav-right{
        display: flex;
        justify-content: space-evenly;
        gap: 2rem;
    }
    .logo3{
        width: 90px;
        aspect-ratio: 1/1;
        /*border-radius: 50%;*/
    }
</style>

<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand">
                <div class="nav-left">
                    <?php 
                       $row =mysqli_fetch_array(mysqli_query($con,"select * from school_details order by id desc "));
                    ?>
                    <img src="./admin/<?php echo $row['school_logo'] ?> " class="logo" alt="">
                    <h1><?php echo $row['school_name'] ?></h1>
                    
                </div>
                
                <div class="nav-right">
                    <img src="./admin/<?php echo $row['school_logo_two'] ?> " class="logo3" alt="">
                    <?php
                        $ret = mysqli_query($con, "select * from `other_logo` order by id desc LIMIT 3");
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($ret)) {
                    ?>
                    <img src="./admin/<?php echo $row['others_logo'] ?>" class="logo3" alt="">
                    <?php
                        $cnt=$cnt+1;
                      }
                    ?>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="index.php" data-rr-ui-event-key="/" class="nav-link" aria-current="page">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="about.php" data-rr-ui-event-key="/about" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="academic.php" data-rr-ui-event-key="/academic/" class="nav-link">Academics</a>
                    </li>
                    <li class="nav-item">
                        <a href="admission.php" data-rr-ui-event-key="/admission" class="nav-link">Admission</a>
                    </li>
                    <li class="nav-item">
                        <a href="faculty.php" data-rr-ui-event-key="/faculty" class="nav-link">Faculty</a>
                    </li>
                    <li class="nav-item">
                        <a href="#home" data-rr-ui-event-key="#home" class="nav-link">Alumni</a>
                    </li>
                    <!--<li class="nav-item">-->
                    <!--    <a href="#home" data-rr-ui-event-key="#home" class="nav-link">Campus</a>-->
                    <!--</li>-->
                    <li class="nav-item">
                        <a href="achievement.php" data-rr-ui-event-key="/achievement" class="nav-link">Achievments</a>
                    </li>
                    <li class="nav-item">
                        <a href="mandatory_public_disclosure.php" data-rr-ui-event-key="/mandatory_public_disclosure" class="nav-link">Mandatory public disclosure</a>
                    </li>
                    <li class="nav-item">
                        <a href="gallery.php" data-rr-ui-event-key="/gallery" class="nav-link">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a href="calendar.php" data-rr-ui-event-key="/calendar/" class="nav-link">Calender</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact.php" data-rr-ui-event-key="/contact" class="nav-link">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>