<!DOCTYPE html>
<html lang="en">

<?php

$insertmsg=false;
$inserterrormsg=false;
if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    

    $servrname="localhost";
    $username="root";
    $password="";
    $database='ocams';


    
    $conn=mysqli_connect($servrname,$username,$password,$database);
     
    $firstname=$_POST['First_Name'];
    $lastname=$_POST['Last_Name'];
    $dob=$_POST['birthdate'];
    
    $email=$_POST['Email_Id'];
    $mobile=$_POST['Mobile_Number'];
    $gender=$_POST['Gender'];
    $address=$_POST['Address'];
    $city=$_POST['City'];
    $pincode=$_POST['Pin_Code'];
    $state=$_POST['State'];
    $country=$_POST['Country'];
    // $pincode=$_POST['Pin_Code'];
    // $pincode=$_POST['Pin_Code'];
    // $pincode=$_POST['Pin_Code'];
    $classX_b=$_POST['ClassX_Board'];
    $classX_p=$_POST['ClassX_Percentage'];
    $classX_y=$_POST['ClassX_YrOfPassing'];
    $class12_b=$_POST['ClassXII_Board'];
    $class12_p=$_POST['ClassXII_Percentage'];
    $class12_y=$_POST['ClassXII_YrOfPassing'];
    $cet_b=$_POST['MH-CET'];
    $cet_p=$_POST['MH-CET-Percentage'];
    $cet_y=$_POST['MH-CET-YearofPssing'];
    $course=$_POST['Course'];
    
    // $course=$_POST['Course'];

    $select="SELECT * FROM `addmission` WHERE email = '$email' AND mobile = '$mobile'";
      
    $get=mysqli_query($conn,$select);
           
    $num=mysqli_num_rows($get);
            
              
    if($num==0){

   $insert ="INSERT INTO `addmission` (`f_name`, `l_name`, `dob`, `email`, `mobile`, `gender`, `address`, `city`, `pin`, `state`, `country`, `classX_b`, `classX_p`, `classX_y`, `class12_b`, `class12_p`, `class12_y`, `cet_b`, `cet_p`, `cet_y`, `course`)
    VALUES ('$firstname', '$lastname', '$dob', '$email', '$mobile', '$gender', '$address', '$city', '$pincode', '$state', '$country', '$classX_b', '$classX_p', '$classX_y', '$class12_b', '$class12_p', '$class12_y', '$cet_b', '$cet_p', '$cet_y', '$course')";

    $result=mysqli_query($conn,$insert);
    
    if($result){
        $insertmsg=true;
     }
     else{
         $inserterrormsg=true;
     }

    }
else{
  $inserterrormsg=true;
    }
    
}
?>



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Form</title>
    <link rel="stylesheet" href="/OCAMS/style.css">
    <link rel="stylesheet" href="phone.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <section class="sub-header">
        <nav>
            <a href="index.php"><img src="image/Logo.png" alt="image"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-chevron-circle-left" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="/OCAMS/index.php">HOME</a></li>
                    <li><a href="/OCAMS/about.php">ABOUT</a></li>
                    <li><a href="/OCAMS/course.php">COURSE</a></li>
                    <li><a href="/OCAMS/admissions.php">ADMISSIONS</a></li>
                    <li><a href="/OCAMS/contact.php">CONTACT US</a></li>
                </ul>
            </div>
        </nav>
        <h1>Admission Form</h1>
    </section>

    <section class="addform">
        <?php

