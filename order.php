<?php
    require('conn.php');
	//Get product Id
    $packageid = intval($_GET['id']);
	//Get user Id
    $uid = intval($_SESSION['uid']);
	//Get user information
    $userid = $db->prepare("SELECT username, firstname, lastname FROM users WHERE id = ? LIMIT 1");
    $userid->bind_param('i', $uid);
    $userid->execute();
    $userid->bind_result($uname, $fname, $lname);
    $userid->fetch();
    $userid->close();

    $qty = false;
    if(isset($_POST['qty'])) {
        $qty = $_POST['qty'];
    }
	
    $packageidd = $db->prepare("SELECT packagename,price FROM packages WHERE id = ? "); 
    $packageidd->bind_param('i',$packageid);
    $packageidd->execute();
    $packageidd->bind_result($packagename,$price);
    $packageidd->fetch();
    $packageidd->close();
    
	// Checks date and time
	// Where date requested must be a week from present day to be approved && date requested is disable invalid dates
	// Where time requested must be 8 am onwards to be approved 
    $ttt = new DateTime();
    $ttt->modify('+7 day');
    
	if(isset($_SESSION['uid'])) {
    	if(isset($_POST['order'])) {
         	if(explode(':',$_POST['time'])[0]<7) {
            	header('location: time2.php');
            	return;
         }
    $double = "SELECT * FROM orders WHERE date_requested= '{$_POST['date']}'";
    $check = mysqli_query($db, $double);
        
	// Checks if date requested is full
    if($check->num_rows >= 4) {
         header('location: full.php');
         return;
            
        }
      
	// Computes total price of orders && Gets dishes requested per package
     $overprice = intval($qty) * intval($price);
     $orders=$db->prepare("INSERT INTO orders (userid,packagename,Pasta,Beef,Pork,Chicken,Seafood,Vegetables,Dessert,Drinks,eventtype,motif,venue,date_requested,event_time,qty,price,status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) "); 
     $orders->bind_param('isssssssssssssssss', $uid,$packagename, $_POST['pasta'],                 $_POST['beef'],$_POST['pork'],$_POST['chicken'],$_POST['seafood'],$_POST['vegetables'],$_POST['dessert'], $_POST['drinks'], $_POST['eventtype'],$_POST['motif'], $_POST['venue'], $_POST['date'],$_POST['time'], $_POST['qty'], $overprice, $_POST['status']);
     $orders->execute();
		if($_SESSION['type'] == 0) {
			header('location:Profile.php');
		} else {
			header('location:admin.php');
		}
     }          
    } else {
    	header('location:login.php');
}
?>


