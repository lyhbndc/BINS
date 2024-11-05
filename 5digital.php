<?php
session_start();
if (!isset($_SESSION['plan']) || !isset($_SESSION['price'])) {
    header("Location: 7plan.php");
    exit();
}
$plan = $_SESSION['plan'];
$price = $_SESSION['price'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assuming the form field for mobile number is named 'mobile_number'
    if (isset($_POST['mobile_number']) && !empty($_POST['mobile_number'])) {
        // Perform any necessary actions with the mobile number here

        // Redirect to login page
        header("Location: 9login.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Payment/paymentstyle.css">
    <title>Nexer Sign Up</title>
</head>
<body>
    <div class="wrapper">
        <header>
            <div class="netflixLogo">
                <a id="logo" href="1index.php"><img src="Payment/Assets/logo.png" alt="Logo Image"></a>
            </div>      
            <nav class="sub-nav">
                <a href="#"><i class="fas fa-search sub-nav-logo"></i></a>
                <a href="#"><i class="fas fa-bell sub-nav-logo"></i></a>
                <a href="1index.php">Sign Out</a>        
            </nav>  
        </header>
        <div class="divider"></div>

        <div class="container">
            <h1>Set up GCash</h1>
            <h3>Enter your GCash mobile number.</h3>
            <form method="POST" action="">
                <div class="Gcash">
                    <input type="text" name="mobile_number" id="my4Input" placeholder="Mobile number" maxlength="11" required>
                </div>
                <div class="input-container">
                    <input type="text" id="my5Input" value="<?php echo $price; ?>" readonly>
                </div>
                <button type="submit" class="button">Next</button>
            </form>
            <?php
            // Check if the mobile number is set in session
            if (isset($_SESSION['mobile_number'])) {
                echo "<p>User registered successfully!</p>";
                // Unset mobile number from session
                unset($_SESSION['mobile_number']);
            }
            ?>
        </div>
    </div>
</body>
</html>
