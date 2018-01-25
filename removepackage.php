<?php 
    require('conn.php');

        $packagename = $_GET['id'];


        if (!$_SESSION['type'] == 1) {
        header('location: index.php');
            }
    

    if(isset($_POST['remove'])) {
          $remove = $db->prepare('DELETE FROM packages WHERE id = ? LIMIT 1');
          $remove->bind_param('s',$_POST['aid']);
          $remove->execute();
    
          $remove2 = $db->prepare("DELETE FROM dishes WHERE package = {$packagename}");
          $remove->bind_param('s', $_POST['aid']);
          $remove2->execute();
            
          header('location: successDelete.php');
           
    } 
    
    if(isset($_POST['cancel'])) {
        header('location: Packages.php');
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

    <div class="container4">
        <div class="cancel">
            <form action = 'removepackage.php?id=<?= $packagename ?>' method = 'post'>
             <?php if(isset($_SESSION['uid'])): 
              if($_SESSION['type'] == 1): ?>
               <div>
                  <label>Are you sure you want to delete this package?</label>  
               </div>
                <input type='hidden' name = 'aid' value=<?php echo $packagename ?>>
                <input type='submit' name='remove' value='Delete'>
                <input type='submit' name='cancel' value='Cancel'>
            <?php endif; endif;?>
        </form>
        </div>
        
    </div>
    
</body>
</html>