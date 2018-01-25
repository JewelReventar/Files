<?php 
    session_start(); 
    if(!isset($_SESSION["uid"])) {
        header('location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
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
            <li><a  class="active" href="instructions.php">How to Pay</a>
            <li><a  href="Profile.php">Performed Orders</a>
            <li><a  href="Profile2.php">Food Tasting</a></li>
           <?php if ($_SESSION['type'] == 1): ?>
            <li><a href="inbox2.php">Inbox</a></li>
           <?php else: ?>
           <li><a href="send.php?id=1">Contact Admin</a></li>
            <?php endif; ?>
        </ul>
    </div>
    <div class="contentside">
        <div class="how">
            <h2>How to Pay</h2>
            <h3><p>> A 50% down payment fee is required for every reservation. Payments are done by fund transfer(BDO) or bank deposit (BPI).</p></h3>
            <h2 class = 'info'><center><p>Account - BDO:(xxxx-xxxx-xxxx) BPI:(xxxx-xxxx-xx)</p></center></h2>
        <div class = 'phase'>
         <p><span class="step">STEP 1:</span> Go to Performed Orders on your Profile.</p>

        <p><span class="step">STEP 2:</span> Click "UPLOAD" button and submit your receipt/screen shot of your payment. </p>
        
        
    </div>
       
        </div>
        
    </div>
</body>
</html>