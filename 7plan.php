<?php
session_start(); // Start the session

$conn = mysqli_connect("localhost", "root", "");
mysqli_select_db($conn, "nexer") or die("Unable to select database");

if (isset($_POST['choosePlan'])) {
    if (isset($_POST['plan']) && !empty($_POST['plan'])) {
        $plan = $_POST['plan'];

        $nextBillingDate = date('Y-m-d', strtotime('+1 month'));

        // Store plan and price in session
        $_SESSION['plan'] = $plan;
        if ($plan == 'Premium') {
            $_SESSION['price'] = '₱549.00/month';
        } elseif ($plan == 'Standard') {
            $_SESSION['price'] = '₱349.00/month';
        } elseif ($plan == 'Basic') {
            $_SESSION['price'] = '₱249.00/month';
        }

        // Retrieve user information from session
        $email = $_SESSION['registeremail'];
        $name = $_SESSION['registername'];
        $user = $_SESSION['registerusername'];
        $pass = $_SESSION['registerpassword'];

        // Insert user information along with the selected plan into the database
        $query = "INSERT INTO user (email, name, username, password, plan, BillingDate) VALUES ('$email', '$name', '$user', '$pass', '$plan', '$nextBillingDate')";
        $result = @mysqli_query($conn, $query);

        if ($result) {
            header("Location: 3choose.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Plan/plan.css">
  <title>Nexer Subscription Plans</title>
  <style>
    .plans-container {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        justify-content: center;
        margin: 0px 0;
    }

    .plan {
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 300px;
        cursor: pointer;
        transition: transform 0.3s;
    }

    .plan.selected {
        border-color: #f00;
        transform: scale(1.05);
    }

    .plan input {
        display: none;
    }

    .plan label {
        display: block;
    }

    .button-container {
        text-align: center;
        margin-top: 20px;
    }

    .form-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 1em;
    }

    .button {
        padding: 10px 20px;
        background-color: #f00;
        color: #fff;
        border: none;
        cursor: pointer;
        border-radius: 4px;
        font-size: 16px;
    }

    .button:hover {
        background-color: #c00;
    }
  </style>
</head>
<body>
    <div class="wrapper">
        <header>
            <div class="netflixLogo">
                <a id="logo" href="1index.php"><img src="Sign In/Assets/logo.png" alt="Logo Image"></a>
            </div>      
            <nav class="sub-nav">
                <a href="#"><i class="fas fa-search sub-nav-logo"></i></a>
                <a href="#"><i class="fas fa-bell sub-nav-logo"></i></a>
                <a href="1index.php">Sign Out</a>        
            </nav>  
        </header>
        <div class="divider"></div>

        <h1>Choose the plan that’s right for you</h1>
        <form method="POST" class="form-container">
            <div class="plans-container">
                <div class="plan" onclick="selectPlan(this)">
                    <input type="radio" id="premium" name="plan" value="Premium">
                    <label for="premium">
                        <h2>Premium</h2>
                        <p>Best video and sound quality. 4k and HDR available.</p>
                        <div class="price">₱549.00/month</div>
                    </label>
                </div>

                <div class="plan" onclick="selectPlan(this)">
                    <input type="radio" id="standard" name="plan" value="Standard">
                    <label for="standard">
                        <h2>Standard</h2>
                        <p>Great video and sound quality. 1080p and UHD available.</p>
                        <div class="price">₱349.00/month</div>
                    </label>
                </div>

                <div class="plan" onclick="selectPlan(this)">
                    <input type="radio" id="basic" name="plan" value="Basic">
                    <label for="basic">
                        <h2>Basic</h2>
                        <p>Good video and sound quality. 720p and HD available.</p>
                        <div class="price">₱249.00/month</div>
                    </label>
                </div>
            </div>
            <div class="button-container">
                <button class="button" name="choosePlan">Choose Plan</button>
            </div>
        </form>
    </div>
    <script>
      var selectedPlan = null;

      function selectPlan(plan) {
        if (selectedPlan) {
          selectedPlan.classList.remove('selected');
        }
        plan.classList.add('selected');
        selectedPlan = plan;

        var radioButton = plan.querySelector('input[type="radio"]');
        radioButton.checked = true;
      }

      document.querySelectorAll('.plan').forEach(function(plan) {
        plan.addEventListener('click', function() {
          selectPlan(plan);
        });
      });
    </script>
</body>
</html>