if($insertmsg){
    echo' <div class="errmsg">
      <span class="inline">
          <strong>SUCCESS</strong>: Form Submitted
      </span>
      <span class="inline">
       <input type="button" name="close"  value="close"id="close">
      </span>
 </div>';
 };
 if($inserterrormsg){
     echo ' <div class="errmsg red">
     <span class="inline">
        Form not submitted,Check the details and try again
     </span>
     <span class="inline">
      <input type="button" name="close"  value="close"id="close">
     </span>
 </div>';
 };


        ?>
        <div class="comment-box">
            <h3>Addmission Form UG (B.E) And PG (M.E.) </h3>
            <form action="/OCAMS/addform.php" class="comment-form" method="POST">
                <div class="addmissionform">
                    <table align="center" cellpadding="15">

                        <!----- First Name ---------------------------------------------------------->
                        <tr>
                            <td>FIRST NAME</td>
                            <td><input type="text" name="First_Name" maxlength="30" /> (max 30 characters a-z and A-Z)
                            </td>
                        </tr>

                        <!----- Last Name ---------------------------------------------------------->
                        <tr>
                            <td>LAST NAME</td>
                            <td><input type="text" name="Last_Name" maxlength="30" /> (max 30 characters a-z and A-Z)
                            </td>
                        </tr>

                        <!----- Date Of Birth -------------------------------------------------------->
                        <tr>
                            <td>DATE OF BIRTH</td>

                            <td>
                               
                            <input type="date" name="birthdate">
                                
                            </td>
                        </tr>

                        <!----- Email Id ---------------------------------------------------------->
                        <tr>
                            <td>EMAIL ID</td>
                            <td><input type="text" name="Email_Id" maxlength="100" /></td>
                        </tr>

                        <!----- Mobile Number ---------------------------------------------------------->
                        <tr>
                            <td>MOBILE NUMBER</td>
                            <td>
                                <input type="text" name="Mobile_Number" maxlength="10" /> (10 digit number)
                            </td>
                        </tr>

                        <!----- Gender ----------------------------------------------------------->
                        <tr>
                            <td>GENDER</td>
                            <td>
                                Male <input type="radio" name="Gender" value="Male" /> Female <input type="radio" name="Gender" value="Female" />
                            </td>
                        </tr>

                        <!----- Address ---------------------------------------------------------->
                        <tr>
                            <td>ADDRESS <br /><br /><br /></td>
                            <td><textarea name="Address" rows="4" cols="30"></textarea></td>
                        </tr>

                        <!----- City ---------------------------------------------------------->
                        <tr>
                            <td>CITY</td>
                            <td><input type="text" name="City" maxlength="30" /> (max 30 characters a-z and A-Z)
                            </td>
                        </tr>

                        <!----- Pin Code ---------------------------------------------------------->
                        <tr>
                            <td>PIN CODE</td>
                            <td><input type="text" name="Pin_Code" maxlength="6" /> (6 digit number)
                            </td>
                        </tr>

                        <!----- State ---------------------------------------------------------->
                        <tr>
                            <td>STATE</td>
                            <td><input type="text" name="State" maxlength="30" /> (max 30 characters a-z and A-Z)
                            </td>
                        </tr>

                        <!----- Country ---------------------------------------------------------->
                        <tr>
                            <td>COUNTRY</td>
                            <td><input type="text" name="Country" value="India" readonly="readonly" /></td>
                        </tr>

                        <!----- Hobbies ---------------------------------------------------------->

                        <!-- <tr>
                            <td>HOBBIES <br /><br /><br /></td>

                            <td>
                                Drawing
                                <input type="checkbox" name="Hobby_Drawing" value="Drawing" /> Singing
                                <input type="checkbox" name="Hobby_Singing" value="Singing" /> Dancing
                                <input type="checkbox" name="Hobby_Dancing" value="Dancing" /> Sketching
                                <input type="checkbox" name="Hobby_Cooking" value="Cooking" />
                                <br /> Others
                                <input type="checkbox" name="Hobby_Other" value="Other">
                                <input type="text" name="Other_Hobby" maxlength="30" />
                            </td>
                        </tr> -->

                        <!----- Qualification---------------------------------------------------------->
                        <tr>
                            <td>QUALIFICATION <br /><br /><br /><br /><br /><br /><br /></td>

                            <td>
                                <table>

                                    <tr>
                                        <td align="center"><b>Sl.No.</b></td>
                                        <td align="center"><b>Examination</b></td>
                                        <td align="center"><b>Board</b></td>
                                        <td align="center"><b>Percentage</b></td>
                                        <td align="center"><b>Year of Passing</b></td>
                                    </tr>

                                    

                                    <tr>
                                        <td>1</td>
                                        <td>Class X</td>
                                        <td><input type="text" name="ClassX_Board" maxlength="30" /></td>
                                        <td><input type="text" name="ClassX_Percentage" maxlength="30" /></td>
                                        <td><input type="text" name="ClassX_YrOfPassing" maxlength="30" /></td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>Class XII</td>
                                        <td><input type="text" name="ClassXII_Board" maxlength="30" /></td>
                                        <td><input type="text" name="ClassXII_Percentage" maxlength="30" /></td>
                                        <td><input type="text" name="ClassXII_YrOfPassing" maxlength="30" /></td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td>MH-CET</td>
                                        <td><input type="text" name="MH-CET" maxlength="30" /></td>
                                        <td><input type="text" name="MH-CET-Percentage" maxlength="30" /></td>
                                        <td><input type="text" name="MH-CET-YearofPssing" maxlength="30" /></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td align="center">(10 char max)</td>
                                        <td align="center">(upto 2 decimal)</td>
                                    </tr>
                                </table>

                            </td>
                        </tr>

                        <!----- Course ---------------------------------------------------------->
                        <tr>
                            <td>COURSES<br/>APPLIED FOR</td>
                            <td class="addcourse">
                                <input type="radio" name="Course" value="Computer Engineering " /> Computer Engineering <br>
                                <input type="radio" name="Course" value="Computer Science And Engineering (Data Science)" /> Computer Science And Engineering (Data Science) <br>
                                <input type="radio" name="Course" value="Computer Science And Engineering (AIML)" /> Computer Science And Engineering (AIML) <br>
                                <input type="radio" name="Course" value="Computer Science And Engineering (IOT)" />Computer Science And Engineering (IOT) <br>
                                <input type="radio" name="Course" value="Electrical Engineering" /> Electrical Engineering <br>
                                <input type="radio" name="Course" value="Mechinacal Engineering" />Mechinacal Engineering <br>

                            </td>
                        </tr>

                        <!----- Submit and Reset ------------------------------------------------->
                        <tr>
                            <td colspan="2" align="center" class="buttons">
                                <input type="submit" value="Submit" class="submitbut">
                                <input type="reset" value="Reset" class="resetbut">
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
    </section>

    <footer>
        <h4>About Us</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At blanditiis dolore veniam. Facilis fuga porro enim ipsa laudantium hic temporibus rerum saepe iste <br> animi repudiandae amet delectus, harum reprehenderit velit, perferendis architecto
            sunt. Obcaecati.</p>
        <div class="icons">
            <i class="fa fa-facebook"></i>
            <i class="fa fa-twitter"></i>
            <i class="fa fa-instagram"></i>
            <i class="fa fa-linkedin"></i>
        </div>
    </footer>
    <script>
        var navLinks = document.getElementById("navLinks");

        function showMenu() {
            navLinks.style.right = "0px";
        }

        function hideMenu() {
            navLinks.style.right = "-200px";
        }
        var icon = document.getElementById("icon");

        icon.onclick = function() {
            document.body.classList.toggle("dark-theme");
            if (document.body.classList.contains("dark-theme")) {
                icon.src = "image/sun.png";
            } else {
                icon.src = "image/moon.png";
            }
        }
    </script>
    
    <script src="C:\xampp\htdocs\OCAMS\javascript\index.js"></script>
    <script>
         var close=document.getElementById('close')
    close.addEventListener('click',function(e){
            e.target=addClass('hide');
    })
    </script>
</body>

</html>