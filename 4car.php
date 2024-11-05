<?php
session_start();
if (!isset($_SESSION['plan']) || !isset($_SESSION['price'])) {
    header("Location: 7plan.php");
    exit();
}
$plan = $_SESSION['plan'];
$price = $_SESSION['price'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Payment/paymentstyle.css">
    <title>Nexer Sign Up</title>
    <script>
    function checkExpiration() {
        var expDateInput = document.getElementById("my2Input").value;
        var currentDate = new Date();
        var enteredDate = new Date(expDateInput);
        
        // Check if entered date is before the current date
        if (enteredDate < currentDate) {
            alert("The card has expired. Please enter a valid expiration date.");
            return false;
        } else {
            alert("Registered Successfully!");
            window.location.href = "9login.php"; // Redirect to login page
            return true;
        }
    }
</script>

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
            <h1>Set up your credit or debit card</h1>
            <div class="cardnum">
                <input type="text" id="myInput" placeholder="Card number" maxlength="15" required>
            </div>
            <div class="expcvv">
                <input type="text" id="my2Input" placeholder="Expiration date" required>
                <input type="text" id="my3Input" placeholder="CVV" maxlength="3" required>
            </div>
            <div class="namecard">
                <input type="text" id="myInput" placeholder="Name on card" required>
            </div>
            <div class="input-container">
                <input type="text" id="my5Input" value="<?php echo $price; ?>" readonly>
            </div>
            <button class="button" onclick="return checkExpiration()">Next</button>
        </div>
    </div>
</body>
</html>
