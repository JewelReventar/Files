<?php 
    require('conn.php');
    if ($_SESSION['type'] == 0) {
    header('location: index.php');
    }

    function create($package, $pirce) {
        require('conn.php');
        $stmt = $db->prepare("INSERT INTO packages (packagename,price) VALUES (?,?)");
        $stmt->bind_param('si', $_POST['packagename'], $_POST['price']);
        $stmt->execute();
        $_SESSION['add'] = 1;
        $stmt->close();
        header("location: Packages.php");
    }
    if(isset($_POST['packagename']) && isset($_POST['price'])) {
        create($_POST['packagename'], $_POST['price']);
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
    <div class="sidebar">
        <ul>
            <li><a href="clients.php">Clients</a></li>
            <li><a href="admin.php">Manage Orders</a></li>
            <li><a class="active" href="Createpackage.php">Create Package</a></li>
            <li><a href="applyfoodtaste.php">Food Taste Requests</a></li>
            <li><a href="foodtastedish.php">Food Taste Dish</a></li>
           <?php if ($_SESSION['type'] == 1): ?>
            <li><a href="inbox2.php">Messages</a></li>
           <?php else: ?>
           <li><a class="active" href="send.php?id=1">Contact Admin</a></li>
            <?php endif; ?>
        </ul>
    </div>
    
    <div class = 'contentside'>
        <div class="create-pack">
            <form action='Createpackage.php' method='post'>
               <input type='text' placeholder='ENTER PACKAGE NAME..' name='packagename'><br>
               <input type='text' placeholder='ENTER PRICE..' name='price' required><br>
               <input class = 'create' type = 'Submit' value = 'Create'>
            </form>
        </div>
       
    </div>
   
    
<?php
    if(isset($_SESSION['createpackage'])) {
        unset($_SESSION['createpackage']);
    }
?>
</html>


