<?php 
    require('conn.php');
    if ($_SESSION['type'] == 0) {
        header('location: index.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Administrator</title>
      <link rel="stylesheet" href="style.css">
</head>
<body>
    <!--NavBar-->
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
    <div class="sidebar">
        <ul>
            <li><a class="active" href="clients.php">Clients</a></li>
            <li><a href="admin.php">Manage Orders</a></li>
            <li><a href="Createpackage.php">Create Package</a></li>
            <li><a href="applyfoodtaste.php">Food Taste Requests</a></li>
            <li><a href="foodtastedish.php">Food Taste Dish</a></li>
           <?php if ($_SESSION['type'] == 1): ?>
            <li><a href="inbox2.php">Messages<?php require('msg_notif.php'); ?></a></li>
           <?php else: ?>
           <li><a class="active" href="send.php?id=1">Contact Admin</a></li>
            <?php endif; ?>
        </ul>
    </div>
    <div class="contentside">
           <?php
            $stmt = $db->prepare("SELECT id, username, firstname, lastname, contact FROM users WHERE id > 1");
            $stmt->execute();
            $stmt->bind_result($userid, $username, $firstname, $lastname, $contact);
            while($stmt->fetch()): ?>
                <div class="clients">
                    <p><span class="bold">Username:</span> <?php echo $username ?></p>
                    <p><span class="bold">Name:</span> <?php echo $firstname." ".$lastname ?></p>
                    <p><span class="bold">Contact Number:</span> <?php echo $contact ?></p>
                    <form action="send.php?id=<?php echo $userid ?>" method="post">
                        <button type="submit" name="view">Send Message</button>
                    </form>
                </div>
                <hr>
        <?php endwhile;
            $stmt->close(); ?>
        
    </div>
   
</body>
</html>