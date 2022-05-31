<?php
    $email= $_GET["email"];
    $servrname="localhost";
    $username="root";
    $password="";
    $database='ocams';
 
 
    
    $conn=mysqli_connect($servrname,$username,$password,$database);
if($_GET["mode"]){

   
    $update="UPDATE `addmission` SET `form_status` = '1' WHERE `addmission`.`email` = '$email'";
    $result=mysqli_query($conn,$update);

}
else{
    $update="UPDATE `addmission` SET `form_status` = '2' WHERE `addmission`.`email` = '$email'";
    $result=mysqli_query($conn,$update);
}

session_start();
header("location:/OCAMS/man_admissions.php");

?>