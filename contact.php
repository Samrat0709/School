
<?php include('./config/db_con.php'); ?>
<?php include './components/head.php' ?>
<?php include './components/scripts.php' ?>
<?php include './components/styles.php' ?>


<?php include './components/navbar.php' ;
 $sql=mysqli_fetch_array(mysqli_query($con,"select * from admin_login where id='1'"));?>


<div id="contact">
    <div class="top"><img src="./src/img/red.webp" class="red" alt="">
        <h2>CONTACT US</h2>
        <div class="contact-top">
            <div class="map"><img src="./src/img/map.png" alt=""></div>
            <h4>Alipurduar Rly.Jnc., Chechakhata, West Bengal 736123</h4>
        </div>
    </div>
    <div id="location">
        <div class="bus">
            <div class="img-container"><img src="./src/img/bus.webp" alt=""></div>
            <!--<h4>Alipurduar Rly.Jnc., Chechakhata, West Bengal 736123</h4>-->
        </div>
        <div class="details">
            <div class="items">
                <div class="item">
                    <div class="item-left">
                        <div class="icon"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="location-dot" class="svg-inline--fa fa-location-dot " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                <path fill="currentColor" d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"></path>
                            </svg></div>
                        <h4>ADDRESS</h4>
                    </div>
                    <div class="item-right">
                        <p><?php echo $sql['address']; ?></p>
                    </div>
                </div>
                <div class="item">
                    <div class="item-left">
                        <div class="icon"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone" class="svg-inline--fa fa-phone " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor" d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"></path>
                            </svg></div>
                        <h4>PHONE NO.</h4>
                    </div>
                    <div class="item-right">
                        <p>+91 <?php echo $sql['phone']; ?> <span>(OFFICE STAFF)</span></p>
                        <p>+91 <?php echo $sql['official_contact_number_security']; ?> <span>(SECURITY)</span></p>
                        <p>+91 <?php echo $sql['official_contact_number_administration']; ?> <span>(ADMINISTRATION)</span></p>
                    </div>
                </div>
                <div class="item">
                    <div class="item-left">
                        <div class="icon"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope" class="svg-inline--fa fa-envelope " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor" d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"></path>
                            </svg></div>
                        <h4>EMAIL</h4>
                    </div>
                    <div class="item-right">
                        <p><?php echo $sql['email']; ?></p>
                    </div>
                </div>
                <div class="item">
                    <div class="item-left">
                        <div class="icon"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="whatsapp" class="svg-inline--fa fa-whatsapp " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path fill="currentColor" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path>
                            </svg></div>
                        <h4>WHATSAPP</h4>
                    </div>
                    <div class="item-right">
                        <p>+91 <?php echo $sql['whatsapp_number']; ?><span>(ADMISSION)</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="contact">
        <div class="contact-container">
            <div class="contact">
                <div class="contact-box box1">
                    <h5>Sent Feedback</h5>
                    <div class="sent_msg">
                        <form method="POST" action="feedback_action.php">
                            <div class="contact-details">
                                <div>
                                    <input type="text" id="name" name="name" class="bottom-border-input" placeholder="Name" required="">
                                    <input type="text" id="phone" name="phone" class="bottom-border-input" placeholder="Phone Num" required="">
                                </div>
                                <div>
                                    <input type="email" id="email" name="email" class="bottom-border-input" placeholder="Email Address" required="">
                                    <input type="text" id="subject" name="subject" class="bottom-border-input" placeholder="Subject" required="">
                                </div>
                            </div>
                            <div>
                                <input type="text" id="Message" name="message" class="bottom-border-input" placeholder="Message" required="">
                            </div>
                            <div class="box1-bottom">
                                <input id="con-sub" type="submit" name="submit" value="SUBMIT" />
                            </div>
                                
                        </form>
                    </div>
                </div>
                <div class="contact-box box2">
                    <div class="box-top">
                        <h5>Contact Information</h5>
                    </div>
                    <div class="info-container">
                        <p>rhsalipur@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include './components/footer.php' ?>