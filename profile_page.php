<!DOCTYPE html>
<html lang="en">

<?php
//-------to check person is logedin-----------
session_start();

if (!$_SESSION['logedin']) {
    header("location:/OCAMS/index.php");
    exit;
}
// --------------------end-------------------

//-------------get email and login by from the session-----------
$email = $_SESSION['email'];
$login = $_SESSION['login_by'];
//---------------------end------------------------

//--------------conneect to DB----------------------
$servrname = "localhost";
$username = "root";
$password = "";
$database = 'ocams';
$conn = mysqli_connect($servrname, $username, $password, $database);
//----------------end------------------------


//---------TO fetch name and email for header-----------
if ($login) {
    $select = "SELECT * FROM `management` WHERE email= '$email'";
    $result = mysqli_query($conn, $select);

    $row = mysqli_fetch_assoc($result);
} else {
    $select = "SELECT * FROM `student` WHERE email= '$email'";
    $result = mysqli_query($conn, $select);

    $row = mysqli_fetch_assoc($result);
}
//---------------end--------------------------

if ($login) {
    $email2 = $_GET['email'];
    $select = "SELECT * FROM `addmission` WHERE email= '$email2'";
    $result = mysqli_query($conn, $select);
    $row2 = mysqli_fetch_assoc($result);
} else {

    $select = "SELECT * FROM `addmission` WHERE email= '$email'";
    $result = mysqli_query($conn, $select);
    $row2 = mysqli_fetch_assoc($result);
}


?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <!-- Font Awesome CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <section class="man-sub-header">
        <nav>
            <a href="/OCAMS/index.php"><img src="image/Logo.png" alt="image"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-chevron-circle-left" onclick="hideMenu()"></i>

                <ul>
                    <li><a href="/OCAMS/man_home.php">HOME</a></li>
                    <li><a href="/man_department.html">DEPARTMENTS</a></li>
                    <?php
                    if ($login) {
                        echo ' <li><a href="/OCAMS/man_admissions.php">ADMISSIONS</a></li>';
                    } else {
                        echo ' <li><a href="/OCAMS/profile_page.php">PROFILE</a></li>';
                    }

                    ?>
                    <li><a href="/OCAMS/man_contact.php">CONTACT US</a></li>
                </ul>

            </div>
            <div class="logout">
                <?php

                echo '<span>' . $row['f_name']
                ?>
                | </span>
                <a href="/OCAMS/logout.php" target="blank" class="hero-btn" id="logoutbtn">Logout</a>

            </div>
        </nav>
        <h1>Profile</h1>
    </section>
    <div class="student-profile py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card shadow-sm">
                        <div class="card-header bg-transparent text-center">
                            <img class="profile_img" src="image/man.jpg">
                        </div>

                        <?php

                        echo '<div class="card-body">
    <p class="mb-0"><strong class="pr-1">Student ID :</strong>32100000' . $row2['sr'] . '</p>
    <p class="mb-0"><strong class="pr-1">Year :</strong>FY</p>
    
    <p class="mb-0"><strong class="pr-1">Course Applied :</strong>' . $row2['course'] . '</p>
    <p class="mb-0"><strong class="pr-1">Year of Admission :</strong>' . $row2['YOA'] . '</p> ';
   
                        if ($row2['form_status']==1 ) {
                            echo '<p class="mb-0"><strong class="pr-1"><a href="/OCAMS/signup.php?signup=0">CLICK HERE </a>to generate student ID and Password</p>';
                        }
                        ?>

                    


                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-transparent border-0">
                        <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
                    </div>
                    <div class="card-body pt-0">
                        <table class="table table-bordered">
                            <tr>
                                <th width="30%">Name</th>
                                <td width="2%">:</td>
                                <?php
                                echo '<td>' . $row2['f_name'] .' '. $row2['l_name']. '</td>';
                                ?>
                            </tr>
                            <tr>
                                <th width="30%">Date of Birth</th>
                                <td width="2%">:</td>
                                <?php
                                echo '<td>' . $row2['dob'] . '</td>';
                                ?>
                            </tr>
                            <tr>
                                <th width="30%">Gender</th>
                                <td width="2%">:</td>
                                <?php
                                echo '<td>' . $row2['gender'] . '</td>';
                                ?>
                            </tr>
                            <tr>
                                <th width="30%">Email</th>
                                <td width="2%">:</td>
                                <?php
                                echo '<td>' . $row2['email'] . '</td>';
                                ?>
                            </tr>
                            <tr>
                                <th width="30%">Mobile</th>
                                <td width="2%">:</td>
                                <?php
                                echo '<td>' . $row2['mobile'] . '</td>';
                                ?>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-transparent border-0">
                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Address Information</h3>
                        </div>
                        <div class="card-body pt-0">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Address</th>
                                    <td width="2%">:</td>
                                    <?php
                                    echo '<td>' . $row2['address'] . '</td>';
                                    ?>
                                </tr>
                                <tr>
                                    <th width="30%">City</th>
                                    <td width="2%">:</td>
                                    <?php
                                    echo '<td>' . $row2['city'] . '</td>';
                                    ?>
                                </tr>
                                <tr>
                                    <th width="30%">PinCode</th>
                                    <td width="2%">:</td>
                                    <?php
                                    echo '<td>' . $row2['pin'] . '</td>';
                                    ?>
                                </tr>
                                <tr>
                                    <th width="30%">State</th>
                                    <td width="2%">:</td>
                                    <?php
                                    echo '<td>' . $row2['state'] . '</td>';
                                    ?>
                                </tr>
                                <tr>
                                    <th width="30%">Country</th>
                                    <td width="2%">:</td>
                                    <?php
                                    echo '<td>' . $row2['country'] . '</td>';
                                    ?>
                                </tr>
                            </table>
                        </div>
                    </div>


                    <div class="col-lg-8">
                        <div class="card shadow-sm">
                            <div class="card-header bg-transparent border-0">
                                <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Qualification Information</h3>
                            </div>
                            <div class="card-body pt-0">
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="30%">Class X persantage</th>
                                        <td width="2%">:</td>
                                        <?php
                                        echo '<td>' . $row2['classX_p'] . '</td>';
                                        ?>
                                    </tr>
                                    <tr>
                                        <th width="30%">Class X11 persantage</th>
                                        <td width="2%">:</td>
                                        <?php
                                        echo '<td>' . $row2['class12_p'] . '</td>';
                                        ?>
                                    </tr>
                                    <tr>
                                        <th width="30%">MH-CET </th>
                                        <td width="2%">:</td>
                                        <?php
                                        echo '<td>' . $row2['cet_p'] . '</td>';
                                        ?>
                                    </tr>

                                </table>
                            </div>
                        </div>


                        <div style="height: 26px"></div>
                        <div class="card shadow-sm">
                            <div class="card-header bg-transparent border-0">
                                <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Other Information</h3>
                            </div>
                            <div class="card-body pt-0">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>