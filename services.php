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
        <h1>Events</h1>
        <hr>
        <div class="corp-gal" id="corp">
            <h2>Corporate</h2>
            <div class="events-res">
                <div class="events-gal">
                    <img src="img/corporate_1.jpg">
                </div>
            </div>
            <div class="events-res">
                <div class="events-gal">
                    <img src="img/corporate_2.jpg">
                </div>
            </div>
            <div class="events-res">
                <div class="events-gal">
                    <img src="img/corporate_3.jpg">
                </div>
            </div>
            <div class="events-res">
                <div class="events-gal">
                    <img src="img/corporate_4.jpg">
                </div>
            </div>
        </div>
        <div class="debut-gal" id="debut">
            <h2>Debut</h2>
            <div class="events-res">
                <div class="events-gal">
                    <img src="img/debut_1.jpg">
                </div>
            </div>
            <div class="events-res">
                <div class="events-gal">
                    <img src="img/debut_2.jpg">
                </div>
            </div>
            <div class="events-res">
                <div class="events-gal">
                    <img src="img/debut_3.jpg">
                </div>
            </div>
            <div class="events-res">
                <div class="events-gal">
                    <img src="img/img1.jpg">
                </div>
            </div>
        </div>
        <div class="wed-gal" id="wed">
            <h2>Wedding</h2>
            <div class="events-res">
                <div class="events-gal">
                    <img src="img/wedding_1.jpg">
                </div>
            </div>
            <div class="events-res">
                <div class="events-gal">
                    <img src="img/wedding_2.jpg">
                </div>
            </div>
            <div class="events-res">
                <div class="events-gal">
                    <img src="img/wedding_3.jpg">
                </div>
            </div>
            <div class="events-res">
                <div class="events-gal">
                    <img src="img/wedding_5.jpg">
                </div>
            </div>
        </div>
        <div class="bday-gal" id="bday">
           <h2>Children's Party</h2>
            <div class="events-res">
                <div class="events-gal">
                    <img src="img/party_1.jpg">
                </div>
            </div>
            <div class="events-res">
                <div class="events-gal">
                    <img src="img/party_2.jpg">
                </div>
            </div>
            <div class="events-res">
                <div class="events-gal">
                    <img src="img/party_3.jpg">
                </div>
            </div>
            <div class="events-res">
                <div class="events-gal">
                    <img src="img/party_5.jpg">
                </div>
            </div>
        </div>
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