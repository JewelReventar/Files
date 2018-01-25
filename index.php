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
    <div class="sect sectOne">
       <div class="title">
           <div class="shade">
                <h1>PEREZ CATERING SERVICES</h1>
                <hr>
                <h2>Catering your special event is a privilege</h2>
           </div>
           <div class="sectbtn">
                <a href="Packages.php">View Packages</a>
        </div>
       </div>
        
    </div>
    <div class="subsect subone">
        <h2>Events</h2>
        <hr>
        <div class="gal">
            <div class="gallery">
            <img src="img/corporate_1.jpg">
            <div class="desc">Corporate</div>
            </div>
            <div class="gallery">
            <img src="img/debut_1.jpg">
            <div class="desc">Debut</div>
            </div>
            <div class="gallery">
            <img src="img/wedding_1.jpg">
            <div class="desc">Wedding</div>
            </div>
            <div class="gallery">
            <img src="img/party_1.jpg">
            <div class="desc">Birthday Party</div>
            </div>
        </div>
        <a href="services.php">View more details</a>
    </div>
    <div class="sect sectTwo">
        <div class="testcontainer">
           <div class="testcontain">
                <h1>Find out why we are the right caterer for your event</h1>
                <p>If you want to familiarize yourself on our dishes. 
                Apply for our food tasting by clicking this button. </p>
                <a href="foodtasting.php" class="appbtn">Apply for food tasting</a>
           </div>
            
        </div>
    </div>
    <div class="subsect subtwo">
        <div class="aboutsect">
            <h2>About</h2>
            <hr>
            <p>For more than 5 years of catering events, we have been blessed to be a part of hundreds of weddings, debuts, corporate events, and other celebrations. These events have given us valuable insights and ideas that inspire our continuous effort to provide better and improved services to wider set of clients. But what really matters to us is our relationship with our customers. We consider ourselves not only a caterer, but also a partner that will assist you during the process of conceptualizing, budgeting, planning, and on the day of your event.We are here to help you make your dream event possible.</p>
        </div>
        
        <a href="about.php">Read More</a>
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
       
</body>
</html>