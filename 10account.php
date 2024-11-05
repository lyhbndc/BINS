<?php
session_start();
if (!isset($_SESSION['user'])) {
    // Redirect to login page if user is not logged in
    header("Location: /php_programs/Final_Project/Nexer/1index.php");
    exit;
}

$user = $_SESSION['user']; // Retrieve user information from session




//$fullname = ($user['Name']);
//$email = ($user['Email']);
//$password = ($user['Password']);
//$username = $user['Username'];

$conn = mysqli_connect("localhost", "root", "", "nexer");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$fullname = ""; // Initialize $fullname variable

$query = "SELECT * FROM user WHERE Username = '$user'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $fullname = $row["Name"];
        $email = $row["Email"];
        $password = $row["Password"];
    }
} 



$query = "SELECT BillingDate, Plan FROM user WHERE Username='$user'";
$result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $nextBillingDate = date("F j, Y", strtotime($row['BillingDate']));
    $currentPlan = $row['Plan'];
} else {
    // Default values if data not found
    $nextBillingDate = "Not Available";
    $currentPlan = "Not Available";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['newpassword'], $_POST['confirmpassword'])) {
    $newpassword = $_POST['newpassword'];
    $confirmpassword = $_POST['confirmpassword'];

    if ($newpassword === $confirmpassword) {
        // Update the password in the database
        $username = $user['Username'];
        $query = "UPDATE user SET Password='$newpassword' WHERE Username='$username'";
        if (mysqli_query($conn, $query)) {
            $_SESSION['user']['Password'] = $newpassword; // Update the password in session
            $message = "Password updated successfully!";
        } else {
            $message = "Error updating password: " . mysqli_error($conn);
        }
    } else {
        $message = "Passwords do not match!";
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Account/account.css">
    <title>Nexer Account Settings</title>
</head>
<body>

<div class="container">
    <h1>Nexer Account Settings</h1>
    <div class="subscription-info">
        <h2>Current Subscription</h2>
        <p><strong>Plan:</strong> <?php echo $currentPlan; ?></p> <!-- Display current subscription plan -->
        <p><strong>Next Billing Date:</strong> <?php echo $nextBillingDate; ?></p> <!-- Display next billing date -->
    </div>
    <h2>Account Information</h2>
<form action="#" method="post">
    <label for="fullname">Account Name</label>
    <input type="text" id="fullname" name="fullname" value="<?php echo $fullname; ?>" readonly class="readonly">

    <label for="email">Email</label>
    <input type="text" id="email" name="email" value="<?php echo $email; ?>" readonly class="readonly">

    <label for="password">Password</label>
    <input type="password" id="password" name="password" value="<?php echo $password; ?>" readonly class="readonly">
</form>



    <h2>Subscription Settings</h2>
<form action="#" method="post">
    <label for="plan">Change Plan</label>
    <select id="plan" name="plan">
        <option value="basic" <?php if ($currentPlan === 'Basic') echo 'selected'; ?>>Basic</option>
        <option value="standard" <?php if ($currentPlan === 'Standard') echo 'selected'; ?>>Standard</option>
        <option value="premium" <?php if ($currentPlan === 'Premium') echo 'selected'; ?>>Premium</option>
    </select>

    <input type="submit" value="Change Plan">
</form>

    <h2>Security</h2>
    <?php if (isset($message)) { echo "<p>$message</p>"; } ?>
    <form action="#" method="post">
    <label for="newpassword">New Password</label>
    <input type="password" id="newpassword" name="newpassword" required>

    <label for="confirmpassword">Confirm New Password</label>
    <input type="password" id="confirmpassword" name="confirmpassword" required>

    <input type="submit" value="Update Password">
</form>
    <br>
    <form action="1index.php" method="post">
        <input type="submit" value="Logout">
    </form>
    <br>
    <form action="6homepage.php" method="get">
    <input type="submit" value="Back">
    </form>
</div>

</body>
</html>
