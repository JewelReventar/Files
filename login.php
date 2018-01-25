<?php 
    require('conn.php');
    $username = "";

    $errors = array();


    if (isset($_POST['login'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        
        if(empty($username)) {
            array_push($errors, "Username is required");
        }
        if(empty($password)) {
            array_push($errors, "Password is required");
        }

        if (count($errors == 0)) {
            $password = md5($password); 
            $query = "SELECT id, type FROM users WHERE username= '$username' AND password='$password'";
            $result = mysqli_query($db, $query);
            //get type from database table clients
            $row = $result->fetch_assoc();
            $type = $row['type'];
            if (mysqli_num_rows($result) == 1) {
                $_SESSION['uid'] = $row['id'];
                //create session for type 1 = admin 0 = users
                $_SESSION['type'] = $type;
                header('location: index.php');
            } else {
                array_push($errors, "Wrong Username/Password");
            }
            
        }

    }

    if(isset($_SESSION["uid"])) {
        header('location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
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
    <div class="content">
        <div class="login">
            <div class="head">
            Log in
            </div>
            <form method="post" action="login.php">
            <?php include('errors.php');?>
            <div class="input_group">
                <label>Username</label>
                <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>">
            </div>
            <div class="input_group">
                <label>Password</label>
                <input type="password" placeholder="Password" name="password">
            </div>
            <div class="input_group">
                <button type="submit" name="login">Login</button>
            </div>
            Doesn't have an account yet? <a href="register.php">Sign up for free</a>
            </form>
        </div>
        
    
    </div>
    
</body>
   
    
</html>