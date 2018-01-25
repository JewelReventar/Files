<?php 
    require('conn.php');

    $username = "";
    $email = "";
    $firstname = "";
    $lastname = "";
    $contact = "";
    
    $errors = array();


    if(isset($_POST['register'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
        $password1 = mysqli_real_escape_string($db, $_POST['password_1']);
        $password2 = mysqli_real_escape_string($db, $_POST['password_2']);
        $contact = mysqli_real_escape_string($db, $_POST['contactnumber']);
        
        if(empty($username)) {
            array_push($errors, "Username is required");
        }
        if(empty($firstname)) {
            array_push($errors, "First Name is required");
        }
        if(empty($lastname)) {
            array_push($errors, "Last Name is required");
        }
        if(empty($contact)) {
            array_push($errors, "Contact number is required");
        }
        if(empty($password1)) {
            array_push($errors, "Password is required");
        }
        if($password1 != $password2) {
            array_push($errors, "Password is not matched");
        }
        
        //checks if username already taken
        $double = "SELECT * FROM users WHERE username= '$username'";
        $check = mysqli_query($db, $double);
        
        if($check->num_rows > 0) {
            array_push($errors, "Username already taken");
        }
        
        if(count($errors) == 0) {
            $password = md5($password1);
            $sql = "INSERT INTO users (username, firstname, lastname, contact, password) VALUES ('$username', '$firstname', '$lastname', '$contact', '$password')";
            mysqli_query($db, $sql);
            $query = "SELECT id FROM users WHERE username= '$username'";
            $result = mysqli_query($db, $query);
            $row = $result->fetch_assoc();
            $_SESSION['uid'] = $row['id'];
            $_SESSION['type'] = 0;
            header('location: index.php');
        }
    }

    if(isset($_SESSION["uid"])) {
        header('location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<html>
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
    <div class="content">
      
      <div class="login">
         <div class="head">
                Register
         </div>
        <form method="post" action="register.php">
           <?php include('errors.php');?>
            <div class="input_group">
                <label>Username</label>
                <input type="text" placeholder="Username" name="username">
            </div>
           <div class="input_group">
                <label>First Name</label>
               <input type="text" placeholder="First Name" name="firstname">
           </div>
           <div class="input_group">
                <label>Last Name</label>
                <input type="text" placeholder="Last Name" name="lastname">
           </div>
           <div class="input_group">
                <label>Contact Number</label>
                <input type="tel" placeholder="Contact Number" name="contactnumber">
           </div>
           <div class="input_group">
                <label>Password</label>
                <input type="password" placeholder="Password" name="password_1">
           </div>
           <div class="input_group">
                <label>Confirm Password</label>
                <input type="password" placeholder="Confirm Password" name="password_2">
           </div>
           <div class="input_group">
                <button type="submit" name="register">Register</button>
           </div>
           Already have an account? <a href="login.php">Sign in</a>
           </form>
          
      </div>
       
    </div>
</body>
   
    
</html>