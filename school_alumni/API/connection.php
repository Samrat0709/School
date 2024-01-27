
<?php
$host="localhost";
$user="u949564233_school_alumni";
$password="[2jo3]3X";
$database="u949564233_school_alumni";
$con=mysqli_connect($host,$user,$password,$database);
if (!$con)
{
    die ('could not connect'.mysql_error());
    //echo "error";
} 
// else
// {
//     echo "success";
// }
?>