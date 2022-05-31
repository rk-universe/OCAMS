<!DOCTYPE html>
<html lang="en">



<?php

$login=$_GET['login'];
                   $passerrormsg=false;
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
      
                    $servrname="localhost";
                    $username="root";
                    $password="";
                    $database='ocams';

      
                    
                    $conn=mysqli_connect($servrname,$username,$password,$database);
                   
                    $email=$_POST['email'];
                    $password=$_POST['password'];
        
       if ($login){

           $select="SELECT * FROM `management` WHERE email = '$email' AND password = '$password'";
       }
       else{
        $select="SELECT * FROM `student` WHERE email = '$email' AND password = '$password'";
       }
            $get=mysqli_query($conn,$select);
           
            $num=mysqli_num_rows($get);
            
              
            if($num==1){
                
               session_start();
              
               $_SESSION['logedin']=true;
               $_SESSION['login_by']=$login;
               $_SESSION['email']=$email;
            //    echo $_SESSION['username'];


              header("location:man_home.php");
                }
                else{
                    
                  $passerrormsg=true;
                }
        
        }
      
        ?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <div class="wrapper">
    <?php

if($passerrormsg){
    echo ' <div class="errmsg red" >
    <span class="inline">
        password and username not match
    </span>
    <span class="inline">
     <input type="button" name="close"  value="close"id="close">
    </span>
</div>';
} ;

    ?>   
        <section class="form login">
            <?php
            if ($login){
              echo '<header>Management Login</header>';
            }
            else{
                echo '<header>Student Login</header>';
            }
            
            echo '<form action="/OCAMS/login.php?login='.$login.'" method="POST">';
            
            ?>
                <div class="error-txt">
                    This is an error message!
                </div>
                <div class="field input">
                    <label>Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter your Email">
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password">
                    <i class="fas fa-eye"></i>
                </div>

                <div class="field button">
                    <input type="submit" name="submit" value="Login">
                </div>
            </form>
            <?php
            echo '<div class="link">Not Yet Signed Up? <a href="signup.php?signup='.$login.'">Signup Now</a></div>'
            ?>
        </section>
    </div>
</body>
<script src="javascript/pass-show-hide.js"></script>
<script src="C:\xampp\htdocs\OCAMS\javascript\index.js"></script>
<script>
     var close=document.getElementById('close')
    close.addEventListener('click',function(e){
            e.target=addClass('hide');
    })
</script>
</html>