<head>
     <title><?php echo $packagename; ?></title>
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
               
   <div class = 'container3'>
   <form action="order.php?id=<?= $packageid ?>" method="post">
    	<div align = 'center'>
            <label class = 'title'><h1>CHOOSE 1 DISH PER CATEGORY</h1></label>
        </div>
   		<div align = 'center' class = "choice" >
           <label class = 'categ'>PASTA</label><br>
            <?php   $stmt = $db->prepare("SELECT dishname FROM dishes WHERE category = 'Pasta'AND package = {$packageid}");
                    $stmt->execute();   
                    $stmt->bind_result($pasta);
        while($stmt->fetch()): ?>
              <input type ='radio' class = 'ds' id = 'pasta' value ='<?php echo $pasta ?>' name = 'pasta'>
              <label for = 'pasta'><?php echo $pasta; ?></label>
            <?php endwhile; $stmt->close();?>
    	</div>
    	<div align = 'center' class = "choice">
            <label class = 'categ'>PORK</label><br>
            <?php   $stmt2 = $db->prepare("SELECT dishname FROM dishes WHERE category = 'Pork'AND package = {$packageid}");
                    $stmt2->execute();   
                    $stmt2->bind_result($pork); while($stmt2->fetch()): ?>
              <input type ='radio' class = 'ds' id = 'pork' value ='<?php echo $pork ?>' name = 'pork'>
              <label for = 'pork'><?php echo $pork; ?></label>
            <?php endwhile; $stmt2->close(); ?>
    	</div>
   	 	<div align = 'center' class = "choice">
           <label class = 'categ'>BEEF</label><br>
            <?php   $stmt3 = $db->prepare("SELECT dishname FROM dishes WHERE category = 'Beef'AND package = {$packageid}");
                    $stmt3->execute();   
                    $stmt3->bind_result($beef); while($stmt3->fetch()): ?>
              <input type ='radio' class = 'ds' id = 'beef' value ='<?php echo $beef ?>' name = 'beef' id = 'beef'>
               <label for = 'beef'><?php echo $beef; ?></label>
            <?php endwhile; $stmt3->close(); ?>
    	</div>
    	<div align = 'center' class = "choice">
           <label class = 'categ'>CHICKEN</label><br>
            <?php   $stmt4 = $db->prepare("SELECT dishname FROM dishes WHERE category = 'Chicken'AND package = {$packageid}");
                    $stmt4->execute();   
                    $stmt4->bind_result($chicken); while($stmt4->fetch()): ?>
              <input type ='radio' class = 'ds' id = 'chicken' value ='<?php echo $chicken ?>' name = 'chicken'>
              <label for = 'chicken'><?php echo $chicken; ?></label>
            <?php endwhile; $stmt4->close(); ?>
    	</div>
    	<div align = 'center' class = "choice">
           <label class = 'categ'>SEAFOOD</label><br>
            <?php   $stmt5 = $db->prepare("SELECT dishname FROM dishes WHERE category = 'Seafood'AND package = {$packageid}");
                    $stmt5->execute();   
                    $stmt5->bind_result($seafood); while($stmt5->fetch()): ?>
              <input type ='radio' class = 'ds' id = 'seafood' value ='<?php echo $seafood ?>' name = 'seafood'>
              <label for = 'seafood'><?php echo $seafood; ?></label>
            <?php endwhile; $stmt5->close(); ?>
    	</div>
     	<div align = 'center' class = "choice">
           <label class = 'categ'>VEGETABLES</label><br>
            <?php   $stmt6 = $db->prepare("SELECT dishname FROM dishes WHERE category = 'Vegetables'AND package = {$packageid}");
                    $stmt6->execute();   
                    $stmt6->bind_result($vegetables); while($stmt6->fetch()): ?>
              <input type ='radio' class = 'ds' id = 'vegetables' value ='<?php echo $vegetables ?>' name = 'vegetables'>
              <label for = 'vegetables'><?php echo $vegetables; ?></label>
            <?php endwhile; $stmt6->close(); ?>
    	</div>
    	<div align = 'center' class = "choice">
           <label class = 'categ'>DESSERT</label><br>
            <?php   $stmt7 = $db->prepare("SELECT dishname FROM dishes WHERE category = 'Dessert'AND package = {$packageid}");
                    $stmt7->execute();   
                    $stmt7->bind_result($dessert); while($stmt7->fetch()): ?>
              <input type ='radio' class = 'ds' id = 'dessert' value ='<?php echo $dessert ?>' name = 'dessert'>
              <label for = 'dessert'><?php echo $dessert; ?></label>
            <?php endwhile; $stmt7->close(); ?>
    	</div>
    	<div align = 'center' class = "choice">
           <label class = 'categ'>DRINKS</label><br>
            <?php   $stmt8 = $db->prepare("SELECT dishname FROM dishes WHERE category = 'Drinks' AND package = {$packageid}");
                    $stmt8->execute();   
                    $stmt8->bind_result($drinks); while($stmt8->fetch()): ?>
                    
              <input type ='radio' class = 'ds' id = 'drinks' value ='<?php echo $drinks ?>' name = 'drinks'>
              <label for = 'drinks'><?php echo $drinks; ?></label>
            <?php endwhile; $stmt8->close(); ?>
    	</div>
    
      
      
      <div class = 'action'>
     	 <input type = 'hidden' name = 'package' value = "<?php $packagename ?>" > 
         <input type="hidden" name="status" value="No Invoice">
         <label class = 'dt'>Enter Pax </label><br>
         <input type="number" name="qty" min="30" class="pax" placeholder="0" required><br>
         <label class = 'dt'>Date</label><br>
         <input type="date" name="date" min="<?php echo $ttt->format('Y-m-d'); ?>" required><br>
         <label class = 'dt'>Event Time</label><br>
         <input type='time' name ='time'><br>
         <label class = 'dt'>Venue </label><br>
         <input type="text" name="venue" placeholder="Venue" class="venue" required><br>
         <label class = 'dt'>Event Type </label><br>
          	<select name ='eventtype'  required><br>
               <option value ='Wedding Event'>Wedding</option>
               <option value ='Debut Event'>Debut</option>
               <option value ='Birthday Event'>Birthday</option>
               <option value ='Corporate Event'>Corporate</option>
             </select><br>
          <label class="dt">Motif</label><br>
          <input type="text" name="motif"  class="venue"><br>
          <button type="submit" name="order">Submit</button>
    </form>
    
	   </div>
    
</html>