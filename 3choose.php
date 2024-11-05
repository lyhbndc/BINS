<?php
session_start();
if (!isset($_SESSION['plan']) || !isset($_SESSION['price'])) {
    header("Location: 7plan.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['options'])) {
        $paymentOption = $_POST['options'];
        if ($paymentOption == 'card') {
            header("Location: 4car.php");
            exit();
        } elseif ($paymentOption == 'digital') {
            header("Location: 5digital.php");
            exit();
        }
    }
    header("Location: 3choose.php");
    exit();
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
        <h1>Choose how to pay</h1>
        <h3>Your payment is encrypted and you can change how you pay anytime.</h3>
        <form method="POST" action="">
            <div class="radio-buttons">
                <input type="radio" id="option1" name="options" value="card" checked>
                <label for="option1">Credit or Debit Card</label>
            </div>
            <div class="radio-buttons">
                <input type="radio" id="option2" name="options" value="digital">
                <label for="option2">Digital Wallet</label>
            </div>
            <button class="button">Next</button>
        </form>
    </div>
</body>
</html>
