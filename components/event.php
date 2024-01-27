<?php include './components/head.php' ?>
<?php include './components/scripts.php' ?>
<?php include './components/styles.php' ?>
<?php include 'C:\xampp\htdocs\projects\school\config\db_con.php' ?>

<style>
    .events{
        flex-direction: column;
        gap: 1.5rem
    }
</style>

<div id="events" class="head" style="width: 100%">
    <ul>
        <li id="ongoing-tab" class="active"><a class="" href="#events">Ongoing</a></li>
        <li id="upcoming-tab"><a class="" href="#events">Upcoming</a></li>
        <li id="complete-tab"><a class="" href="#events">Complete</a></li>
    </ul>
    <div class="content">
        <div id="ongoing-component" class="events">
            <?php
                date_default_timezone_set('Asia/Kolkata');
                $date = date('Y-m-d');
                $ret = mysqli_query($con, "select * from `event_notice` where event_date='$date' order by id desc ");
                $cnt = 1;
                if (mysqli_num_rows($ret) > 0) {
                    
                   while ($row = mysqli_fetch_array($ret)) {
                        $event_date = $row['register_date'];
                    
                        if (!is_numeric($event_date)) {
                            $event_date = strtotime($event_date);
                        }
                    
                        // Get the day name from the timestamp
                        $dayName = date("l", $event_date);
                        $day = $row['event_date'];
                    
                        // Convert the date string to a timestamp
                        $timestamp = strtotime($day);
                    
                        // Extract month name and date
                        $monthName = date("F", $timestamp); // Full month name
                        $date = date("d", $timestamp); // Day of the month
                        ?>
                        <div class="event">
                            <div class="top">
                                <div class="date">
                                    <h4><?php echo $monthName; ?></h4><span><?php echo $date; ?></span>
                                    <h4><?php echo date("h:i A", strtotime($row['event_time'])); ?></h4>
                                </div>
                                <div class="details">
                                    <div class="left">
                                        <div class="topic">
                                            <h3><?php echo $row['event_title'] ?></h3>
                                            <h5><?php echo $dayName; ?></h5>
                                        </div>
                                        <div class="about">
                                            <h6><?php echo $row['event_description'] ?></h6><span></span>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <div class="event-time select">
                                            <h4>Ongoing </h4>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="bottom">
                                <a href="https://www.google.com/calendar/render?action=TEMPLATE&text=<?php echo urlencode($row['event_title']); ?>&dates=<?php echo date('Ymd\THis\Z', strtotime($row['event_date'])); ?>/<?php echo date('Ymd\THis\Z', strtotime($row['event_date'] . ' +1 hour')); ?>&details=<?php echo urlencode($row['event_description']); ?>&location=<?php echo urlencode($row['event_location']); ?>" target="_blank" class="calendar">
                                    <h4>Mark on Calendar</h4>
                                </a>
                            </div>
                        </div>
                        <?php
                        $cnt = $cnt + 1;
                    }
                }
                else {
                    // Display a message when there are no events
                    ?>
                    <div class="no-event">
                        <p>No event Ongoing at this moment</p>
                    </div>
                    <?php
                }
            ?>

        </div>
        <div id="upcoming-component" class="events" style="display: none;">
             <!--Content for Upcoming Tab -->
            <?php
                date_default_timezone_set('Asia/Kolkata');
                $date = date('Y-m-d');
                $ret = mysqli_query($con, "select * from `event_notice` where event_date>'$date' order by id desc LIMIT 3 ");
                $cnt = 1;
                if (mysqli_num_rows($ret) > 0) {
                      while ($row = mysqli_fetch_array($ret)) {
                            $event_date = $row['register_date'];
                        
                            if (!is_numeric($event_date)) {
                                $event_date = strtotime($event_date);
                            }
                        
                            // Get the day name from the timestamp
                            $dayName = date("l", $event_date);
                            $day = $row['event_date'];
                        
                            // Convert the date string to a timestamp
                            $timestamp = strtotime($day);
                        
                            // Extract month name and date
                            $monthName = date("F", $timestamp); // Full month name
                            $date = date("d", $timestamp); // Day of the month
                            ?>
                            <div class="event">
                                <div class="top">
                                    <div class="date">
                                        <h4><?php echo $monthName; ?></h4><span><?php echo $date; ?></span>
                                        <h4><?php echo date("h:i A", strtotime($row['event_time'])); ?></h4>
                                    </div>
                                    <div class="details">
                                        <div class="left">
                                            <div class="topic">
                                                <h3><?php echo $row['event_title'] ?></h3>
                                                <h5><?php echo $dayName; ?></h5>
                                            </div>
                                            <div class="about">
                                                <h6><?php echo $row['event_description'] ?></h6><span></span>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <div class="event-time select">
                                                <h4>Upcoming</h4>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="bottom">
                                    <a href="https://www.google.com/calendar/render?action=TEMPLATE&text=<?php echo urlencode($row['event_title']); ?>&dates=<?php echo date('Ymd\THis\Z', strtotime($row['event_date'])); ?>/<?php echo date('Ymd\THis\Z', strtotime($row['event_date'] . ' +1 hour')); ?>&details=<?php echo urlencode($row['event_description']); ?>&location=<?php echo urlencode($row['event_location']); ?>" target="_blank" class="calendar">
                                        <h4>Mark on Calendar</h4>
                                    </a>
                                </div>
                            </div>
                            <?php
                            $cnt = $cnt + 1;
                        }
                }
                else
                {
                    // Display a message when there are no events
                    ?>
                    <div class="no-event">
                        <p>No event Upcoming at this moment</p>
                    </div>
                    <?php
                }
            ?>
        </div>
        <div id="complete-component" class="events" style="display: none;">
             <!--Content for Complete Tab -->
            <?php
                date_default_timezone_set('Asia/Kolkata');
                $date = date('Y-m-d');
                $ret = mysqli_query($con, "select * from `event_notice` where event_date<'$date' order by id desc LIMIT 3 ");
                $cnt = 1;
                if (mysqli_num_rows($ret) > 0) {
                    while ($row = mysqli_fetch_array($ret)) {
                            $event_date = $row['register_date'];
                        
                            if (!is_numeric($event_date)) {
                                $event_date = strtotime($event_date);
                            }
                        
                            // Get the day name from the timestamp
                            $dayName = date("l", $event_date);
                            $day = $row['event_date'];
                        
                            // Convert the date string to a timestamp
                            $timestamp = strtotime($day);
                        
                            // Extract month name and date
                            $monthName = date("F", $timestamp); // Full month name
                            $date = date("d", $timestamp); // Day of the month
                            ?>
                            <div class="event" >
                                <div class="top">
                                    <div class="date">
                                        <h4><?php echo $monthName; ?></h4><span><?php echo $date; ?></span>
                                        <h4><?php echo date("h:i A", strtotime($row['event_time'])); ?></h4>
                                    </div>
                                    <div class="details">
                                        <div class="left">
                                            <div class="topic">
                                                <h3><?php echo $row['event_title'] ?></h3>
                                                <h5><?php echo $dayName; ?></h5>
                                            </div>
                                            <div class="about">
                                                <h6><?php echo $row['event_description'] ?></h6><span></span>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <div class="event-time select">
                                                <h4>Complete</h4>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="bottom">
                                    <a href="https://www.google.com/calendar/render?action=TEMPLATE&text=<?php echo urlencode($row['event_title']); ?>&dates=<?php echo date('Ymd\THis\Z', strtotime($row['event_date'])); ?>/<?php echo date('Ymd\THis\Z', strtotime($row['event_date'] . ' +1 hour')); ?>&details=<?php echo urlencode($row['event_description']); ?>&location=<?php echo urlencode($row['event_location']); ?>" target="_blank" class="calendar">
                                        <h4>Mark on Calendar</h4>
                                    </a>
                                </div>
                            </div>
                            <?php
                            $cnt = $cnt + 1;
                        }
                }
                else
                {
                    // Display a message when there are no events
                    ?>
                        <div class="no-event">
                            <p>No Complete Event Present at this moment</p>
                        </div>
                    <?php
                }
            ?>
        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const tabs = ['ongoing', 'upcoming', 'complete'];
        const defaultTab = 'upcoming';

        const activateTab = (tab) => {
            tabs.forEach((t) => {
                document.getElementById(`${t}-component`).style.display = t === tab ? 'flex' : 'none';
                document.getElementById(`${t}-tab`).classList.toggle('active', t === tab);
            });
        };

        activateTab(defaultTab);

        tabs.forEach((tab) => {
            document.getElementById(`${tab}-tab`).addEventListener('click', () => {
                activateTab(tab);
            });
        });
    });
</script>

