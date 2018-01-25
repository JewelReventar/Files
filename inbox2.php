<?php 
    require('conn.php');
    if(!isset($_SESSION["uid"])) {
        header('location: index.php');
    }
    
    
?>
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
                <a href="fixedpackage.php">Packages</a>
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
            <?php if ($_SESSION['type'] == 1): ?>
            <ul>
            <li><a href="clients.php">Clients</a></li>
            <li><a href="admin.php">Manage Orders</a></li>
            <li><a href="Createpackage.php">Create Package</a></li>
            <li><a href="applyfoodtaste.php">Food Taste Requests</a></li>
            <li><a  href="foodtastedish.php">Food Taste Dish</a></li>
           <?php if ($_SESSION['type'] == 1): ?>
            <li><a class="active"href="inbox2.php">Messages<?php require('msg_notif.php'); ?></a></li>
           <?php else: ?>
           <li><a class="active" href="send.php?id=1">Contact Admin</a></li>
            <?php endif; ?>
            <?php else: ?>
            <li><a class="active" href="send.php?id=1">Contact Admin</a></li>
            <?php endif; ?>
            
        </ul>
    </div>
    <div class="contentside">
        <div class="inbox">
           
           <?php 
                $inbox = $db->query("SELECT * FROM pm WHERE status = '0' AND senderid > 1 ORDER BY sent_date DESC");
                if($inbox->num_rows == 0) {
                    echo "No new Messages";
                }
                while($rows = $inbox->fetch_assoc()): ?>
                <?php 
                    $users_send = $db->prepare("SELECT username FROM users WHERE id = ?"); 
            $sendername = $rows['senderid'];
            $users_send->bind_param("s", $sendername);
            $users_send->execute();
            $users_send->bind_result($sendname);
            $users_send->fetch();
            $users_send->close();
            
            $users_received = $db->prepare("SELECT username FROM users WHERE id = ?"); 
            $receiptname = $rows['receiverid'];
            $users_received->bind_param("s", $receiptname);
            $users_received->execute();
            $users_received->bind_result($recipient);
            $users_received->fetch();
            $users_received->close();
            ?>
                <div class="inbox">
                    <span class="username"><?php echo $sendname ?></span>
                    <span class="sent_date"><?php echo $rows['sent_date']?></span> <br>
                    <span class="body"><?php echo $rows['body']?></span>
                    
                    <form action="send.php?id=<?php echo $rows['senderid'] ?>" method="post">
                        <button type="submit" name="view">Reply</button>
                    </form>
                </div>
                <hr>
               <?php endwhile; ?>
        </div>
        
    </div>
    
</body>
</html>