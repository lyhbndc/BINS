<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "nexer");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['login'])) {
    if (isset($_POST['username'], $_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];
       
        $query = "SELECT * FROM user WHERE Username='$user' AND Password='$pass'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $id = $row['ID'];
            $_SESSION['user'] = $user; // Save user data to session
            $_SESSION['id'] = $id;
            header("Location: /php_programs/Final_Project/Nexer/6homepage.php");
            exit;
        } else {
            echo "Invalid username or password";
        }
    } else {
        echo "Please fill in both fields";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Login/login.css">
    <title>Nexer BINS - Watch TV Shows Online, Watch Movies Online</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <nav>
                <img class="logo" src="Login/logo.png" alt="logo">
            </nav>
        </div>
        <div class="login-container">
            <form method="POST">
                <h3>Sign In</h3>
                <label for="username">Username</label>
                <input type="text" placeholder="Email or Username" id="username" name="username">
                <label for="password">Password</label>
                <input type="password" placeholder="Password" id="password" name="password">
                <button name="login">Log In</button>
                <p>New to Nexer? <a href="1index.php">Sign up now</a></p>
            </form>
        </div>
    </div>
</body>
</html>
