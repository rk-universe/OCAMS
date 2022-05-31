<!DOCTYPE html>
<html lang="en">

<!-- database connection start -->
<?php

$sign = $_GET['signup'];




$insertmsg = false;
$inserterrormsg = false;
$passerrormsg = false;
$goToLogin = false;
$umiderr = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {



    $servrname = "localhost";
    $username = "root";
    $password = "";
    $database = 'ocams';



    $conn = mysqli_connect($servrname, $username, $password, $database);

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    if($sign){
    $umid = $_POST['UMID'];
    }

    if ($password == $cpassword)
    {

        if ($sign) 
        {
             $select = "SELECT * FROM `management` WHERE email='$email'";
        } 
        else 
        {
             $select = "SELECT * FROM `student` WHERE email='$email'";
        }
        $get = mysqli_query($conn, $select);

        $num = mysqli_num_rows($get);

        if ($num == 0) 
         {
            if($sign)
             {
                if ($umid == '110011')
                 {
                         $insert = "INSERT INTO `management` (`f_name`, `l_name`, `email`, `password`) VALUES ( '$firstname', '$lastname', '$email', '$password')";
                         $result = mysqli_query($conn, $insert);
                         echo mysqli_error($conn);
                         if($result)
                         {
                         $insertmsg = true;
                         $goToLogin = true;
                         }
                         else
                         {
                         $inserterrormsg=true;
                         }


                 }
                else
                 {
                    $umiderr=true;

                 }
            }
            else
            {
                 $insert = "INSERT INTO `student` ( `f_name`, `l_name`, `email`, `password`) VALUES ( '$firstname', '$lastname', '$email', '$password')";
                 $result = mysqli_query($conn, $insert);
                 $insertmsg = true;
                 $goToLogin = true;
            } 
        }
        else 
        {
            $inserterrormsg = true;
        }
    }
    else 
    {
        $passerrormsg = true;
    }    
}

?>

<!-- database connection end -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php


    if ($sign) {
        echo ' <title>management Sign Up</title>';
    } else {
        echo ' <title>student Sign Up</title>';
    }

    ?>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <div class="wrapper">
        <?php
        if ($insertmsg) {
            echo ' <div class="errmsg">
     <span class="inline">
         <strong>SUCCESS</strong>:you are signin
     </span>
     <span class="inline">
      <input type="button" name="close"  value="close"id="close">
     </span>
</div>';
        };
        if ($inserterrormsg) {
            echo ' <div class="errmsg red">
    <span class="inline">
       Usernama already exist
    </span>
    <span class="inline">
     <input type="button" name="close"  value="close"id="close">
    </span>
</div>';
        };
        if ($passerrormsg) {
            echo ' <div class="errmsg red" >
    <span class="inline">
        password and conform password note match
    </span>
    <span class="inline">
     <input type="button" name="close"  value="close"id="close">
    </span>
</div>';
        };

        if ($umiderr) {
            echo ' <div class="errmsg red">
    <span class="inline">
       Please enter valid UMID
    </span>
    <span class="inline">
     <input type="button" name="close"  value="close"id="close">
    </span>
</div>';
        };

        ?>
        <section class="form signup">

            <header>
                <?php
                if ($sign) {
                    echo 'Management signup';
                } else {
                    echo 'Student signup';
                }
                ?>


            </header>
            <?php


            echo '<form action="/OCAMS/signup.php?signup=' . $sign . '" method="post">';

            ?>

            <div class="error-txt">
                This is an error message!
            </div>
            <div class="name-details">
                <div class="field input">
                    <label>First Name</label>
                    <input type="text" name="firstname" id="firstname" placeholder="Enter your first name">
                </div>
                <div class="field input">
                    <label>Last Name</label>
                    <input type="text" name="lastname" id="lastname" placeholder="Enter your last name">
                </div>
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
            <div class="field input">
                <label>Conform Password</label>
                <input type="cpassword" name="cpassword" id="cpassword" placeholder="Enter your conform password">
                <i class="fas fa-eye"></i>
            </div>
            <?php
if($sign){
echo '<div class="field input">
    <label>
        UMID
    </label>
    <input type="cpassword" name="UMID" id="UMID" placeholder="Enter the UMID ">
    <i class="fas fa-eye"></i>
    </div>';
}

?>
            
            <div class="field button">
                <input type="submit" name="subimt" value="Sign Up">
            </div>
            </form>
            <?php
            if ($goToLogin) {
                echo '<div class="link">You can login now? <a href="login.php?login=' . $sign . '">Login Now</a></div>';
            } else {

                echo '<div class="link">Already Signed Up? <a href="/OCAMS/login.php?login=' . $sign . '">Login Now</a></div>';
            }

            ?>
        </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script>
        var close = document.getElementById('close')
        close.addEventListener('click', function(e) {
            e.target = addClass('hide');
        })
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