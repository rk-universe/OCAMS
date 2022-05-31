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
    <title>Online College Admission Management System</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="phone.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <section class="header">
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
                        echo ' <li><a href="/OCAMS/profile_page.php">PROFILE</a></li>';
                        
                     }

                    
                    ?>


                    
                    <li><a href="/OCAMS/man_contact.php">CONTACT US</a></li>
                </ul>
            </div>
            <div class="logout">


                <?php

echo '<span>'.$row['f_name']
?>
 | </span> 
            <a href="/OCAMS/logout.php" target="blank" class="hero-btn" id="logoutbtn">Logout</a>

            </div>
        </nav>
        <div class="text-box">
        
            <h1>Lokmanya Tilak College of Engineering</h1>
            <p>Welcome to Lokmanya Tilak College of Engineering. World's first and Advanced College <br> with Advance Courses. <br> Since opening We have become the master of producing Worlds Best students in the history of Mankind.</p>

            <!-- <div class="loginbox">
                <div class="management">
                    <h2>Management</h2>
                    <a href="/login.html" target="blank" class="hero-btn">Login</a>
                    <a href="/signup.html" target="blank" class="hero-btn">Sign Up</a>
                </div>

                <div class="student">
                    <h2>Students</h2>
                    <a href="/login.html" target="blank" class="hero-btn">Login</a>
                    <a href="/signup.html" target="blank" class="hero-btn">Sign Up</a>
                </div>
            </div> -->

        </div>
    </section>

    <section class="course">
        <h1>COURSES WE OFFER</h1>
        <p>We offer Multiple courses for Students to Grow and fulfill their Dreams. All the courses are taught by the best Professors and Teachers. </p>
        <div class="row">
            <div class="course-col">
                <h3>Bachelor of Engineering (B.E.)</h3>
                <div class="blog-right">
                    <div>
                        <span>Computer Engineering</span>
                        <span>120</span>
                    </div>
                    <div>
                        <span>Computer Science And Engineering (Data Science)</span>
                        <span>60</span>
                    </div>
                    <div>
                        <span>Computer Science And Engineering (AIML)</span>
                        <span>60</span>
                    </div>
                    <div>
                        <span>Computer Science And Engineering (IOT)</span>
                        <span>60</span>
                    </div>
                    <div>
                        <span>Electrical Engineering</span>
                        <span>60</span>
                    </div>
                    <div>
                        <span>Electronics and Telecommunication <br> Engineering</span>
                        <span>60</span>
                    </div>
                    <div>
                        <span>Mechinacal Engineering</span>
                        <span>120</span>
                    </div>
                </div>
            </div>
            <div class="course-col">
                <h3>Master of Engineering (M.E.)</h3>
                <div class="blog-right">
                    <div>
                        <span>Computer Engineering</span>
                        <span>09</span>
                    </div>
                    <div>
                        <span>Mechanical Engineering</span>
                        <span>18</span>
                    </div>
                </div>
            </div>
            <div class="course-col">
                <h3>Ph.D. Program</h3>
                <div class="blog-right">
                    <div>
                        <span>Ph.D. (Mechanical Engineering)</span>
                        <span>25</span>
                    </div>
                    <div>
                        <span>Ph.D. (Computer Engineering)</span>
                        <span>10</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="facilities">
        <h1>OUR FACILITIES</h1>
        <p>We offer you multiple facilities on campus. Students enjoy and learn at the same place. We have a very newly design Canteen, newly design Library and A Huge Sports Ground on campus. </p>
        <div class="row">
            <div class="facilities-col">
                <img src="image/canteen.jpg" alt="image">
                <h3>Our Canteen</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea reiciendis molestiae, ipsam, debitis suscipit et earum fuga itaque possimus officia similique laboriosam veniam harum modi alias doloribus eligendi, quae temporibus.</p>
            </div>
            <div class="facilities-col">
                <img src="image/ground2.jpg" alt="image">
                <h3>Our Sports Ground</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea reiciendis molestiae, ipsam, debitis suscipit et earum fuga itaque possimus officia similique laboriosam veniam harum modi alias doloribus eligendi, quae temporibus.</p>
            </div>
            <div class="facilities-col">
                <img src="image/shunya-koide-1emWndlDHs0-unsplash.jpg" alt="image">
                <h3>Our Library</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea reiciendis molestiae, ipsam, debitis suscipit et earum fuga itaque possimus officia similique laboriosam veniam harum modi alias doloribus eligendi, quae temporibus.</p>
            </div>
        </div>
    </section>
    <section class="reviews">
        <h1>REVIEWS</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum esse at odio soluta aliquam fugiat similique minus excepturi repudiandae? Deleniti temporibus ex velit?</p>
        <div class="row">
            <div class="reviews-col">
                <img src="image/man.jpg" alt="image">
                <div>
                    <h3>Richard Hendrix</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus vitae id nihil dolorem? Commodi et molestias laudantium esse, nihil quas obcaecati, accusamus iste libero reprehenderit placeat ad necessitatibus maiores at culpa,
                        aliquam sequi est?</p>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>

                </div>

            </div>
            <div class="reviews-col">
                <img src="image/christiana-rivers-O_XIvDy0pcs-unsplash.jpg" alt="image">
                <div>
                    <h3>Monika</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus vitae id nihil dolorem? Commodi et molestias laudantium esse, nihil quas obcaecati, accusamus iste libero reprehenderit placeat ad necessitatibus maiores at culpa,
                        aliquam sequi est?</p>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <i class="fa fa-star-o"></i>

                </div>
            </div>
        </div>
    </section>
    <footer>
        <h4>About Us</h4>
        <p>We aim to excel in our continual efforts, towards being one of the most recognized institutions By Encouraging innovation through research activities for the benefit of society </p>
        <div class="icons">
            <i class="fa fa-facebook"></i>
            <i class="fa fa-twitter"></i>
            <i class="fa fa-instagram"></i>
            <i class="fa fa-linkedin"></i>
        </div>
    </footer>

    <script>
        var navLinks = document.getElementById("navLinks");
    //    var logout= document.getElementById("logout")
    //    logout.addEventListener('click',function(e){
                
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