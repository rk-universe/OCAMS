<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
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
                <li><a href="/OCAMS/index.php">HOME</a></li>
                    <li><a href="/OCAMS/about.php">ABOUT</a></li>
                    <li><a href="/OCAMS/course.php">COURSE</a></li>
                    <li><a href="/OCAMS/admissions.php">ADMISSIONS</a></li>
                    <li><a href="/OCAMS/contact.php">CONTACT US</a></li>
                </ul>
            </div>
        </nav>
        <h1>About us</h1>
    </section>

    <section class="about-us">
        <div class="row">
            <div class="about-col">
                <h1>We are Navi Mumbai's Best College of Engineering</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Animi consequuntur, libero nam natus modi ab, ullam quae non unde voluptates velit facilis saepe voluptatum iure cupiditate quo repellendus deserunt necessitatibus sint dolore accusantium
                    repudiandae, veritatis rerum! Accusantium modi, explicabo accusamus dolore sapiente provident eius quibusdam voluptatibus quas possimus aliquid sint porro quia esse nihil natus similique ad? Tempora, unde. Veniam, earum accusantium
                    soluta magni ad repellat dolorem, natus nemo, autem sed nihil rem. Odit autem consequatur deleniti dolore labore, eius architecto beatae nisi laudantium commodi, animi in suscipit ab recusandae eveniet incidunt, ad ducimus cumque aliquam
                    vel minima? Natus, debitis?</p>
                <a href="/OCAMS/contact.php" class="hero-btns ">Contact Us</a>
            </div>
            <div class="about-col">
                <img src="image/meating.jpg" alt="image">
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