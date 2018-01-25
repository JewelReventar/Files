<?php 
    require('conn.php');

    $uid = intval($_SESSION['uid']);
    $userid = $db->prepare("SELECT username, firstname, lastname, contact FROM users WHERE id = ? LIMIT 1");
    $userid->bind_param('i', $uid);
    $userid->execute();
    $userid->bind_result($uname, $fname, $lname, $contact);
    $userid->fetch();
    $userid->close();


    $order = $db->query("SELECT id, packagename,Pasta,Beef,Pork,Chicken,Seafood,Vegetables,Dessert,Drinks,eventtype,venue,motif,date_applied,date_requested,event_time,qty,price,status FROM orders WHERE userid = $uid");

    

?>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo "$fname $lname"?></title>
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
    <?php while($rows = $order->fetch_assoc()): ?>
    
    <div class="divider">
       <table class = "contentsideadmin">
           <tr class = 'header'>
                <th colspan = '4'>PACKAGE</th>
                <tr class = 'data'>
                   <td colspan = '4'><center><?= $rows['packagename']; ?></center></td>
                </tr>
           </tr>    
           <tr class = 'header'>
               <th>PASTA</th>
               <th>BEEF</th>
               <th>PORK</th>
               <th>CHICKEN</th>
               <tr class = 'data'>
                   <td><?= $rows['Pasta']; ?></td>
                   <td><?= $rows['Beef']; ?></td>
                   <td><?= $rows['Pork']; ?></td>
                   <td><?= $rows['Chicken']; ?></td>
               </tr>
           </tr>
           <tr class = 'header'>
               <th>VEGETABLES</th>
               <th>SEAFOOD</th>
               <th>DESSERT</th>
               <th>DRINKS</th>
               <tr class = 'data'>
                  <td><?= $rows['Vegetables']; ?></td>
                  <td><?= $rows['Seafood']; ?></td>
                  <td><?= $rows['Dessert']; ?></td>
                  <td><?= $rows['Drinks']; ?></td>
               </tr>
           </tr>  
           <tr class = 'header'>
               <th>NO.PAX</th>
               <th>EVENT TYPE</th>
               <th>VENUE</th>
               <th>DATE APPLIED</th>
               <tr class = 'data'>
                   <td><?= $rows['qty']; ?></td>
                   <td><?= $rows['eventtype']; ?></td>
                   <td><?= $rows['venue']; ?></td>
                   <td><?= $rows['date_applied']; ?></td>
               </tr>
           </tr>      
           <tr class = 'header'>
               <th>EVENT DAY</th>
               <th>EVENT TIME</th>
               <th>MOTIF</th>
               <th>BALANCED DUE</th>
               <tr class = 'data'>
                    <td><?= $rows['date_requested']; ?></td>
                    <td><?= $rows['event_time']; ?></td>
                    <td><?= $rows['motif']; ?></td>
                    <td><?= $rows['price']; ?></td>
                    
               </tr>
           </tr>
            <tr class = 'header'>
                <th colspan="4">STATUS</th>
                <tr class="data">
                    <td colspan="4"><center><?= $rows['status']; ?></center></td>
                </tr>
                
            </tr>
            <?php if($rows['status'] != 'Approved'): ?>
           <tr class = 'header'>
               <th colspan = '4'>ACTION</th>
            <tr class = 'data'> 
                 <form action= "upload.php?id=<?php echo $rows['id']; ?>" method='post'>
                     <td colspan = '2'><button type="submit" class = 'removedish'>Upload</a></button></td>
                 </form>
                <form action="cancelorder.php?id=<?= $rows['id'] ?>" method="post">
                  <input type='hidden' name = 'aid' value="<?php echo $rows['id'] ?>">
                  <td colspan = '2'><button type="submit" name="cancel" class='removedish'>Cancel</button></td>
                </form>
           </tr>
            <?php endif; ?>
              
            
       </table>
        <?php endwhile;?> 
    </div>
</html>