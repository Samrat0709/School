<!--php Start-->

<?php
 session_start();
 include('../config/db_con.php');
 $msg='';
 if(isset($_POST['submit']))
 {
     $userid=mysqli_real_escape_string($con,$_POST['userid']);
     $password=mysqli_real_escape_string($con,$_POST['password']);
     $sql="select * from admin_login where username='$userid' and password='$password'";
     $res=mysqli_query($con,$sql);
     $count=mysqli_num_rows($res);
     if($count>0)
     {
         $row=mysqli_fetch_assoc($res);
         $_SESSION['UID']=$row['id'];
         header('location:home.php');
         die();
     }
     else
     {
         $msg="Please Enter Valid Details";
     }
 }

?>

<!--php End-->



<?php include './components/head.php' ?>
<?php include './components/scripts.php' ?>
<?php include './components/styles.php' ?>
    <title>Login</title>

    <body>
        
    <section id="log-in">
        <div class="login-form">
            <form action="" method="POST">
                <div class="container">
                    <div class="form-group">
                        <label for="email">EMAIL ADDRESS</label>
                        <input type="text" id="email" name="userid" placeholder="User Name" required>
                    </div>
                    <div class="form-group">
                        <label for="password">PASSWORD</label>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                        <!--<p><a href="forgot_password.php">Forgot Password?</a></p>-->
                    </div>
                    <div class="submit-btn">
                        <input type="submit"  name="submit" value="Log In">
                    </div>
                    <span style="color:red;"><?php echo $msg; ?></span>
                </div>
            </form>
        </div>
    </section>

    </body>