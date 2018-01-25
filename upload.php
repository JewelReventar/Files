<?php 
    require('conn.php');
    $id = $_GET['id'];
    
    if(isset($_POST['upload'])) {
        $target = "receipts/".basename($_FILES['image']['name']);
        if(isset($target)) {
            $image = $_FILES['image']['name'];
            
            if(move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $sql = "INSERT INTO receipts (order_id, image) VALUES ('$id', '$image')";
                mysqli_query($db,$sql);
            } else {
                echo 'Image not uploaded';
                return;
            }
        } else {
            echo 'error';
            return;
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
        <title>Upload</title>
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
    <div class="contentside">
        <div class="upload">
            <h2>Upload your Receipt here</h2>
            <p>Your Receipt</p>
            <div class="upload-image">
            <?php 
                $stmt = $db->prepare("SELECT image FROM receipts WHERE order_id = ? ORDER BY id DESC");
                $stmt->bind_param("s", $id);
                $stmt->execute();
                $stmt->bind_result($img_receipt);
                $stmt->fetch();
                $stmt->close();
               ?>
               
                <img src="receipts/<?php echo $img_receipt ?>" >
                
                
            </div>
            <form action="upload.php?id=<?php echo $id; ?>" method="post" enctype = "multipart/form-data">
               <input type = "hidden" name = "size" value = "1000000">
               <input type = "file" name ="image"> <br>
               <input type ="submit" name ="upload" value = "Upload">
               <button type="submit"><a href="Profile.php" name="upload">Back</a></button>
            </form>
            
            <?php if($_POST['upload']) {
                $update = $db->prepare('UPDATE orders SET status = "Receipt Sent" WHERE id = ? LIMIT 1');
                $update->bind_param('s', $id);
                $update->execute();
                $update->close();
                
            }?>
            
        </div>
        
    </div>
    
</body>
</html>