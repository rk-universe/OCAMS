<!DOCTYPE html>
<html lang="en">

<?php

session_start();

if(!$_SESSION['logedin']){
    header("location:/OCAMS/index.php");
        exit;
}
    $email=$_SESSION['email'];
     $login= $_SESSION['login_by'];
     $servrname="localhost";
         $username="root";
         $password="";
         $database='ocams';
         $conn=mysqli_connect($servrname,$username,$password,$database);
     
         
                          if($login){
                             $select="SELECT * FROM `management` WHERE email= '$email'";
                             $result=mysqli_query($conn,$select);
                             
                             $row=mysqli_fetch_assoc($result);
                            
     
                          }
                          else{
                            $select="SELECT * FROM `student` WHERE email= '$email'";
                            $result=mysqli_query($conn,$select);
                            
                            $row=mysqli_fetch_assoc($result);
                             
                          }
     
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departments</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="phone.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <section class="man-sub-header">
        <nav>
            <a href="/OCAMS/man_home.php"><img src="image/Logo.png" alt="image"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-chevron-circle-left" onclick="hideMenu()"></i>
                <ul>
                <li><a href="/OCAMS/man_home.php">HOME</a></li>
                    <li><a href="/OCAMS/man_department.php">DEPARTMENTS</a></li>
                    <?php

                     if($login){
                       echo ' <li><a href="/OCAMS/man_admissions.php">ADMISSIONS</a></li>';
                       

                     }
                     else{
                        echo ' <li><a href="/OCAMS/std_detail.php">PROFILE</a></li>';
                        
                     }

                    
                    ?>
                    <li><a href="/OCAMS/man_contact.php">CONTACT US</a></li>
                </ul>
            </div>
            </div>
            <div class="logout">
            <?php

echo '<span>'.$row['f_name']
?>
| </span> 
            <a href="/OCAMS/logout.php" target="blank" class="hero-btn" id="logoutbtn">Logout</a>
            </div>
        </nav>
        <h1>Department</h1>
    </section>

    <section class="course">
        <h1>FACULTIES WE HAVE</h1>
        <p>We have Multiple courses for Students therefore we have made a departments sections from which it is easier to find Faculties. All the courses are taught by the best Professors and Teachers. </p>
        <div class="row">
            <div class="man-course-col">
                <h3>CSE (AI and ML)</h3>
                <div class="man-blog-right">
                    <div>
                        <span>Prof. Chitra Wasnik </span>
                        <span>chitrawasnik@ltce.in</span>
                    </div>
                    <div>
                        <span>Prof. Sushma Rathi</span>
                        <span>Sushma.rathi@ltce.in</span>
                    </div>
                    <div>
                        <span> Prof.Kavita Rathi </span>
                        <span>Kavita.rathi@ltce.in</span>
                    </div>
                    <div>
                        <span> Prof. Ujwala Pagare</span>
                        <span>ujwala.pagare@ltce.in</span>
                    </div>
                    <div>
                        <span> Prof. Susmita Dutta</span>
                        <span>susmita.datta@ltce.in</span>
                    </div>
                    <div>
                        <span>Prof. Sheshmal Shingane</span>
                        <span>sheshmal.shingne@ltce.in</span>
                    </div>
                </div>
            </div>
            <div class="man-course-col">
                <h3>CSE (Data Science)</h3>
                <div class="man-blog-right">
                    <div>
                        <span>Prof. Gayatri Bedre</span>
                        <span>gayatribedre@gmail.com</span>
                    </div>
                    <div>
                        <span>Prof. Vrushali Bendre</span>
                        <span>vrushalibendre@ltce.in</span>
                    </div>
                    <div>
                        <span>Prof. Vaibhav Palav</span>
                        <span>vaibhav.palav@ltce.in</span>
                    </div>
                    <div>
                        <span>Prof. Mohd Farhan</span>
                        <span>mohd.farhan@ltce.in</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="man-course-col">
                <h3>CSE (IOT and Cs)</h3>
                <div class="man-blog-right">
                    <div>
                        <span>Ms. Swati Chaudhary</span>
                        <span>swati.choudhary@ltce.in</span>
                    </div>
                    <div>
                        <span>Ms. Trupti Harhare</span>
                        <span>truptiharhare@ltce.in</span>
                    </div>
                    <div>
                        <span>Dr. Nitin P. Jain	</span>
                        <span>nitinjain@ltce.in</span>
                    </div>
                    <div>
                        <span>Dr. Shilpa Wakode	</span>
                        <span>shilpa.wakode@ltce.in</span>
                    </div>
                    <div>
                        <span>Dr. Shilpa Joshi</span>
                        <span>shilpa.joshi@ltce.in</span>
                    </div>
                </div>
            </div>
            <div class="man-course-col">
                <h3>Computer Engineering</h3>
                <div class="man-blog-right">
                    <div>
                        <span>Prof. Sonal A. Bankar</span>
                        <span>sonal.bankar@ltce.in</span>
                    </div>
                    <div>
                        <span>Prof. Manish R. Umale</span>
                        <span>manish.umale@ltce.in</span>
                    </div>
                    <div>
                        <span>Prof.Sanjay D.Naravadkar</span>
                        <span>san.naravadkar@ltce.in</span>
                    </div>
                    <div>
                        <span>Prof. Rajendra D. Gawali</span>
                        <span>gawalird@ltce.in</span>
                    </div>
                    <div>
                        <span>Dr. Subhash K. Shinde</span>
                        <span>skshinde@ltce.in
                        </span>
                    </div>
                </div>
            </div>
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
</body>

</html>