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
<?php include '../config/db_con.php' ?>



<style>
    .footer-admin{
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem 0;
    }
    #footer{
        width: 100%;
        height: 100vh;
        overflow: auto;
    }
    #footer form {
        display: flex;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 50%;
        flex-direction: column;
        justify-content: center;
        gap: 2rem;
        font-family: 'Poppins',sans-serif;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
    }

    input {
      width: 100%;
      padding: 8px;
      margin-bottom: 16px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    /*input[type="submit"] {*/
    /*  background-color: #4caf50;*/
    /*  color: #fff;*/
    /*  cursor: pointer;*/
    /*}*/

    /*input[type="submit"]:hover {*/
    /*  background-color: #45a049;*/
    /*}*/
 </style>


<div id="container">
    <?php include './components/sidebar.php' ?>
    <div id="footer">
        <div class="footer-admin">
            <form action="footer_action.php" method="POST">
                        <?php 
                           $row=mysqli_fetch_array(mysqli_query($con,"select * from `footer` where id='1'"));
                        ?>
                <div class="address">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" value="<?php echo $row['address'] ?>" required>
                </div>
                <div class="email">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $row['email'] ?>" required>
                </div>
                <div class="mobile">
                    <label for="mobile">Mobile Number:</label>
                    <input type="tel" id="mobile" name="phone" value="<?php echo $row['mobile'] ?>" required>
                </div>
                <div class="twitter">
                    <label for="twitter">Email:</label>
                    <input type="email" id="twitter" name="twitter" value="<?php echo $row['twitter'] ?>" placeholder="Email Id">
                </div>
                <div class="facebook">
                    <label for="facebook">Facebook:</label>
                    <input type="text" id="facebook" name="facebook" value="<?php echo $row['facebook'] ?>" placeholder="Facebook Profile URL">
                </div>
                <div class="instagram">
                    <label for="instagram">Instagram:</label>
                    <input type="text" id="instagram" name="instagram" value="<?php echo $row['instagram'] ?>" placeholder="Instagram Username">
                </div>
                <div class="other">
                    <label for="otherLinks">Other Links:</label>
                    <input type="text" id="otherLinks" name="other_link" value="<?php echo $row['other_link'] ?>" placeholder="e.g., LinkedIn, GitHub">
                </div>

                <input type="submit" id="submit_btn" class="btn btn-success" name="submit" value="Submit">
            </form>
        </div>
        
        
    </div>
</div>
