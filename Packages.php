<?php 
    require('conn.php');
     $stmt = $db->query("SELECT * FROM packages");

?>

<!DOCTYPE html>
<html>
<head>
     <title>Packages</title>
     <link rel="stylesheet" href="style.css">
</head> 
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
    <!--Sidebar-->
       <div class = packagecontainer>
    <?php while($packages=$stmt->fetch_assoc()): ?>
      <div class = 'inline'>
          
              <div class = 'packagetitle'>
        <h1><?= $packages['packagename']?></h1>
       </div>
       <div class="scroll">
        <?php $stmt2 = $db->query("SELECT * FROM dishes WHERE package = {$packages['id']}");
        while($dishes=$stmt2->fetch_assoc()):?>
        <?php if($dishes['category'] == 'Pasta'): ?>
                <p><?php echo $dishes['dishname']; ?></p><br>
           <?php endif; ?>
          <?php if($dishes['category'] == 'Beef'): ?>
                <p><?php echo $dishes['dishname']; ?></p><br>
           <?php endif; ?>
           <?php if($dishes['category'] == 'Pork'): ?>
                <p><?php echo $dishes['dishname']; ?></p><br>
           <?php endif; ?>
            <?php if($dishes['category'] == 'Chicken'): ?>
                <p><?php echo $dishes['dishname']; ?></p><br>
           <?php endif; ?>
              
           <?php if($dishes['category'] == 'Vegetables'): ?>
                <p><?php echo $dishes['dishname']; ?></p><br>
           <?php endif; ?>
           <?php if($dishes['category'] == 'Dessert'): ?>
                <p><?php echo $dishes['dishname']; ?></p><br>
           <?php endif; ?>
              <?php if($dishes['category'] == 'Drinks'): ?>
                <p><?php echo $dishes['dishname']; ?></p><br>
           <?php endif; ?>
        
        <?php endwhile; ?>
          </div>
       
            <br>
            <p class='price'>Price: <?= $packages['price']?>PHP/head</p>
            <br>
        <?php if(isset($_SESSION['uid'])): 
              if($_SESSION['type'] == 1): ?>
           <!-- Edit -->
          
            <a class = 'links' href = "Edit.php?id=<?= $packages['id'] ?>">Edit</a>
             <!-- Remove -->
             <a class = 'links' href='removepackage.php?id=<?= $packages['id']?>'>Delete</a>
            
        <?php else: ?>
             <a class = 'links' href='order.php?id=<?= $packages['id']?>'>Order</a>
         <?php endif; endif;?>
         
         <?php if(!isset($_SESSION['uid'])):?>
          <a class = 'links' href='order.php?id=<?= $packages['id']?>'>Order</a>
         <?php endif; ?>
         </div>
    <?php endwhile;?>
        
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
</html>