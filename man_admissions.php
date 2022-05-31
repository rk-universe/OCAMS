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
   
    $select="select * from addmission";
$result=mysqli_query($conn,$select);
    if($login){
        $select2="SELECT * FROM `management` WHERE email= '$email'";
        $result2=mysqli_query($conn,$select2);
        
        $row2=mysqli_fetch_assoc($result2);

     }
     else{
       $select2="SELECT * FROM `student` WHERE email= '$email'";
       $result2=mysqli_query($conn,$select2);
       
       $row2=mysqli_fetch_assoc($result2);
        
     }
    //  if ($_SERVER['REQUEST_METHOD'] === 'POST'){


    //  }

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admissions</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="phone.css">
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

echo '<span>'.$row2['f_name']
?>| </span> 
<a href="/OCAMS/logout.php" target="blank" class="hero-btn" id="logoutbtn">Logout</a>
            </div>
            </div>
        </nav>
        <h1>Admissions</h1>
    </section>
    <section class="addform">
        <div class="comment-box">
            <h3>Addmission Form UG (B.E) , PG (M.E.) and Doctorate Admissions (Ph.D.) </h3>
            <form action="addrej.php" class="comment-form" method="POST">
                <table class="add-table">
                    <tr>
                        <th class="head-srno">Sr. No.</th>
                        <th>Student Name</th>
                        <th>Admission Forms</th>
                        <th>
                            <div class="action">Action</div>
                        </th>
                    </tr>
                    <div class="blank"></div>

                    <?php

$id=1;
                    while($row=mysqli_fetch_assoc($result)){
                        $email=$row['email'];
                        
                        if($row['form_status']==NULL){

                        echo '<tr>
                        <td class="srno">.'.$id.'</td>
                        <td class="add-name">'.$row['f_name'].' '.$row['l_name'].'</td>
                        <td class="add-query">Admission For U.G.</td>
                        <div class="add-button">
                            <td align="center" class="buttons" id="accrejbtn" >
                                 <a href="/OCAMS/profile_page.php?email='.$email.'">Open</a>
                                 <a href="accrej.php?email='.$email.'&mode='."1".'">Accept</a>
                                 <a href="accrej.php?email='.$email.'&mode='."0".'">reject</a>
                            </td>
                        </div>
                    </tr>';
                    $id++;
                        }
                    }
                    ?>
                  
                    
                    
                </table>
            </form>
        </div>
    </section>'
                

   <section class="addform">
        <div class="comment-box">
            <h3> Addmitted Student </h3>
            <form action="addform.php" class="comment-form" method="POST">
                <table class="add-table">
                    <tr>
                        <th class="head-srno">Sr. No.</th>
                        <th>Student Name</th>
                        <th>Admission Forms</th>
                        <th>
                            <div class="action">Action</div>
                        </th>
                    </tr>
                    <div class="blank"></div>

                    <?php
 $select="select * from addmission";
 $result=mysqli_query($conn,$select);

 $id=1;
while($row=mysqli_fetch_assoc($result)){
 
                        if($row['form_status']==1)
                        {

                        echo '<tr>
                        <td class="srno">.'.$id.'</td>
                        <td class="add-name">'.$row['f_name'].' '.$row['l_name'].'</td>
                        <td class="add-query">Admission For U.G.</td>
                        <div class="add-button">
                            <td align="center" class="buttons">
                            <a href="/OCAMS/profile_page.php?email='.$row['email'].'">Open</a>
                                
                            </td>
                        </div>
                        
                    </tr>';
                    $id++;
                }
            }
                    
                ?>
                    
                    
    
              </table>
            </form>
        </div>
    </section>

    <section class="addform">
        <div class="comment-box">
            <h3> Rejected Form </h3>
            <form action="addform.php" class="comment-form" method="POST">
                <table class="add-table">
                    <tr>
                        <th class="head-srno">Sr. No.</th>
                        <th>Student Name</th>
                        <th>Admission Forms</th>
                        <th>
                            <div class="action">Action</div>
                        </th>
                    </tr>
                    <div class="blank"></div>

                   <?php

$select="select * from addmission";
$result=mysqli_query($conn,$select);

$id=1;
                    while($row=mysqli_fetch_assoc($result)){

                        if($row['form_status']==2)
                        {
                        echo '<tr>
                        <td class="srno">.'.$id.'</td>
                        <td class="add-name">'.$row['f_name'].' '.$row['l_name'].'</td>
                        <td class="add-query">Admission For U.G.</td>
                        <div class="add-button">
                            <td align="center" class="buttons">
                            <a href="/OCAMS/profile_page.php?email='.$row['email'].'">Open</a>
                                
                            </td>
                        </div>
                        
                        </tr>';
                        $id++;}
                        
                        }

                    ?>
      
              </table>
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
    <!-- <script>
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
        } -->
        <!-- <script> -->
        <!-- var accbtn=document.getElementById('accrejbtn')
        accbtn.addEventListener('click',function(e){
            console.log(e)
            
            
         
                
        })
        
    
    </script> -->
</body>

</html>