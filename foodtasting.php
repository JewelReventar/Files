<?php 
    require('conn.php');
    if (!$_SESSION['uid']) {
        header('location: login.php');
    }
    $uid = intval($_SESSION['uid']);
    $userid = $db->prepare("SELECT username, firstname, lastname FROM users WHERE id = ? LIMIT 1");
    $userid->bind_param('i', $uid);
    $userid->execute();
    $userid->bind_result($uname, $fname, $lname);
    $userid->fetch();
    $userid->close();


if(isset($_SESSION['uid'])) {
    if(isset($_POST['apply'])) {
        if(explode(':',$_POST['time'])[0] >= 18 || explode(':',$_POST['time'])[0]<8) {
            header('location: time.php');
            return;
            
        
    } else {
            $stmt2=$db->prepare("INSERT INTO foodtasting (userid,Pasta,Beef,Pork,Chicken,Seafood,Vegetables,Dessert,Drinks,number_persons,date_requested,time_requested,status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt2->bind_param('issssssssisss',$uid, $_POST['pasta'], $_POST['beef'], $_POST['pork'], $_POST['chicken'],$_POST['seafood'],$_POST['vegetables'],$_POST['dessert'],$_POST['drinks'],$_POST['persons'],$_POST['date'],$_POST['time'],$_POST['status']);
        $stmt2->execute();
            
        header('location: Profile2.php');
        }
   
    
    
    }
  
}


?>



<html>
<head>
     <title>Foodtasting</title>
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
           
        <?php if(isset($_SESSION["uid"])): ?>
        <span class="loginbtn"><a href="logout.php">Log Out</a></span>
        <?php else: ?>
        <span class="loginbtn"><a href="login.php">Log In</a></span>
        <?php endif; ?>
   </div>


   <div class = 'container3'>
        <form action = 'foodtasting.php' method='post'> 
        <div align = 'center'>
            <label class = 'title'><h1>CHOOSE 1 DISH PER CATEGORY</h1></label>
        </div>
      <div align = 'center' class = "choice" >
           <label class = 'categ'>PASTA</label><br>
            <?php   $stmt = $db->prepare("SELECT dishname FROM availabledish WHERE category = 'Pasta'");
                    $stmt->execute();   
                    $stmt->bind_result($pasta);
        while($stmt->fetch()): ?>
              <input type ='radio' class = 'ds' id = 'pasta' value ='<?php echo $pasta ?>' name = 'pasta'>
              <label for = 'pasta'><?php echo $pasta; ?></label>
            <?php endwhile; $stmt->close();?>
    </div>
    <div align = 'center' class = "choice">
            <label class = 'categ'>PORK</label><br>
            <?php   $stmt2 = $db->prepare("SELECT dishname FROM availabledish WHERE category = 'Pork'");
                    $stmt2->execute();   
                    $stmt2->bind_result($pork); while($stmt2->fetch()): ?>
              <input type ='radio' class = 'ds' id = 'pork' value ='<?php echo $pork ?>' name = 'pork'>
              <label for = 'pork'><?php echo $pork; ?></label>
            <?php endwhile; $stmt2->close(); ?>
    </div>
    <div align = 'center' class = "choice">
           <label class = 'categ'>BEEF</label><br>
            <?php   $stmt3 = $db->prepare("SELECT dishname FROM availabledish WHERE category = 'Beef'");
                    $stmt3->execute();   
                    $stmt3->bind_result($beef); while($stmt3->fetch()): ?>
              <input type ='radio' class = 'ds' id = 'beef' value ='<?php echo $beef ?>' name = 'beef' id = 'beef'>
               <label for = 'beef'><?php echo $beef; ?></label>
            <?php endwhile; $stmt3->close(); ?>
    </div>
    <div align = 'center' class = "choice">
           <label class = 'categ'>CHICKEN</label><br>
            <?php   $stmt4 = $db->prepare("SELECT dishname FROM availabledish WHERE category = 'Chicken'");
                    $stmt4->execute();   
                    $stmt4->bind_result($chicken); while($stmt4->fetch()): ?>
              <input type ='radio' class = 'ds' id = 'chicken' value ='<?php echo $chicken ?>' name = 'chicken'>
              <label for = 'chicken'><?php echo $chicken; ?></label>
            <?php endwhile; $stmt4->close(); ?>
    </div>
    <div align = 'center' class = "choice">
           <label class = 'categ'>SEAFOOD</label><br>
            <?php   $stmt5 = $db->prepare("SELECT dishname FROM availabledish WHERE category = 'Seafood'");
                    $stmt5->execute();   
                    $stmt5->bind_result($seafood); while($stmt5->fetch()): ?>
              <input type ='radio' class = 'ds' id = 'seafood' value ='<?php echo $seafood ?>' name = 'seafood'>
              <label for = 'seafood'><?php echo $seafood; ?></label>
            <?php endwhile; $stmt5->close(); ?>
    </div>
     <div align = 'center' class = "choice">
           <label class = 'categ'>VEGETABLES</label><br>
            <?php   $stmt6 = $db->prepare("SELECT dishname FROM availabledish WHERE category = 'Vegetables'");
                    $stmt6->execute();   
                    $stmt6->bind_result($vegetables); while($stmt6->fetch()): ?>
              <input type ='radio' class = 'ds' id = 'vegetables' value ='<?php echo $vegetables ?>' name = 'vegetables'>
              <label for = 'vegetables'><?php echo $vegetables; ?></label>
            <?php endwhile; $stmt6->close(); ?>
    </div>
    <div align = 'center' class = "choice">
           <label class = 'categ'>DESSERT</label><br>
            <?php   $stmt7 = $db->prepare("SELECT dishname FROM availabledish WHERE category = 'Dessert'");
                    $stmt7->execute();   
                    $stmt7->bind_result($dessert); while($stmt7->fetch()): ?>
              <input type ='radio' class = 'ds' id = 'dessert' value ='<?php echo $dessert ?>' name = 'dessert'>
              <label for = 'dessert'><?php echo $dessert; ?></label>
            <?php endwhile; $stmt7->close(); ?>
    </div>
    <div align = 'center' class = "choice">
           <label class = 'categ'>DRINKS</label><br>
            <?php   $stmt8 = $db->prepare("SELECT dishname FROM availabledish WHERE category = 'Drinks'");
                    $stmt8->execute();   
                    $stmt8->bind_result($drinks); while($stmt8->fetch()): ?>
                    
              <input type ='radio' class = 'ds' id = 'drinks' value ='<?php echo $drinks ?>' name = 'drinks'>
              <label for = 'drinks'><?php echo $drinks; ?></label>
            <?php endwhile; $stmt8->close(); ?>
    </div>
    
     
     <div  class = 'action'>
     	<p>Available Food Tasting Time</p>
      	<h2>8:00 AM - 6:00 PM</h2>
      <input type="hidden" name="status" value="Pending">
        <label class = 'np'>Number of Persons</label><br>
        <select name = 'persons'>
            <option>Select One</option>
            <option value = '1'>1</option>
            <option value = '2'>2</option>
            <option value = '3'>3</option>
            <option value = '4'>4</option>
           </select><br>
        <label class = 'dt'>Date</label><br>
        <input type="date" name="date" min = "<?php echo date("Y-m-d"); ?>"><br>
        <label class = 'et'>Event Time</label><br>
        <input type='time' name ='time'><br>
        <button type="submit" name="apply">Submit</button>
        
        
    </form>
   </div>
   
    
</html>