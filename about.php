<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Perez Catering Services</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!--Nav Bar-->
   <div class="nav">
        <a href="index.php"><img src="img/logo.png" alt="Home"></a>
            <div class="navcenter">
                <a href="Packages.php">Packages</a>
                <a href="services.php">Events</a>
                <a href="about.php">About</a>
           <?php 
            if(isset($_SESSION["uid"])):
            if($_SESSION['type'] == 1): ?>
                <a href="clients.php">Administrator</a>
            <?php else: ?>
                <a href="Profile.php">Profile</a>
             <?php endif; 
            endif;?>
            </div>
           
        <?php if(isset($_SESSION["uid"])): ?>
        <span class="loginbtn"><a href="logout.php">Log Out</a></span>
        <?php else: ?>
        <span class="loginbtn"><a href="login.php">Log In</a></span>
        <?php endif; ?>
   </div>
   <?php if(!isset($_SESSION["uid"])): ?>
   <div class="regbtn">
        <a href="register.php">Register an account to reserve packages &nbsp; &#10095;</a>
    </div>
    <?php endif; ?>
    <div class="container">
        <h1>About Us</h1>
        <hr>
        <p>For more than 5 years of catering events, we have been blessed to be a part of hundreds of weddings, debuts, corporate events, and other celebrations. These events have given us valuable insights and ideas that inspire our continuous effort to provide better and improved services to wider set of clients. But what really matters to us is our relationship with our customers. We consider ourselves not only a caterer, but also a partner that will assist you during the process of conceptualizing, budgeting, planning, and on the day of your event.We are here to help you make your dream event possible.</p>  
        <h2>Mission</h2>
        <p>Perez’s upholds the tradition of delivering quality foods and services that are customized to clients’ preferences. We make sure that clients’ expectations are always exceeded, and that we continues to add inspiration to life celebrations, all for God’s greater glory.</p>
        <h2>Vision</h2>
        <p>Perez’s Catering has its sights on becoming a truly world-class catering company—the catering company that continuously sets the standards and trends in the Philippine catering industry, as well as the country’s most trusted banquet service provider.</p>
        <h2>Advocacy</h2>
        <p>Perez’s Catering doesn’t just create sumptuous and worry-free banquets for all occasions; it also wants to help create a better future for children, families, and communities in the Philippines. With this in mind, Perez’s Catering partners with World Vision, and pledges a month’s worth of support to a child in need with every confirmed booking. Through this, Perez’s Catering is hoping to help alleviate suffering because of poverty, as well as help improve the lives of children in need.</p>
    </div>
    <div class="sect sectThree">
        <div id= "contactSection" class="footer">
            <h2>Contact Information</h2>
            <hr>
            <img src="icons/landline-icon.png">
            <ul>
               
                <li><h3>Landline</h3></li>
                <li><p>(02)801-7549</p></li>
                <li><p>(02)546-5963</p></li>
            </ul>
            <img src="icons/mobile-icon.png">
            <ul>
               
                <li><h3>Mobile Number</h3></li>
                <li><p>0906-410-9958</p></li>
                <li> &nbsp;</li>
            </ul>
            <img src="icons/email-icon.png">
            <ul>
                
                <li><h3>Email</h3></li>
                <li><p>perezcateringservices@gmail.com
</p></li>
            </ul>
            <br>
            
        </div>
    </div>