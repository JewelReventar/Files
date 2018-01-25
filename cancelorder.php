<?php 
    require('conn.php');
        $order = $_GET['id'];

 if(isset($_POST['Delete'])) {
          $remove = $db->prepare('DELETE FROM orders WHERE id = ? LIMIT 1');
          $remove->bind_param('s',$_POST['aid']);
          $remove->execute();
         header('location: successCancel.php');
 }
    if(isset($_POST['Cancel'])) {
        header('location: Profile.php');
    }
 
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
            <li><a  href="instructions.php">How to Pay</a>
            <li><a  class="active" href="Profile.php">Performed Orders</a>
            <li><a  href="Profile2.php">Food Tasting</a></li>
           <?php if ($_SESSION['type'] == 1): ?>
            <li><a href="inbox2.php">Inbox</a></li>
           <?php else: ?>
           <li><a href="send.php?id=1">Contact Admin</a></li>
            <?php endif; ?>
        </ul>
    </div>
    <div class="contentside">
        <div class="cancel">
            <form action = 'cancelorder.php?id=<?= $order ?>' method = 'post'>
                  <h2>Are you sure you want to Cancel your order?</h2>  
                <input type='hidden' name = 'aid' value=<?php echo $order   ?>>
                <input type='submit' name='Delete' value='Yes'>
                <input type='submit' name='Cancel' value='Cancel'>
      
            </form>
        </div>
        
    </div>
    
</body>
</html>