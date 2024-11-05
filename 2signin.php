<?php
session_start(); // Start the session

$conn = mysqli_connect("localhost", "root", "");
mysqli_select_db($conn, "nexer") or die("Unable to select database");

// Check if the email is posted from the first page and set it in the session
if (isset($_POST['email']) && !empty($_POST['email'])) {
    $_SESSION['registeremail'] = $_POST['email'];
}

if (isset($_POST['next'])) {
    if (isset($_POST['registeremail'], $_POST['registername'],$_POST['registerusername'], $_POST['registerpassword']) && !empty($_POST['registeremail']) && !empty($_POST['registername']) && !empty($_POST['registerusername']) && !empty($_POST['registerpassword'])) {
       
        $email = $_POST['registeremail'];
        $name = $_POST['registername'];
        $user = $_POST['registerusername'];
        $pass = $_POST['registerpassword'];

        // Store user information in session
        $_SESSION['registeremail'] = $email;
        $_SESSION['registername'] = $name;
        $_SESSION['registerusername'] = $user;
        $_SESSION['registerpassword'] = $pass;

        // Redirect to the plan selection page
        header("Location: 7plan.php");
        exit();
    }
}
mysqli_close($conn);

$email = isset($_SESSION['registeremail']) ? $_SESSION['registeremail'] : '';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Sign In/signinstyle.css">
    <title>Nexer Sign Up</title>
   
</head>
<body>
    <div class="wrapper">
        <header>
          <div class="netflixLogo">
            <a id="logo" href="1index.php"><img src="Sign In/Assets/logo.png"Logo Image></a>
          </div>      
          <nav class="sub-nav">
            <a href="#"><i class="fas fa-search sub-nav-logo"></i></a>
            <a href="#"><i class="fas fa-bell sub-nav-logo"></i></a>
            <a href="1index.php">Sign Out</a>        
          </nav>  
          </header>
          <div class="divider"></div>

    <div class="container">
        <h1>Create a password to start your account</h1>
        <form method="POST">
        <div class = "email">
            <input type="text" id="myInput" name = "registeremail" placeholder="Email" value="<?php echo htmlspecialchars($email); ?>" readonly>
        </div>
        <div class = "name">
            <input type="text" id="myInput" name = "registername" placeholder="Full Name" required>
        </div>
        <div class = "username">
            <input type="text" id="myInput" name = "registerusername" placeholder="Username" required>
        </div>
        <div class = "password">
            <input type="password" id="myInput" name = "registerpassword" placeholder="Password" required>
        </div>
        

        <button class="button" name = "next">Next</button>

    </form>
    </div>
</body>
</html>