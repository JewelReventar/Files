<?php 
    require('conn.php');
    if ($_SESSION['type'] == 0) {
        header('location: index.php');
    }
    $id = $_GET['id'];
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title><link rel="stylesheet" href="style.css">
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
            <li><a href="clients.php">Clients</a></li>
            <li><a class="active" href="admin.php">Manage Orders</a></li>
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
       <div class="upload">
          <h1>Receipt</h1>
           <div class="upload-image">
               <?php 
               $stmt = $db->prepare("SELECT image FROM receipts WHERE order_id = ? ORDER BY id DESC");
                $stmt->bind_param("s", $id);
                $stmt->execute();
                $stmt->bind_result($img_receipt);
                $stmt->fetch();
                $stmt->close();
               ?>
                <img src="receipts/<?php echo $img_receipt ?>" >
                

            </div>
            <button type="submit"><a href="admin.php">Back</a></button>
       </div>
        
        
    </div>
    
</body>
</html>