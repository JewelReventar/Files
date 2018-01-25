<?php 
    require('conn.php');

    $uid = intval($_SESSION['uid']);
    $userid = $db->prepare("SELECT username, firstname, lastname, contact FROM users WHERE id = ? LIMIT 1");
    $userid->bind_param('i', $uid);
    $userid->execute();
    $userid->bind_result($uname, $fname, $lname, $contact);
    $userid->fetch();
    $userid->close();

    if(isset($_POST['Cancel'])) {
          $remove = $db->prepare('DELETE FROM foodtasting WHERE id = ? LIMIT 1');
          $remove->bind_param('s',$_POST['aid']);
          $remove->execute();
    }

    $foodtasting = $db->query("SELECT id,Pasta,Beef,Pork,Chicken,Seafood,Vegetables,Dessert,Drinks,number_persons,date_applied,date_requested,time_requested,status FROM foodtasting WHERE userid = $uid");

    

?>
<html>
 <head>
    <meta charset="UTF-8">
    <title><?php echo "$uname $fname"?></title>
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
            <li><a  href="Profile.php">Performed Orders</a>
            <li><a  class="active" href="Profile2.php">Food Tasting</a></li>
           <?php if ($_SESSION['type'] == 1): ?>
            <li><a href="inbox2.php">Inbox</a></li>
           <?php else: ?>
           <li><a href="send.php?id=1">Contact Admin</a></li>
            <?php endif; ?>
        </ul>
    </div>
    <?php while($rows = $foodtasting->fetch_assoc()): ?>
    <div class="divider">
          <table class="contentsideadmin">
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
               <th>SEAFOOD</th>
               <th>VEGETABLES</th>
               <th>DESSERT</th>
               <th>DRINKS</th>
               <tr class = 'data'>
                   <td><?= $rows['Seafood']; ?></td>
                   <td><?= $rows['Vegetables']; ?></td>
                   <td><?= $rows['Dessert']; ?></td>
                   <td><?= $rows['Drinks']; ?></td>
            </tr>
            </tr>
              <tr class = 'header'>
               <th>NO.PERSONS</th>
               <th>TASTE DAY</th>
               <th>TASTE TIME</th>
               <th>STATUS</th>    
                <tr class = 'data'>
                 <td><?= $rows['number_persons']; ?></td>
                 <td><?= $rows['date_applied']; ?></td>
                 <td><?= $rows['date_requested']; ?></td>
                 <td><?= $rows['time_requested']; ?></td>
            </tr>
           </tr>
            <tr class = 'header'>
               <th colspan = '4'>STATUS</th>    
                <tr class = 'data'>
                 <td colspan = '4'><?= $rows['status']; ?></td>
            </tr>
           </tr>
            <tr class = 'header'>
                <th colspan = '4'>Action</th>
            <tr class = 'data'>
                <form action="Profile2.php" method="post">
                <input type='hidden' name = 'aid' value="<?php echo $rows['id'] ?>">
                <?php if($rows['status'] == 'Approved'): ?>
                <td>-</td>
                <?php elseif($rows['status'] == 'Pending'): ?>
                <td colspan ='4'><input type='submit' name='Cancel' value='Cancel' class = 'removedish'></td>
                <?php endif; ?>
                </form>
                
           </tr>
        </tr>

           <?php endwhile;?>   
       </table>
    </div>
</html>