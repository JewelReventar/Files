<?php 
    require('conn.php');
    if ($_SESSION['type'] == 0) {
        header('location: index.php');
    }

    if(isset($_POST['Approve'])){
        $stmt = $db->prepare('UPDATE foodtasting SET Status = "Approved" WHERE id = ? LIMIT 1');
        $stmt->bind_param('s', $_POST['aid']);
        $stmt->execute();
       // header("location: reservations.php");
    }

    if(isset($_POST['Cancel'])){
        $stmt = $db->prepare('UPDATE foodtasting SET Status = "Pending" WHERE id = ? LIMIT 1');
        $stmt->bind_param('s', $_POST['aid']);
        $stmt->execute();
       // header("location: reservations.php");
    }
   else if(isset($_POST['remove'])) {
          $remove = $db->prepare('DELETE FROM foodtasting WHERE id = ? LIMIT 1');
          $remove->bind_param('s',$_POST['aid']);
          $remove->execute();
    }

    
    
?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <meta charset="UTF-8">
    <title>Administrator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!--NavBar-->
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
    <div class="sidebar">
        <ul>
            <li><a href="clients.php">Clients</a></li>
            <li><a href="admin.php">Manage Orders</a></li>
            <li><a href="Createpackage.php">Create Package</a></li>
            <li><a class="active" href="applyfoodtaste.php">Food Taste Requests</a></li>
            <li><a href="foodtastedish.php">Food Taste Dish</a></li>
           <?php if ($_SESSION['type'] == 1): ?>
            <li><a href="inbox2.php">Messages</a></li>
           <?php else: ?>
           <li><a class="active" href="send.php?id=1">Contact Admin</a></li>
            <?php endif; ?>
        </ul>
    </div>
      <?php
        $stmt = $db->query("SELECT * FROM foodtasting");
        while($rows = $stmt->fetch_assoc()): 
            
          ?>  
        <?php
            $userid = $db->prepare("SELECT username, firstname, lastname FROM users WHERE id = ? LIMIT 1");
            $uid = $rows['userid'];
            $userid->bind_param('s', $uid);
            $userid->execute();
            $userid->bind_result($uname, $fname, $lname);
            $userid->fetch();
            $userid->close();
            
        ?>  
     <div class = 'divider'>
          <table class = "contentsideadmin">
            <tr class = 'header'>
                <th colspan = '4'>USERNAME</th>
                <tr class = 'data'>
                	<td colspan ='4'><?php echo $uname;?></td>
				</tr>
            </tr>
            <tr class = 'header'>
                <th colspan = '2'>FIRST NAME</th>
                <th colspan = '2'>LAST NAME</th>
               	<tr class = 'data'>
               		<td colspan = '2'><?php echo $fname; ?></td>
               		<td colspan = '2'><?php echo $lname; ?></td>
            </tr>
            <tr class = 'header'>
                <th>PASTA</th>
                <th>PORK</th>
                <th>BEEF</th>
                <th>CHICKEN</th>
                <tr class = 'data'>
                	<td><?php echo $rows['Pasta']?></td>
                	<td><?php echo $rows['Pork']?></td>
                	<td><?php echo $rows['Beef']?></td>
                	<td><?php echo $rows['Chicken']?></td>
                </tr>
            </tr>
            <tr class = 'header'>
                <th>VEGETABLES</th>
                <th>SEAFOOD</th>
                <th>DESSERT</th>
                <th>DRINKS</th>  
                 <tr class = 'data'>
                	<td><?php echo $rows['Vegetables']?></td>
                	<td><?php echo $rows['Seafood']?></td>
                	<td><?php echo $rows['Dessert']?></td>
                	<td><?php echo $rows['Drinks']?></td>
                </tr>
             </tr>
			 <tr class = 'header'>
                <th>NO.PEOPLE</th>
                <th>DATE_APPLIED</th>
                <th>TASTE DAY</th>  
                <th>TASTE TIME</th> 
                 <tr class = 'data'>
                	<td><?php echo $rows['number_persons']?></td>
                	<td><?php echo $rows['date_applied']?></td>
                	<td><?php echo $rows['date_requested']?></td>
                	<td><?php echo $rows['time_requested']?></td>
                </tr>  
			  </tr>
           	 <tr class = 'header'>
                <th colspan = '4'>STATUS</th>
                 <tr class = 'data'>
                	<td colspan = '4'><?php echo $rows['status']?></td>
                </tr>
			 </tr>
            <table class = 'action-table'>
               <tr class="header">
                   <th colspan=4>ACTION</th>
                 <tr class = 'data'>
                	<form action='applyfoodtaste.php' method='post'>
						<td><input type='hidden' name = 'aid' value=<?php echo $rows['id'] ?>></td>
						 <?php if($rows['status'] == 'Approved'): ?>
						<td><input class = 'removedish' type='submit' name='Cancel' value='Cancel'></td>
						<?php elseif($rows['status'] == 'Pending'): ?>
                        <td><input class = 'removedish' type='submit' name='Approve' value='&#10004'></td>
						<?php endif; ?>
						<td><input class = 'removedish' type='submit' name='remove' value='X'></td>
                       <td></td>
                </form>
                </tr>
               </tr>
                
            </table>
        </table>
       <?php endwhile; ?>
    </div>     
    
  
    
</body>
</html>