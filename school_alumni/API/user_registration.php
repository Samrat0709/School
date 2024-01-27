<?php
require("connection.php");
	
	$name=$_POST["name"];
	$email=$_POST["email"];
	$password=$_POST["password"];
	$dob=$_POST['dob'];
	$passout_year=$_POST['passout_year'];
// 	verification Document
    $verification_document = $_FILES['verification_document']['name'];
    $imagePath = "./verification_document/".$verification_document;
// 	verification Document
	
// 	User Pic
    $user_pic = $_FILES['user_pic']['name'];
    $imagePaths = "./user_pic/".$user_pic;
// 	User Pic
	$user_name=$_POST['user_name'];
	$bio=$_POST['bio'];

    
  $checkUser="SELECT * from user WHERE email='$email'";
  $checkQuery=mysqli_query($con,$checkUser);
  $rowcount=mysqli_num_rows($checkQuery);

  if($rowcount<=0)
  {
     
         $insertQuery="INSERT INTO `user`(`id`, `name`, `email`, `phone`, `password`, `dob`, `verification_document`, `passout_year`, `user_pic`, `username`, `bio`, `status`) VALUES ('','$name','$email','','$password','$dob','$verification_document','$passout_year','$user_pic','$user_name','$bio','Pending')";
        $result=mysqli_query($con,$insertQuery);
            if($result)
            {
                move_uploaded_file($_FILES['verification_document']['tmp_name'],$imagePath);
                move_uploaded_file($_FILES['user_pic']['tmp_name'],$imagePaths);
                $response['message']="Registration Successful";
            }
            else
            {
               $response['message']="Registeration failed!";
            }
 
      
            
  }
    else
    {
          $response['message']="User already exist";
    }
   
 	echo json_encode($response);
?>