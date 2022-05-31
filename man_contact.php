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
    <title>Contact Us</title>
    <link rel="stylesheet" href="phone.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <section class="sub-header">
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
            <div class="logout">
            <?php

echo '<span>'.$row['f_name']
?>
| </span> 
            <a href="/OCAMS/logout.php" target="blank" class="hero-btn" id="logoutbtn">Logout</a>
            </div>
            </div>
        </nav>
        <h1>Contact</h1>
    </section>

    <section class="location">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3770.040033708852!2d73.00534171425305!3d19.105899587070773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c0da59d0a01b%3A0x56642a54a185f894!2sLokmanya%20Tilak%20College%20of%20Engineering!5e0!3m2!1sen!2sin!4v1647231869617!5m2!1sen!2sin"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

    </section>

    <section class="contact-us">
        <div class="row">
            <div class="contact-col">
                <div>
                    <i class="fa fa-home"></i>
                    <span>
                        
                        <h5>Kopar Khairane, Navi Mumbai, Maharashtra</h5>
                        <p> Vikas Nagar, Gyan Vikas Road, Sector 4,  400709</p>
                    </span>
                </div>
            </div>
            <div class="contact-col">
                <div>
                    <i class="fa fa-phone"></i>
                    <span>
                        <h5>02227541005</h5>
                        <p>Monday to Saturday, 10AM to 6PM</p>
                    </span>
                </div>
            </div>
            <div class="contact-col">
                <div>
                    <i class="fa fa-envelope-o"></i>
                    <span>
                        <h5>principal.ltce@gmail.com</h5>
                        <p>Email us your query</p>
                    </span>
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