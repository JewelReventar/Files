<?php 
    require('conn.php');
    if(!isset($_SESSION["uid"])) {
        header('location: index.php');
    }
    
    if ($_SESSION['type'] != 1) {
        $sendid = 1;
    } else {
        $sendid = intval($_GET['id']);
    }

    if(isset($_POST['send'])) {
        $pm = $db->prepare("INSERT INTO pm (receiverid, senderid, body) VALUES (?, ?, ?)");
        $pm->bind_param("iis", $sendid, $_SESSION["uid"], $_POST['msg']);
        $pm->execute();
        $pm->close();
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
            <?php if ($_SESSION['type'] == 1): ?>
            <li><a href="clients.php">Clients</a></li>
            <li><a href="admin.php">Manage Orders</a></li>
            <li><a href="Createpackage.php">Create Package</a></li>
            <li><a href="applyfoodtaste.php">Food Taste Requests</a></li>
            <li><a href="foodtastedish.php">Food Taste Dish</a></li>
            <li><a class="active" href="inbox2.php">Messages<?php require('msg_notif.php'); ?></a></li>
            <?php else: ?>
            <li><a  href="instructions.php">How to Pay</a>
            <li><a  href="Profile.php">Performed Orders</a>
            <li><a  href="Profile2.php">Food Tasting</a></li>
            <li><a class="active" href="send.php?id=1">Contact Admin</a></li>
            <?php endif; ?>
            
        </ul>
    </div>
    <div class="contentside">
       <div class="msgbox">
               <div class="msgs" id="msgs">
       
        <?php 
        $stmt = $db->query("SELECT body, sent_date, senderid FROM pm WHERE (receiverid=$sendid AND senderid={$_SESSION["uid"]}) OR (receiverid={$_SESSION["uid"]} AND senderid=$sendid) ORDER BY sent_date ASC");
        
        
        while($rows = $stmt->fetch_assoc()): ?>
        
        <?php 
            $users_send = $db->prepare("SELECT username FROM users WHERE id = ?"); 
            $sendername = $rows['senderid'];
            $users_send->bind_param("s", $sendername);
            $users_send->execute();
            $users_send->bind_result($sendname);
            $users_send->fetch();
            $users_send->close();
        ?>
            <span class="username"><?php echo $sendname ?></span><span class="sent_date"> <?php echo $rows['sent_date'] ?></span>
            <p class="body"><?php echo $rows['body'] ?></p>
            <hr>
        <?php 
            if(isset($_POST['view'])){
                $view = $db->prepare('UPDATE pm SET status = "1" WHERE (receiverid= ? AND senderid= ?) OR (receiverid= ? AND senderid=?)');
                $view->bind_param('iiii', $sendid, $_SESSION['uid'], $_SESSION['uid'], $sendid);
                $view->execute();
                $view->close();
            }         
        ?>

        <?php endwhile; ?>
        <script>
            var element = document.getElementById("msgs");
            element.scrollTop = element.scrollHeight;
        </script>
        </div>
        <div class="msg_input">
            <form action="send.php?id=<?php echo $_GET['id']?>" method="post">
                <input type="text" placeholder="Message" name="msg">
                <input type="submit" value="Send" name="send">
            </form>
        </div>
        
        </div>
        
    </div>
</body>
</html>